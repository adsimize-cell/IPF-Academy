"""Scrape Weebly blog posts from teachers-academy.org into local, styled preview
pages + a metadata JSON, downloading images into assets/blog/<slug>/.

Usage: python wp-theme/blog/scrape_blog.py slug1 slug2 ...
(no args = the 3 pilot slugs)
"""
import sys, os, io, re, json, urllib.request, urllib.parse
from datetime import datetime
from bs4 import BeautifulSoup

sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding="utf-8", errors="replace")
ROOT = r"C:/Users/aswhi/Desktop/Claude/IPF-Academy-HTML"
os.chdir(ROOT)
BASE = "https://www.teachers-academy.org/blog/"
UA = {"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/120 Safari/537.36"}
MONTHS = ["", "January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"]

PILOT = ["australian-scents", "the-language-of-scents", "nefertum-god-of-perfumers"]

def fetch(url):
    req = urllib.request.Request(url, headers=UA)
    return urllib.request.urlopen(req, timeout=30).read()

def human_date(d):
    m = re.match(r"(\d{1,2})/(\d{1,2})/(\d{4})", d.strip())
    if not m:
        return d.strip(), None
    day, mon, yr = int(m.group(1)), int(m.group(2)), int(m.group(3))
    return "%d %s %d" % (day, MONTHS[mon], yr), "%04d-%02d-%02d" % (yr, mon, day)

def dl_image(url, slug):
    clean = url.split("?")[0]
    name = os.path.basename(urllib.parse.urlparse(clean).path)
    name = re.sub(r"[^A-Za-z0-9._-]", "_", name) or "img.jpg"
    outdir = os.path.join("assets", "blog", slug)
    os.makedirs(outdir, exist_ok=True)
    path = os.path.join(outdir, name)
    if not os.path.exists(path):
        try:
            data = fetch(url)
            open(path, "wb").write(data)
        except Exception as e:
            print("   img FAIL", url, e); return None
    return "assets/blog/%s/%s" % (slug, name)

def clean_content(soup_frag, slug):
    # drop non-content tags
    for t in soup_frag.find_all(["script", "style", "noscript", "form", "button"]):
        t.decompose()
    for t in soup_frag.find_all(attrs={"class": re.compile(r"comment|share|social|wsite-com|blog-sharing", re.I)}):
        t.decompose()
    # images: download + rewrite
    imgs = 0
    for img in soup_frag.find_all("img"):
        src = img.get("src") or img.get("data-src") or ""
        if src.startswith("//"):
            src = "https:" + src
        if src.startswith("/"):
            src = "https://www.teachers-academy.org" + src
        if "uploads" not in src:
            img.decompose(); continue
        local = dl_image(src, slug)
        if local:
            img["src"] = local; imgs += 1
        for a in ["srcset", "data-src", "data-image-width", "data-image-height", "width", "height", "style", "class", "sizes"]:
            if img.has_attr(a):
                del img[a]
    # strip class/style everywhere, keep href/src/alt
    for t in soup_frag.find_all(True):
        for a in list(t.attrs):
            if a not in ("href", "src", "alt"):
                del t[a]
    # unwrap layout wrappers
    for t in soup_frag.find_all(["div", "span", "font", "section"]):
        t.unwrap()
    html = soup_frag.decode_contents() if hasattr(soup_frag, "decode_contents") else str(soup_frag)
    html = re.sub(r"(\s*<br\s*/?>\s*){2,}", "\n", html)
    html = re.sub(r"<p>\s*(&nbsp;|\u200b|\s)*</p>", "", html)
    html = re.sub(r"\n{3,}", "\n\n", html)
    return html.strip(), imgs

def scrape(slug):
    html = fetch(BASE + slug).decode("utf-8", "replace")
    soup = BeautifulSoup(html, "html.parser")
    tt = soup.find("title")
    title = tt.get_text().strip() if tt else slug
    title = re.sub(r"\s*[-|]\s*Natural Perfumery Academy\s*$", "", title).strip()
    dnode = soup.select_one(".blog-date")
    draw = dnode.get_text().strip() if dnode else ""
    dhuman, diso = human_date(draw)
    content_node = soup.select_one(".blog-content")
    if not content_node:
        raise RuntimeError("no .blog-content for " + slug)
    body, nimg = clean_content(content_node, slug)
    return {"slug": slug, "title": title, "date_raw": draw, "date_human": dhuman,
            "date_iso": diso, "content": body, "images": nimg}

