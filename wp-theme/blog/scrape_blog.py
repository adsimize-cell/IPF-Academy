"""Scrape Weebly blog posts from teachers-academy.org into local, styled preview
pages (content column + Archives/Categories sidebar), downloading images into
assets/blog/<slug>/. Preserves paragraphs, image captions (figure/figcaption),
and inline text colors (e.g. the bordeaux author byline).

Usage: python wp-theme/blog/scrape_blog.py [slug ...]   (no args = pilot)
"""
import sys, os, io, re, json, urllib.request, urllib.parse
from bs4 import BeautifulSoup

sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding="utf-8", errors="replace")
ROOT = r"C:/Users/aswhi/Desktop/Claude/IPF-Academy-HTML"
os.chdir(ROOT)
BASE = "https://www.teachers-academy.org/blog/"
SITE = "https://www.teachers-academy.org"
UA = {"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/120 Safari/537.36"}
MONTHS = ["", "January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"]
ARCHIVE_MONTHS = ["08-2026","07-2026","06-2026","05-2026","04-2026","03-2026","02-2026","01-2026",
                  "12-2025","11-2025","10-2025","09-2025","07-2025","06-2025","05-2025","04-2025",
                  "03-2025","02-2025","01-2025","12-2024","11-2024","10-2024"]
PILOT = ["australian-scents", "the-language-of-scents", "nefertum-god-of-perfumers"]

def fetch(url):
    return urllib.request.urlopen(urllib.request.Request(url, headers=UA), timeout=30).read()

def human_date(d):
    m = re.match(r"(\d{1,2})/(\d{1,2})/(\d{4})", d.strip())
    if not m:
        return d.strip(), None
    day, mon, yr = int(m.group(1)), int(m.group(2)), int(m.group(3))
    return "%d %s %d" % (day, MONTHS[mon], yr), "%04d-%02d-%02d" % (yr, mon, day)

def dl_image(url, slug):
    name = os.path.basename(urllib.parse.urlparse(url.split("?")[0]).path)
    name = re.sub(r"[^A-Za-z0-9._-]", "_", name) or "img.jpg"
    outdir = os.path.join("assets", "blog", slug); os.makedirs(outdir, exist_ok=True)
    path = os.path.join(outdir, name)
    if not os.path.exists(path):
        try:
            open(path, "wb").write(fetch(url))
        except Exception as e:
            print("   img FAIL", url, e); return None
    return "assets/blog/%s/%s" % (slug, name)

def abs_url(src):
    if src.startswith("//"): return "https:" + src
    if src.startswith("/"): return SITE + src
    return src

def clean_content(frag, slug):
    for t in frag.find_all(["script", "style", "noscript", "form", "button"]):
        t.decompose()
    for t in frag.find_all(attrs={"class": re.compile(r"comment|share|social|wsite-com|blog-sharing", re.I)}):
        t.decompose()
    nimg = [0]
    # .wsite-image -> <figure><img><figcaption>
    for wi in frag.select(".wsite-image"):
        img = wi.find("img")
        if not img:
            wi.decompose(); continue
        src = abs_url(img.get("src") or img.get("data-src") or "")
        if "uploads" not in src:
            wi.decompose(); continue
        cap = wi.get_text(" ", strip=True) or img.get("alt", "")
        local = dl_image(src, slug); nimg[0] += 1
        fig = BeautifulSoup("", "html.parser").new_tag("figure")
        ni = BeautifulSoup("", "html.parser").new_tag("img"); ni["src"] = local or src
        if img.get("alt"): ni["alt"] = img["alt"]
        fig.append(ni)
        if cap:
            fc = BeautifulSoup("", "html.parser").new_tag("figcaption"); fc.string = cap; fig.append(fc)
        wi.replace_with(fig)
    # .paragraph -> <p> (keep centering)
    for pa in frag.select(".paragraph"):
        st = pa.get("style", "") or ""
        centered = "center" in (re.search(r"text-align\s*:\s*(\w+)", st) or [None, ""])[1] if re.search(r"text-align\s*:\s*(\w+)", st) else False
        pa.name = "p"
        for a in list(pa.attrs): del pa[a]
        if centered: pa["style"] = "text-align:center"
    # preserve font colors -> span style color
    for f in frag.find_all("font"):
        col = f.get("color"); f.name = "span"
        for a in list(f.attrs): del f[a]
        if col: f["style"] = "color:%s" % col
    # keep only color on styled spans
    for sp in frag.find_all("span"):
        m = re.search(r"color\s*:\s*(#[0-9a-fA-F]{3,6})", sp.get("style", "") or "")
        for a in list(sp.attrs): del sp[a]
        if m: sp["style"] = "color:%s" % m.group(1)
    # remaining stray imgs
    for img in frag.find_all("img"):
        if img.find_parent("figure"): continue
        src = abs_url(img.get("src") or "")
        if "uploads" not in src: img.decompose(); continue
        local = dl_image(src, slug); nimg[0] += 1
        for a in list(img.attrs): del img[a]
        img["src"] = local or src
    # unwrap layout wrappers, but keep colored spans and semantic tags
    for t in frag.find_all(["div", "section", "font"]):
        t.unwrap()
    for sp in frag.find_all("span"):
        if not sp.get("style"): sp.unwrap()
    # strip leftover attrs except allowed
    for t in frag.find_all(True):
        for a in list(t.attrs):
            if a in ("href", "src", "alt"): continue
            if a == "style" and t.name in ("p", "span", "figcaption"): continue
            del t[a]
    html = frag.decode_contents()
    html = re.sub(r"(\s*<br\s*/?>\s*){3,}", "<br/><br/>", html)
    html = re.sub(r"<p>\s*(&nbsp;|\u200b|\s)*</p>", "", html)
    html = re.sub(r"\u200b", "", html)
    return html.strip(), nimg[0]

