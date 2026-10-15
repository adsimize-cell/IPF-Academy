import re, io, sys, os
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding="utf-8", errors="replace")
css = open(os.path.join(os.path.dirname(__file__), "../ipf-academy/assets/tailwind.css"), encoding="utf-8").read()
for key in sys.argv[1:]:
    hits = [m for m in re.findall(r"[^{}]+\{[^}]*\}", css) if key in m]
    print(key, "->", len(hits))
    for h in hits[:6]:
        print("   ", h[:160])
