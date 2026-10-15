"""Check that every class used in the theme PHP files exists in the compiled tailwind.css."""
import re, glob, io, sys, os

sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding="utf-8", errors="replace")
ROOT = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
css = open(os.path.join(ROOT, "wp-theme/ipf-academy/assets/tailwind.css"), encoding="utf-8").read()
tokens = set()
for f in glob.glob(os.path.join(ROOT, "wp-theme/ipf-academy/**/*.php"), recursive=True):
    s = open(f, encoding="utf-8").read()
    for m in re.findall(r'class="([^"]*)"', s):
        tokens.update(m.split())
    for m in re.findall(r"class='([^']*)'", s):
        tokens.update(m.split())

def esc(t):
    return re.sub(r"([^A-Za-z0-9_-])", lambda m: "\\" + m.group(1), t)

missing = sorted(t for t in tokens if t and "$" not in t and ("." + esc(t)) not in css)
print("tokens", len(tokens), "missing", len(missing))
print(missing[:60])