def scrape(slug):
    soup = BeautifulSoup(fetch(BASE + slug).decode("utf-8", "replace"), "html.parser")
    tt = soup.find("title")
    title = re.sub(r"\s*[-|]\s*Natural Perfumery Academy\s*$", "", tt.get_text().strip()) if tt else slug
    dn = soup.select_one(".blog-date")
    dhuman, diso = human_date(dn.get_text().strip() if dn else "")
    cnode = soup.select_one(".blog-content")
    if not cnode:
        raise RuntimeError("no content " + slug)
    body, n = clean_content(cnode, slug)
    # categories from sidebar (for display / later bulk)
    cats = sorted({a.get_text().strip() for a in soup.select(".blog-sidebar a")
                   if "/category/" in (a.get("href") or "") and a.get_text().strip().lower() != "all"})
    return {"slug": slug, "title": title, "date_human": dhuman, "date_iso": diso,
            "content": body, "images": n, "cats": cats}

# ---- shell from index.html (CDN tailwind + full dropdown) ----
idx = open("index.html", encoding="utf-8").read()
POST_STYLE = """<style>
.post-body{font-size:18px;line-height:1.8;color:var(--text-dark);}
.post-body p{margin:0 0 1.1em;}
.post-body p[style*="center"]{text-align:center;}
.post-body h1,.post-body h2,.post-body h3{font-family:'Cormorant Garamond',Georgia,serif;color:var(--green-primary);line-height:1.2;margin:1.4em 0 .4em;font-weight:600;}
.post-body h2{font-size:1.9rem;}.post-body h3{font-size:1.5rem;}
.post-body figure{margin:1.8em 0;}
.post-body figure img{display:block;margin:0 auto;max-width:100%;height:auto;}
.post-body figcaption{text-align:center;font-size:14px;color:#6f6f6f;margin-top:.55em;}
.post-body img{max-width:100%;height:auto;}
.post-body a{color:var(--green-primary);text-decoration:underline;}
.post-body ul,.post-body ol{margin:0 0 1.1em 1.3em;}.post-body ul{list-style:disc;}.post-body ol{list-style:decimal;}
.post-body li{margin:.3em 0;}
.post-body strong{font-weight:600;}.post-body em{font-style:italic;}
.post-body blockquote{border-left:3px solid var(--soft-sage);padding-left:1.1em;font-style:italic;color:var(--green-primary);margin:1.4em 0;}
.blog-aside-title{font-size:13px;text-transform:uppercase;letter-spacing:.2em;font-weight:600;color:var(--soft-sage);}
.blog-aside a{display:block;padding:.3em 0;font-size:15px;color:var(--text-dark);text-decoration:none;}
.blog-aside a:hover{color:var(--green-primary);}
</style>
"""
PREFIX = idx[:idx.find("</header>") + len("</header>")].replace("</head>", POST_STYLE + "</head>", 1)
fs = idx.find('<footer id="footer"'); fe = idx.find("</footer>", fs) + len("</footer>")
FOOTER = idx[fs:fe] + "\n</body>\n</html>\n"

def archives_html():
    out = []
    for m in ARCHIVE_MONTHS:
        mm, yy = m.split("-")
        out.append('<a href="blog.html">%s %s</a>' % (MONTHS[int(mm)], yy))
    return "\n          ".join(out)