# shell from index.html (CDN tailwind + full header dropdown)
idx = open("index.html", encoding="utf-8").read()
PREFIX = idx[:idx.find("</header>") + len("</header>")]
POST_STYLE = """<style>
.post-body{font-size:18px;line-height:1.85;color:var(--text-dark);}
.post-body p{margin:0 0 1.25em;}
.post-body h1,.post-body h2,.post-body h3,.post-body h4{font-family:'Cormorant Garamond',Georgia,serif;color:var(--green-primary);line-height:1.2;margin:1.6em 0 .5em;font-weight:600;-webkit-hyphens:manual;hyphens:manual;}
.post-body h2{font-size:2rem;}.post-body h3{font-size:1.5rem;}
.post-body img{max-width:100%;height:auto;display:block;margin:1.8em auto;}
.post-body a{color:var(--green-primary);text-decoration:underline;}
.post-body ul,.post-body ol{margin:0 0 1.25em 1.3em;}.post-body ul{list-style:disc;}.post-body ol{list-style:decimal;}
.post-body li{margin:.3em 0;}
.post-body strong{font-weight:600;}.post-body em{font-style:italic;}
.post-body blockquote{border-left:3px solid var(--soft-sage);padding-left:1.1em;font-style:italic;color:var(--green-primary);margin:1.5em 0;}
</style>
"""
PREFIX = PREFIX.replace("</head>", POST_STYLE + "</head>", 1)
fstart = idx.find('<footer id="footer"')
fend = idx.find("</footer>", fstart) + len("</footer>")
FOOTER = idx[fstart:fend] + "\n</body>\n</html>\n"

def build_page(p):
    main = ('\n  <main>\n'
            '    <div class="border-b" style="background:var(--ivory);border-color:rgba(11,65,49,.1);">\n'
            '      <div class="mx-auto max-w-[1680px] px-6 lg:px-12 py-5 text-[15px] uppercase tracking-[0.22em]" style="color:var(--green-primary);"><a href="blog.html" class="hover:opacity-80">Blog</a><span class="mx-3">&rarr;</span> <span>%s</span></div>\n'
            '    </div>\n'
            '    <article class="mx-auto max-w-[760px] px-6 py-12 lg:py-16">\n'
            '      <p class="text-[14px] uppercase tracking-[0.28em] font-medium" style="color:var(--soft-sage);">%s</p>\n'
            '      <h1 class="mt-4 font-serif text-4xl lg:text-[3rem] leading-[1.1]" style="color:var(--green-primary);">%s</h1>\n'
            '      <div class="post-body mt-10">%s</div>\n'
            '    </article>\n'
            '  </main>\n') % (p["title"], p["date_human"], p["title"], p["content"])
    page = PREFIX
    ts, te = page.find("<title>"), page.find("</title>")
    if ts != -1 and te != -1:
        page = page[:ts] + "<title>" + p["title"] + " - IPF Natural Perfumery Teacher's Academy" + page[te:]
    return page + main + FOOTER

slugs = sys.argv[1:] or PILOT
meta = []
for s in slugs:
    print("scraping", s, "...")
    p = scrape(s)
    open("blog-%s.html" % s, "w", encoding="utf-8", newline="").write(build_page(p))
    meta.append({k: p[k] for k in ("slug", "title", "date_raw", "date_human", "date_iso", "images")})
    print("   ", p["title"], "|", p["date_human"], "| images:", p["images"], "| body chars:", len(p["content"]))

# blog listing preview
cards = ""
for p in sorted(meta, key=lambda x: x["date_iso"] or "", reverse=True):
    cards += ('\n        <a href="blog-%s.html" class="block border p-8 hover:border-[rgba(11,65,49,.4)] transition-colors" style="border-color:rgba(11,65,49,.15);background:#fff;text-decoration:none;">'
              '<p class="text-[13px] uppercase tracking-[0.28em] font-medium" style="color:var(--soft-sage);">%s</p>'
              '<h2 class="mt-3 font-serif text-2xl leading-snug" style="color:var(--green-primary);">%s</h2></a>') % (p["slug"], p["date_human"], p["title"])
listing = ('\n  <main>\n'
           '    <section class="py-12 lg:py-16" style="background:var(--ivory);">\n'
           '      <div class="mx-auto max-w-[1100px] px-6 lg:px-12 text-center">\n'
           '        <p class="text-[15px] uppercase tracking-[0.32em] font-medium" style="color:var(--soft-sage);">Journal</p>\n'
           '        <h1 class="mt-4 font-serif text-5xl lg:text-[3.5rem] leading-[1.05]" style="color:var(--green-primary);">Blog</h1>\n'
           '      </div>\n'
           '    </section>\n'
           '    <section class="py-12 lg:py-16 bg-white"><div class="mx-auto max-w-[1100px] px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 gap-6">%s\n      </div></section>\n'
           '  </main>\n') % cards
open("blog.html", "w", encoding="utf-8", newline="").write(PREFIX + listing + FOOTER)

json.dump(meta, open("wp-theme/blog/pilot-meta.json", "w", encoding="utf-8"), indent=2, ensure_ascii=False)
print("\nDONE. pages: blog.html +", ", ".join("blog-%s.html" % m["slug"] for m in meta))
