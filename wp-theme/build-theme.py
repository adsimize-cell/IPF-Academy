"""Build the WordPress theme templates + zip from the static HTML pages.

Usage (from the IPF-Academy-HTML folder):
    python wp-theme/build-theme.py

- One template per page: wp-theme/ipf-academy/templates/tpl-<slug>.php
- Body = everything between </header> and <footer id="footer">
- Page scripts = scripts after the last </footer>, minus the sticky nav
  script (already in footer.php)
- Links: x.html -> /x/, index.html -> /, assets/ -> /assets/
- Zip built with Python zipfile (forward slashes, required by WP)

Tailwind is compiled locally (no CDN). After changing classes in the pages,
rebuild the CSS first (pip install pytailwindcss once):
    TAILWINDCSS_VERSION=v3.4.17 tailwindcss -c wp-theme/tailwind/tailwind.config.js \
        -i wp-theme/tailwind/input.css -o wp-theme/ipf-academy/assets/tailwind.css --minify
then check coverage with: python wp-theme/tailwind/check-coverage.py
"""
import glob, io, os, re, sys, zipfile

sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding="utf-8", errors="replace")
ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
THEME = os.path.join(ROOT, "wp-theme", "ipf-academy")
TPL = os.path.join(THEME, "templates")
os.makedirs(TPL, exist_ok=True)

def rewrite(s):
    # internal page links (not external URLs)
    s = re.sub(r'(?<![\w/.:-])index\.html(#[\w-]+)?', lambda m: "/" + (m.group(1) or ""), s)
    s = re.sub(r'(?<![\w/.:-])([a-z0-9-]+)\.html(#[\w-]+)?', lambda m: "/%s/%s" % (m.group(1), m.group(2) or ""), s)
    # local assets
    s = re.sub(r'(?<![\w/.:-])assets/', "/assets/", s)
    return s

def strip_sticky(sc):
    """Remove the sticky nav-header scroll listener (lives in footer.php)."""
    while True:
        i = sc.find("window.addEventListener('scroll'")
        if i < 0:
            return sc
        j = sc.find("{", i)
        depth, k = 0, j
        while k < len(sc):
            if sc[k] == "{": depth += 1
            elif sc[k] == "}":
                depth -= 1
                if depth == 0: break
            k += 1
        end = sc.find(");", k) + 2
        sc = sc[:i] + sc[end:]

def title_of(s, slug):
    m = re.search(r"<title>(.*?)</title>", s, re.S)
    t = re.sub(r"\s*[|:-].*$", "", m.group(1).strip()) if m else slug
    return t.replace("*/", "").strip() or slug

built = []
for path in sorted(glob.glob(os.path.join(ROOT, "*.html"))):
    slug = os.path.basename(path)[:-5]
    if slug == "blog" or slug.startswith("blog-"):
        continue  # blog preview pages are not WP page templates (blog is posts, not pages)
    s = open(path, encoding="utf-8").read()
    m = re.search(r'</header>(.*?)<footer id="footer"', s, re.S)
    if not m:
        print("SKIP (no header/footer):", slug); continue
    body = m.group(1)
    tail = s.rsplit("</footer>", 1)[1]
    scripts = []
    for sc in re.findall(r"<script\b[^>]*>.*?</script>", tail, re.S):
        sc = strip_sticky(sc)
        if re.fullmatch(r"<script\b[^>]*>\s*</script>", sc):
            continue
        scripts.append(sc)
    out = "<?php /* Template Name: %s [%s] */ get_header(); ?>\n" % (title_of(s, slug), slug)
    out += rewrite(body).rstrip() + "\n"
    if scripts:
        out += "\n" + rewrite("\n".join(scripts)) + "\n"
    out += "\n<?php get_footer(); ?>\n"
    open(os.path.join(TPL, "tpl-%s.php" % slug), "w", encoding="utf-8").write(out)
    built.append((slug, len(scripts)))

print("templates:", len(built), "| with scripts:", sum(1 for _, n in built if n))

# sanity checks
bad = []
for f in glob.glob(os.path.join(TPL, "*.php")):
    t = open(f, encoding="utf-8").read()
    for h in re.findall(r'href="([^"]+)"', t):
        if h.endswith(".html") and not h.startswith("http"):
            bad.append((os.path.basename(f), h))
print("unrewritten .html links:", len(bad), bad[:5])

zpath = os.path.join(ROOT, "wp-theme", "ipf-academy-theme.zip")
with zipfile.ZipFile(zpath, "w", zipfile.ZIP_DEFLATED) as z:
    z.writestr("ipf-academy/", "")
    for dp, dn, fn in os.walk(THEME):
        for d in sorted(dn):
            z.writestr("ipf-academy/" + os.path.relpath(os.path.join(dp, d), THEME).replace("\\", "/") + "/", "")
        for f in sorted(fn):
            full = os.path.join(dp, f)
            z.write(full, "ipf-academy/" + os.path.relpath(full, THEME).replace("\\", "/"))
print("zip:", zpath, round(os.path.getsize(zpath) / 1024), "KB")