def cats_html(cats):
    show = cats[:18] if cats else []
    return "\n          ".join('<a href="blog.html">%s</a>' % c for c in show)

def sidebar(cats):
    return ('<aside class="lg:col-span-4 lg:pl-8 lg:border-l blog-aside" style="border-color:rgba(11,65,49,.12);">\n'
            '        <div class="lg:sticky lg:top-28">\n'
            '          <p class="blog-aside-title">Archives</p>\n'
            '          <div class="mt-3">%s</div>\n'
            '          <p class="blog-aside-title mt-10">Categories</p>\n'
            '          <div class="mt-3">%s</div>\n'
            '        </div>\n      </aside>') % (archives_html(), cats_html(cats))

def build_page(p):
    main = ('\n  <main>\n'
            '    <div class="border-b" style="background:var(--ivory);border-color:rgba(11,65,49,.1);">\n'
            '      <div class="mx-auto max-w-[1320px] px-6 lg:px-12 py-5 text-[15px] uppercase tracking-[0.22em]" style="color:var(--green-primary);"><a href="blog.html" class="hover:opacity-80">Blog</a><span class="mx-3">&rarr;</span> <span>%s</span></div>\n'
            '    </div>\n'
            '    <div class="mx-auto max-w-[1320px] px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 py-10 lg:py-14">\n'
            '      <article class="lg:col-span-8">\n'
            '        <p class="text-[14px] uppercase tracking-[0.28em] font-medium" style="color:var(--soft-sage);">%s</p>\n'
            '        <h1 class="mt-4 font-serif text-4xl lg:text-[3rem] leading-[1.1]" style="color:var(--green-primary);">%s</h1>\n'
            '        <div class="post-body mt-8">%s</div>\n'
            '      </article>\n'
            '      %s\n'
            '    </div>\n'
            '  </main>\n') % (p["title"], p["date_human"], p["title"], p["content"], sidebar(p["cats"]))
    page = PREFIX
    ts, te = page.find("<title>"), page.find("</title>")
    if ts != -1:
        page = page[:ts] + "<title>" + p["title"] + " - IPF Natural Perfumery Teacher's Academy" + page[te:]
    return page + main + FOOTER

slugs = sys.argv[1:] or PILOT
meta = []
for s in slugs:
    print("scraping", s, "...")
    p = scrape(s)
    open("blog-%s.html" % s, "w", encoding="utf-8", newline="").write(build_page(p))
    meta.append({k: p[k] for k in ("slug", "title", "date_human", "date_iso", "images", "cats")})
    print("   ", p["title"], "|", p["date_human"], "| imgs:", p["images"], "| cats:", len(p["cats"]), "| chars:", len(p["content"]))

# blog listing
cards = ""
allcats = sorted({c for m in meta for c in m["cats"]})
for p in sorted(meta, key=lambda x: x["date_iso"] or "", reverse=True):
    cards += ('\n        <a href="blog-%s.html" class="block border p-8 hover:border-[rgba(11,65,49,.4)] transition-colors" style="border-color:rgba(11,65,49,.15);background:#fff;text-decoration:none;">'
              '<p class="text-[13px] uppercase tracking-[0.28em] font-medium" style="color:var(--soft-sage);">%s</p>'
              '<h2 class="mt-3 font-serif text-2xl leading-snug" style="color:var(--green-primary);">%s</h2></a>') % (p["slug"], p["date_human"], p["title"])
listing = ('\n  <main>\n'
           '    <section class="py-10 lg:py-14" style="background:var(--ivory);">\n'
           '      <div class="mx-auto max-w-[1100px] px-6 lg:px-12 text-center">\n'
           '        <p class="text-[15px] uppercase tracking-[0.32em] font-medium" style="color:var(--soft-sage);">Journal</p>\n'
           '        <h1 class="mt-4 font-serif text-5xl lg:text-[3.5rem] leading-[1.05]" style="color:var(--green-primary);">Blog</h1>\n'
           '      </div>\n    </section>\n'
           '    <div class="mx-auto max-w-[1320px] px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 py-10 lg:py-14">\n'
           '      <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6">%s\n      </div>\n'
           '      %s\n'
           '    </div>\n  </main>\n') % (cards, sidebar(allcats))
open("blog.html", "w", encoding="utf-8", newline="").write(PREFIX + listing + FOOTER)
json.dump(meta, open("wp-theme/blog/pilot-meta.json", "w", encoding="utf-8"), indent=2, ensure_ascii=False)
print("\nDONE. blog.html +", ", ".join("blog-%s.html" % m["slug"] for m in meta))
