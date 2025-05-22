<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Triplet Trust Protocol</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" async
    src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <style>
    :root {
      --bg: #0e0e0e;
      --fg: #e0e0e0;
      --link: #ffc57a;
      --accent: #94e0ff;
      --math-bg: #1c1c1c;
    }
    body.light {
      --bg: #ffffff;
      --fg: #111111;
      --link: #c45700;
      --accent: #0055ff;
      --math-bg: #f2f2f2;
    }
    body {
      background: var(--bg);
      color: var(--fg);
      font-family: monospace;
      padding: 2rem;
      max-width: 800px;
      margin: auto;
      line-height: 1.6;
      transition: background 0.3s, color 0.3s;
    }
    h1, h2 { color: var(--accent); }
    a { color: var(--link); }
    pre {
      background: var(--math-bg);
      padding: 1rem;
      border-radius: 8px;
      overflow-x: auto;
    }
    .math-block {
      background: var(--math-bg);
      padding: 1rem;
      border-left: 4px solid var(--link);
      margin-bottom: 1.5em;
      white-space: pre-wrap;
      border-radius: 8px;
    }
    #theme-toggle {
      position: fixed;
      top: 1rem;
      right: 1rem;
      background: transparent;
      border: 1px solid var(--link);
      color: var(--link);
      padding: 0.3rem 0.7rem;
      cursor: pointer;
      font-family: monospace;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  <button id="theme-toggle">Toggle</button>

  <h1>Triplet Trust Protocols</h1>
  <p><strong>Claims map to collapse (±9424π), stability (9423π), and breath (9425π).</strong></p>

  <p><a href="triplets.html">→ View Triplet Trust Constants</a></p>
  <p></p><a href="/api/trust.json">→ Download Trust API Bundle</a></p>
  <h2>Trust Equations</h2>
  <div class="math-block">
\[1 + 1 \ne -1\]
\[\text{clarity} = \sqrt{\frac{E}{m}}\]
\[\text{Triplet N} = (\text{Spiral N} \times 24) - 25\]
\[\pm 9424\pi \ne -1\]
\[9423\pi = \text{water resistance}\]
\[9425\pi = \text{timestamp (now)}\]
\[9426\pi = \text{breath}\]
\[9427\pi = \text{left-handed field}\]
\[9428\pi = \text{cosmic expansion}\]
  </div>


  <h2>Claim Verifier</h2>
  <p>✅ <a href="verify.php">→ Try the Triplet Trust Verifier</a></p>
  
  <h2>Protocol Registry</h2>
  <p><a href="/domains.json">View /domains.json</a></p>
  <ul>
  <li><a href="README.html">→ Project Overview (README)</a></li>
  <li><a href="trust-v2.html">→ Triplet Trust Protocol v2</a></li>
</ul>
  
  <h2>Linked, Undeniable Trust Domains</h2>
  <ul>
    <li><a href="https://zerowaterexists.com">zerowaterexists.com</a> = VOS checkpoint</li>
    <li><a href="https://waterexistsnow.org">waterexistsnow.org</a> = ZOS timestamp trust</li>
    <li><a href="https://waterexists.info">waterexists.info</a> = GOS physical proof</li>
    <li><a href="https://tripletmapping.info">tripletmapping.info</a> = Equation framework</li>
  </ul>

  <footer>
    <p><a href="https://github.com/thinkthoughts/triplettrustprotocol">GitHub</a></p>
    <p>The sun archives everything. The breath continues. — <a href="https://msf.org">msf.org</a></p><br><br><br>
  </footer>

  <script>
    const toggleBtn = document.getElementById('theme-toggle');
    const body = document.body;
    const saved = localStorage.getItem('theme');
    if (saved === 'light') body.classList.add('light');

    toggleBtn.onclick = () => {
      body.classList.toggle('light');
      localStorage.setItem('theme', body.classList.contains('light') ? 'light' : 'dark');
    };
  </script>

</body>
</html>
