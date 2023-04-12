<h2>Codefest 2023 - rijnijssel</h2>
<h4>Frontend: <code>HTML, CSS &amp; javascript</code></h4>
<h4>Backend: <code>Node met Typescript &amp; mongodb</code></h4>
<h3> <a href="#" target="_blank" class="button">bekijk op GitHub</a> <a href="#" target="_blank" class="button">kijkje nemen</a> (de website is <u>niet</u> af en kan fouten bevaten) </h3>

<p>
</p>

<div id="left">
  <link rel="stylesheet" href="https://stackedit.io/style.css" />

  <div class="stackedit__html"><h1 id="codefest-2023">CodeFest 2023</h1>
    <p>Dit wordt uiteindelijk een app backend voor het opdracht die we opkrijgen voor codefest 2023. Hierbij de basis voor snelle start</p>
    <h3 id="techs">Techs</h3>
    <ul>
      <li>Frontend: <code>HTML, CSS &amp; Javascript</code></li>
      <li>Backend: <code>Node met Typescript</code></li>
      <li>GraphQL API: <code>API met encrypted JWT systeem en compression util</code></li>
      <li>2FA login optie (toggle) + na activatie in user paneel auto mail met QR Code (PNG in attachment voor scan in Google Authenticator)</li>
      <li>Login: <code>Server en client kennen alleen encrypted JWT tokens met max sessie van 1 week (+ onthoud device optie 1 week voor termination of door loguit)</code></li>
      <li>Templating: <code>EJS</code></li>
      <li>Dynamic Metadata: <code>Elk pagina krijgt een dynamische meta</code></li>
      <li>Session: <code>Anti sniffing, manipulation en session hijacking systeem</code></li>
      <li>Database: <code>MongoDB</code></li>
      <li>SessionStore komt ook in MongoDB</li>
      <li>Hmac hashing</li>
      <li>JWT</li>
      <li>TOTP &amp; QRCode</li>
      <li>Mail system</li>
    </ul>
    <h3 id="voorbeeld">Voorbeeld</h3>
    <p><code>Dynamic metadata per view rendering (EJS)</code></p>
      <pre class=" language-ts"><code class="prism  language-ts"><span class="token keyword">type</span> acceptableMetas <span class="token operator">=</span>
       <span class="token operator">|</span> <span class="token string">"keywords"</span>
       <span class="token operator">|</span> <span class="token string">"author"</span>
       <span class="token operator">|</span> <span class="token string">"favicon"</span>
       <span class="token operator">|</span> <span class="token string">"og-image"</span>
       <span class="token operator">|</span> <span class="token string">"og-description"</span>
       <span class="token operator">|</span> <span class="token string">"og-title"</span><span class="token punctuation">;</span>
      <span class="token keyword">export</span> <span class="token keyword">type</span> IMeta <span class="token operator">=</span> <span class="token punctuation">{</span>
       <span class="token punctuation">[</span>key <span class="token keyword">in</span> acceptableMetas<span class="token punctuation">]</span><span class="token operator">?</span><span class="token punctuation">:</span> <span class="token keyword">string</span><span class="token punctuation">;</span>
      <span class="token punctuation">}</span> <span class="token operator">&amp;</span> <span class="token punctuation">{</span>
       title<span class="token punctuation">:</span> <span class="token keyword">string</span><span class="token punctuation">;</span>
       description<span class="token punctuation">:</span> <span class="token keyword">string</span><span class="token punctuation">;</span>
       keywords<span class="token operator">?</span><span class="token punctuation">:</span> <span class="token keyword">string</span><span class="token punctuation">;</span>
      <span class="token punctuation">}</span><span class="token punctuation">;</span>
    </code></pre>
  </div>
</div>
