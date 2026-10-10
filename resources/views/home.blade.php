{{--
    Protocol.com — public landing page.
    Concept: "the route is the P". The reader is a packet. Scrolling transmits it
    hop by hop through a glowing 3D network, along the route that draws the
    Lattice P: up the stem, across the top, round the bowl, home to the junction.
    One fixed WebGL canvas (three.js 0.160.0) sits behind the whole page. The flat
    SVG mark is the nav and footer logo, and the hero's fallback when WebGL is off.
    Dark by default (the client's call: the mark glows); light stays on the toggle.
    Self-contained: inline CSS/JS, Google Fonts only, no Vite build.
    Facts and contact details follow Coherence's other domain pages word-for-word.
    Do not invent prices, dates or owners.
--}}
@php
    $url = 'https://protocol.com/';
    $email = 'team@coherence.com';
    $mailto = 'mailto:team@coherence.com?subject=Domain%20name:%20protocol.com';
    $owner = 'https://coherence.com';
    $ogImage = 'https://protocol.com/og-image.png';
    $ogAlt = 'The Protocol lattice mark, a glowing two-layer network of nodes and links in the shape of a P, beside the PROTOCOL wordmark and the line “Protocol.com is an elite-level .com domain.”';

    $title = 'Protocol.com — an elite-level .com domain';
    $description = 'Protocol.com is an elite-level .com domain. It is owned by Coherence.com and may be in development. Contact team@coherence.com.';

    // The five hops of the route. The traceroute nav and the 3D camera are built from these.
    $hops = [
        ['handshake', '01', 'Handshake', 'the facts, as a TCP handshake'],
        ['word', '02', 'The word', 'six meanings of protocol'],
        ['routes', '03', 'Routes', 'twelve industries'],
        ['questions', '04', 'Questions', 'requests and responses'],
        ['delivered', '05', 'Delivered', 'get in touch'],
    ];

    // tx: you → protocol.com, rx: protocol.com → you. Each message crosses one rung of the 3D P.
    $handshake = [
        ['tx', 'SYN', 'What is protocol.com?'],
        ['rx', 'SYN-ACK', 'protocol.com is an elite-level .com domain.'],
        ['tx', 'ACK', 'Connection established.'],
        ['rx', 'PSH', 'It is owned by Coherence.com and may be in development.'],
        ['rx', 'PSH', 'The name is one English word, protocol: eight letters, with no hyphen and no numerals.'],
        ['rx', 'FIN', null],
    ];

    // The word as a 32-bit header: [term, width in bits, bit range, meaning].
    $meanings = [
        ['Origin', 12, '0–11', 'From Greek prōtokollon, from prōtos, “first”, and kolla, “glue”: the first sheet glued to a papyrus roll, describing its contents.'],
        ['Diplomacy', 10, '12–21', 'The rules of etiquette and precedence that govern state and diplomatic occasions.'],
        ['Treaties', 10, '22–31', 'An agreement that amends or supplements a treaty or international convention, such as the Kyoto Protocol.'],
        ['Science & medicine', 18, '32–49', 'The written plan for an experiment, a clinical trial or a course of medical treatment.'],
        ['Computing', 14, '50–63', 'The rules that let devices exchange data, such as TCP/IP and HTTP, the Hypertext Transfer Protocol.'],
        ['Everyday use', 32, '64–95', 'The accepted or established way of doing something.'],
    ];

    $routes = [
        ['Cybersecurity', 'Security platforms, identity providers and incident-response teams: businesses that run on procedure.'],
        ['Networking & telecoms', 'Carriers, network-equipment makers and connectivity platforms, the word’s home ground.'],
        ['Blockchain & crypto', 'Chains, DeFi platforms and wallets, where “protocol” already names the network itself.'],
        ['AI & agents', 'Agent platforms and model builders setting the rules for how AI systems talk to tools and to each other.'],
        ['Software & APIs', 'Developer platforms, API companies and infrastructure tools built on open standards.'],
        ['Healthcare & clinical research', 'Clinical-trial platforms, research organisations and care providers that work to treatment protocols.'],
        ['Fintech & payments', 'Payment rails, banking infrastructure and settlement networks that move money by agreed rules.'],
        ['Legal & compliance', 'Compliance, regulatory-technology and governance firms that turn rules into everyday practice.'],
        ['Diplomacy & government', 'Public bodies, consular services and civic-tech providers, for whom protocol is part of the job.'],
        ['Events & hospitality', 'Luxury hotels, concierge and VIP services and event producers who know the etiquette.'],
        ['IoT & smart devices', 'Connected-device makers, smart-home platforms and industrial IoT that need one common language.'],
        ['Research & science', 'Laboratories, research institutes and science platforms that write, publish and follow protocols.'],
    ];

    $faqs = [
        ['What is protocol.com?', 'protocol.com is an elite-level .com domain. It is owned by Coherence.com and may be in development.'],
        ['Who owns protocol.com?', 'protocol.com is owned by Coherence.com.'],
        ['How do I get in touch about protocol.com?', 'Email team@coherence.com with the subject “Domain name: protocol.com”.'],
        ['What does the word protocol mean?', 'A protocol is an established set of rules for how something is done: in diplomacy and treaties, in science and medicine, and in computing, where protocols such as TCP/IP and HTTP let devices exchange data. The word comes from the Greek prōtokollon, the first sheet glued to a papyrus roll.'],
        ['What kinds of business could use protocol.com?', 'The name suits cybersecurity, networking and telecoms, blockchain and crypto, AI and agents, software and APIs, healthcare and clinical research, fintech and payments, legal and compliance, diplomacy and government, events and hospitality, IoT and smart devices, and research and science.'],
        ['Is protocol.com one word?', 'Yes. protocol.com is a single English word: eight letters, with no hyphen and no numerals.'],
    ];

    $command = 'mail -s "Domain name: protocol.com" team@coherence.com';

    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            ['@type' => 'WebSite', '@id' => $url.'#website', 'url' => $url, 'name' => 'Protocol.com', 'description' => $description, 'inLanguage' => 'en', 'copyrightHolder' => ['@id' => 'https://coherence.com/#organization'], 'publisher' => ['@id' => 'https://coherence.com/#organization'], 'creator' => ['@id' => 'https://qquantum.ai/#organization']],
            [
                '@type' => 'Organization', '@id' => 'https://coherence.com/#organization', 'name' => 'Coherence', 'legalName' => 'Booth.com Ltd', 'url' => 'https://coherence.com/', 'email' => $email,
                'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer support', 'email' => $email],
            ],
            ['@type' => 'Organization', '@id' => 'https://qquantum.ai/#organization', 'name' => 'QQuantum.ai', 'url' => 'https://qquantum.ai/', 'description' => 'AI systems engineering studio in Barcelona — brand identity, logo and web design, AI agents and custom AI systems.'],
            ['@type' => 'WebPage', '@id' => $url.'#webpage', 'url' => $url, 'name' => $title, 'description' => $description, 'isPartOf' => ['@id' => $url.'#website'], 'inLanguage' => 'en', 'primaryImageOfPage' => ['@type' => 'ImageObject', 'url' => $ogImage, 'width' => 1200, 'height' => 630]],
            [
                '@type' => 'FAQPage', '@id' => $url.'#faq',
                'mainEntity' => array_map(fn ($f) => ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]], $faqs),
            ],
        ],
    ];

    // The Lattice P, flattened: front layer, back layer offset up and right, rungs between.
    // One drawing for every logo (hero fallback, nav, footer); all share the same
    // intro (links draw, nodes pop), idle (packets run the bowl), hover (tilt) and click (broadcast).
    $p2 = [[-.6, -1.15], [-.6, -.62], [-.6, -.1], [-.6, .45], [-.6, 1], [-.2, 1], [.2, 1], [.589, .839], [.75, .45], [.589, .061], [.2, -.1], [-.2, -.1]];
    $chain = [[0, 1], [1, 2], [2, 3], [3, 4], [4, 5], [5, 6], [6, 7], [7, 8], [8, 9], [9, 10], [10, 11], [11, 2]];
    $fr = array_map(fn ($p) => [round(40 + ($p[0] + .6) * 88, 1), round(16 + (1 - $p[1]) * 78, 1)], $p2);
    $bk = array_map(fn ($p) => [round($p[0] + 9, 1), round($p[1] - 7, 1)], $fr);
    $loop = 'M'.collect([2, 3, 4, 5, 6, 7, 8, 9, 10, 11])->map(fn ($i) => $fr[$i][0].' '.$fr[$i][1])->implode(' L').' Z';

    $mark = function () use ($fr, $bk, $chain, $loop): string {
        $seg = fn ($a, $b) => "M{$a[0]} {$a[1]} L{$b[0]} {$b[1]}";
        $back = collect($chain)->map(fn ($e) => $seg($bk[$e[0]], $bk[$e[1]]))->implode(' ');
        $rungs = collect(range(0, 11))->map(fn ($i) => $seg($fr[$i], $bk[$i]))->implode(' ');
        $edges = collect($chain)->map(fn ($e, $j) => '<path class="e" pathLength="1" style="--i: '.$j.'" d="'.$seg($fr[$e[0]], $fr[$e[1]]).'"></path>')->implode('');
        $backNodes = collect($bk)->map(fn ($p) => '<circle class="nb" cx="'.$p[0].'" cy="'.$p[1].'" r="3.4"></circle>')->implode('');
        $nodes = collect($fr)->map(fn ($p, $k) => '<g class="nc" style="--d: '.round(hypot($p[0] - $fr[0][0], $p[1] - $fr[0][1]) / 190, 2).'"><circle class="n" style="--k: '.$k.'" cx="'.$p[0].'" cy="'.$p[1].'" r="6.2"></circle></g>')->implode('');
        $packets = collect([0, 1, 2])->map(fn ($i) => '<circle class="pk" r="3.4"><animateMotion dur="7.5s" repeatCount="indefinite" begin="-'.($i * 2.5).'s" path="'.$loop.'"></animateMotion></circle>')->implode('');
        [$x0, $y0] = $fr[0];

        return '<span class="mk-c"><span class="mk-h"><svg class="mk-svg" viewBox="30 2 146 192" aria-hidden="true" focusable="false">'
            .'<g class="mk-back"><path class="bk" d="'.$back.'"></path><path class="rg" d="'.$rungs.'"></path>'.$backNodes.'</g>'
            .'<circle class="bc" cx="'.$x0.'" cy="'.$y0.'" r="9"></circle><circle class="bc bc2" cx="'.$x0.'" cy="'.$y0.'" r="9"></circle>'
            .'<g class="mk-front">'.$edges.'</g><g class="mk-nodes">'.$nodes.'</g><g class="mk-pk">'.$packets.'</g>'
            .'</svg></span></span>';
    };

    // Theme toggle: two nodes on a link; the lit node swaps sides.
    $toggle = '<svg viewBox="0 0 28 16" aria-hidden="true"><path class="tt-l" d="M5 8 H23"></path><circle class="tt-a" cx="5" cy="8" r="3.6"></circle><circle class="tt-b" cx="23" cy="8" r="3.6"></circle><circle class="tt-p" cx="23" cy="8" r="2"></circle></svg>';
    $arrow = '<svg class="ar" viewBox="0 0 16 16" aria-hidden="true"><path d="M2 8 H13 M9 4 L13 8 L9 12"></path></svg>';

    $coherence = file_get_contents(resource_path('svg/coherence.svg'));
    $qquantum = file_get_contents(resource_path('svg/qquantum.svg'));
@endphp
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
<link rel="canonical" href="{{ $url }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Protocol.com">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $ogAlt }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $ogImage }}">
<meta name="twitter:image:alt" content="{{ $ogAlt }}">
<meta name="theme-color" content="#060A14">
<meta name="color-scheme" content="dark light">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="alternate" type="text/plain" href="/llms.txt" title="LLM summary">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@500;600;700&amp;family=Red+Hat+Mono:wght@400;500;600&amp;family=Red+Hat+Text:wght@400;500;600&amp;display=swap">
<link rel="modulepreload" href="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js" crossorigin>
<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
@verbatim
<script>
(function () {
  /* Dark is the default; only an explicit toggle stores a choice. */
  var d = document.documentElement, t = null;
  try { t = localStorage.getItem('theme'); } catch (e) {}
  d.dataset.theme = t === 'light' ? 'light' : 'dark';
  d.classList.add('js');
  var m = document.querySelector('meta[name="theme-color"]');
  if (m) m.content = d.dataset.theme === 'light' ? '#EEF2F8' : '#060A14';
})();
</script>
<script type="importmap">
{"imports":{"three":"https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js","three/addons/":"https://cdn.jsdelivr.net/npm/three@0.160.0/examples/jsm/"}}
</script>
<style>
@property --w{syntax:'<percentage>';inherits:false;initial-value:100%}

/* ---------- Tokens: dark (default) / light ---------- */
:root{
  --bg:#060A14;--bg2:#0A1222;--panel:rgba(7,12,24,.84);--panel-solid:#0A1222;
  --ink:#E7EEF8;--muted:#96A3B8;--line:rgba(156,203,255,.16);--line-2:rgba(156,203,255,.34);
  --acc:#4FD1FF;--acc-ink:#04111C;--acc-t:#4FD1FF;--acc-2:#9CCBFF;
  --glow:rgba(79,209,255,.55);--glow-soft:rgba(79,209,255,.22);--halo:rgba(6,10,20,.9);
  --term:#02050C;--term-ink:#CFE6FF;
  --mk-front:#9CCBFF;--mk-node:#9CCBFF;--mk-back:#5F8FD6;--mk-rung:#4D6A96;--mk-acc:#4FD1FF;--mk-glow:drop-shadow(0 0 5px rgba(79,209,255,.45));
  --display:'Red Hat Display',system-ui,sans-serif;--text:'Red Hat Text',system-ui,sans-serif;--mono:'Red Hat Mono',ui-monospace,monospace;
  --cut:14px;
  color-scheme:dark;
}
:root[data-theme="light"]{
  --bg:#EEF2F8;--bg2:#E2E9F3;--panel:rgba(238,242,248,.88);--panel-solid:#F6F8FC;
  --ink:#0D1B3D;--muted:#46577A;--line:rgba(20,48,110,.16);--line-2:rgba(20,48,110,.34);
  --acc:#0E9BD6;--acc-ink:#04111C;--acc-t:#0B5F8C;--acc-2:#14306E;
  --glow:rgba(14,155,214,0);--glow-soft:rgba(14,155,214,0);--halo:rgba(238,242,248,.9);
  --term:#0D1B3D;--term-ink:#E7EEF8;
  --mk-front:#14306E;--mk-node:#14306E;--mk-back:#6F8FC4;--mk-rung:#9DB2D6;--mk-acc:#0E9BD6;--mk-glow:none;
  color-scheme:light;
}
*{box-sizing:border-box}
html{-webkit-text-size-adjust:100%;scroll-behavior:smooth;background:var(--bg);interpolate-size:allow-keywords}
html,body{overflow-x:clip}
body{margin:0;background:var(--bg);color:var(--ink);font:400 17px/1.62 var(--text);-webkit-font-smoothing:antialiased}
a{color:inherit}
:focus-visible{outline:2px solid var(--acc-t);outline-offset:3px}
.sr{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);clip-path:inset(50%);white-space:nowrap}
.wrap{width:min(1320px,100%);margin:0 auto;padding:0 20px}
@media (min-width:760px){.wrap{padding:0 32px}}
@media (min-width:1200px){.wrap{padding:0 48px}}
.skip{position:fixed;left:14px;top:-80px;z-index:200;padding:12px 16px;background:var(--acc);color:var(--acc-ink);font:600 15px/1 var(--display);text-decoration:none}
.skip:focus{top:14px}

/* Chamfered corners: top-left and bottom-right cut at 45°, with the cut edges drawn. */
.ch{position:relative;clip-path:polygon(var(--cut) 0,100% 0,100% calc(100% - var(--cut)),calc(100% - var(--cut)) 100%,0 100%,0 var(--cut))}
.ch-b{border:1px solid var(--line)}
.ch-b::before,.ch-b::after{content:"";position:absolute;width:var(--cut);height:var(--cut);pointer-events:none;background:linear-gradient(to bottom right,transparent calc(50% - .9px),var(--line-2) calc(50% - .45px),var(--line-2) calc(50% + .45px),transparent calc(50% + .9px))}
.ch-b::before{top:-1px;left:-1px}
.ch-b::after{bottom:-1px;right:-1px}
.glass{background:var(--panel);-webkit-backdrop-filter:blur(18px) saturate(1.25);backdrop-filter:blur(18px) saturate(1.25)}

/* ---------- The network: one fixed canvas behind everything ---------- */
.net{position:fixed;left:0;top:0;width:100%;height:100vh;height:100lvh;display:block;z-index:0;pointer-events:none}
.net-fb{position:fixed;inset:0;z-index:0;pointer-events:none;background-image:radial-gradient(circle,var(--line-2) 1.1px,transparent 1.7px);background-size:34px 34px;-webkit-mask-image:radial-gradient(ellipse at 62% 38%,#000,transparent 72%);mask-image:radial-gradient(ellipse at 62% 38%,#000,transparent 72%)}
.gl-on .net-fb{display:none}
main,.foot{position:relative;z-index:2}
.you{position:fixed;left:0;top:0;z-index:1;pointer-events:none;opacity:0;transition:opacity .35s;will-change:transform}
.you.on{opacity:1}
.you span{position:absolute;left:16px;bottom:16px;padding:5px 8px 5px 9px;font:600 10.5px/1 var(--mono);letter-spacing:.16em;text-transform:uppercase;color:var(--acc-t);border:1px solid var(--line-2);background:var(--panel);white-space:nowrap}
.you::before{content:"";position:absolute;left:3px;bottom:3px;width:18px;height:1px;background:var(--line-2);transform-origin:0 0;transform:rotate(-45deg)}

/* ---------- The mark (flat Lattice P) ---------- */
.mk{appearance:none;background:none;border:0;padding:0;margin:0;color:inherit;font:inherit;cursor:pointer;text-decoration:none;-webkit-tap-highlight-color:transparent;perspective:700px}
.mk-c,.mk-h{display:block;transform-style:preserve-3d}
.mk-c{perspective:700px}
.mk-h{transition:transform .6s cubic-bezier(.2,.7,.2,1)}
.mk:hover .mk-h,.mk:focus-visible .mk-h{transform:rotateY(-18deg) rotateX(9deg)}
.mk-svg{display:block;width:100%;height:100%;overflow:visible;filter:var(--mk-glow)}
.mk-svg .bk{fill:none;stroke:var(--mk-back);stroke-width:3;stroke-linecap:round;stroke-linejoin:round;opacity:.8}
.mk-svg .rg{fill:none;stroke:var(--mk-rung);stroke-width:1.6;stroke-linecap:round}
.mk-svg .nb{fill:var(--mk-back)}
.mk-svg .e{fill:none;stroke:var(--mk-front);stroke-width:5.4;stroke-linecap:round;stroke-dasharray:1 1}
.mk-svg .n{fill:var(--mk-node);stroke:var(--bg);stroke-width:2.6;transform-box:fill-box;transform-origin:center}
.mk-svg .nc{transform-box:fill-box;transform-origin:center}
.mk-svg .pk{fill:var(--mk-acc)}
.mk-svg .bc{fill:none;stroke:var(--mk-acc);stroke-width:1.6;opacity:0;transform-box:fill-box;transform-origin:center}
.mk--sm .e{stroke-width:10}
.mk--sm .n{r:9.5;stroke-width:3.5}
.mk--sm .bk{stroke-width:5.5;opacity:.7}
.mk--sm .rg{display:none}
.mk--sm .nb{r:4.6}
.mk--sm .pk{r:5.4}
.mk--sm .bc{stroke-width:4}
/* intro: links draw, nodes pop, the back layer and packets follow (waits for .play) */
.js .mk:not(.play) .e{stroke-dashoffset:1}
.js .mk:not(.play) .n{transform:scale(0)}
.js .mk:not(.play) .mk-back,.js .mk:not(.play) .mk-pk{opacity:0}
.mk.play .e{animation:mk-draw .55s cubic-bezier(.3,.7,.3,1) calc(.2s + var(--i) * .075s) backwards}
.mk.play .n{animation:mk-pop .5s cubic-bezier(.34,1.56,.64,1) calc(.08s + var(--k) * .08s) backwards,mk-breathe 3.6s ease-in-out calc(1.8s + var(--k) * .3s) infinite}
.mk.play .mk-back{animation:mk-fade .8s ease-out 1.1s backwards}
.mk.play .mk-pk{animation:mk-fade .6s ease-out 1.7s backwards}
@keyframes mk-draw{from{stroke-dashoffset:1}}
@keyframes mk-pop{from{transform:scale(0)}}
@keyframes mk-breathe{50%{transform:scale(1.16)}}
@keyframes mk-fade{from{opacity:0}}
/* click: a broadcast from the base node, a wave through the nodes and one turn of the lattice */
.mk.ca .mk-c{animation:mk-spin-a 1.15s cubic-bezier(.6,0,.25,1)}
.mk.cb .mk-c{animation:mk-spin-b 1.15s cubic-bezier(.6,0,.25,1)}
@keyframes mk-spin-a{to{transform:rotateY(360deg)}}
@keyframes mk-spin-b{to{transform:rotateY(360deg)}}
.mk.ca .bc{animation:mk-ring-a 1.3s cubic-bezier(.2,.7,.3,1)}
.mk.cb .bc{animation:mk-ring-b 1.3s cubic-bezier(.2,.7,.3,1)}
.mk.ca .bc2,.mk.cb .bc2{animation-delay:.24s}
@keyframes mk-ring-a{0%{opacity:.95;transform:scale(1)}100%{opacity:0;transform:scale(16)}}
@keyframes mk-ring-b{0%{opacity:.95;transform:scale(1)}100%{opacity:0;transform:scale(16)}}
.mk.ca .nc{animation:mk-flash-a .6s ease-out calc(var(--d) * .6s)}
.mk.cb .nc{animation:mk-flash-b .6s ease-out calc(var(--d) * .6s)}
@keyframes mk-flash-a{30%{transform:scale(1.75)}}
@keyframes mk-flash-b{30%{transform:scale(1.75)}}
.wm{display:block;font:600 16px/1 var(--display);letter-spacing:.32em;padding-left:.32em;white-space:nowrap}
.lockup{display:inline-flex;align-items:center;gap:12px}
.lockup .mk-c{height:34px;aspect-ratio:146/192}
.lockup .wm{font-size:14px;padding-left:0}

/* ---------- Traceroute console (nav) ---------- */
.console{position:fixed;z-index:60;top:14px;left:14px;font-family:var(--mono)}
.c-bar{--cut:12px;display:flex;align-items:center;gap:4px;height:60px;padding:0 6px 0 16px}
.c-bar .lockup{min-height:44px;margin-right:10px}
.c-sep{width:1px;height:28px;background:var(--line);margin:0 6px}
.hops{position:relative;display:flex;list-style:none;margin:0;padding:0}
.hops::before{content:"";position:absolute;left:22px;right:22px;top:50%;height:1px;background:var(--line-2)}
.hops a{position:relative;display:block;width:44px;height:44px}
.hops a::before{content:"";position:absolute;left:50%;top:50%;width:9px;height:9px;margin:-4.5px 0 0 -4.5px;border-radius:50%;background:var(--bg);box-shadow:inset 0 0 0 1.5px var(--line-2);transition:background .3s,box-shadow .3s,transform .3s}
.hops a.done::before{background:var(--acc-2);box-shadow:none}
.hops a[aria-current]::before{background:var(--acc);box-shadow:0 0 0 4px var(--glow-soft),0 0 14px var(--glow);transform:scale(1.25)}
.hops a:hover::before{box-shadow:inset 0 0 0 1.5px var(--acc-t)}
.hops .pk{position:absolute;top:50%;left:0;width:5px;height:5px;margin:-2.5px 0 0 -2.5px;border-radius:50%;background:var(--acc);box-shadow:0 0 10px var(--glow);transform:translateX(calc(var(--hop, 0) * 44px - 22px * min(1, var(--hop, 0))));transition:transform .7s cubic-bezier(.6,0,.2,1)}
.ro{display:flex;flex-direction:column;gap:5px;margin:0 6px 0 10px;min-width:118px;font-size:11px;line-height:1;letter-spacing:.12em;text-transform:uppercase}
.ro-n{color:var(--muted)}
.ro-s{color:var(--acc-t);font-weight:600}
.c-tog{display:inline-flex;align-items:center;justify-content:center;gap:8px;min-width:44px;height:44px;padding:0 12px;border:1px solid var(--line);background:transparent;color:var(--ink);font:600 11px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;cursor:pointer}
.c-tog svg{width:12px;height:12px;fill:none;stroke:currentColor;stroke-width:2;transition:transform .3s}
.console.open .c-tog svg{transform:rotate(180deg)}
.c-tog:hover{border-color:var(--line-2)}
.trace{--cut:12px;margin-top:8px;padding:14px 8px 10px;display:none}
.console.open .trace{display:block;animation:tr-in .45s cubic-bezier(.2,.7,.2,1)}
@keyframes tr-in{from{clip-path:inset(0 0 100% 0)}to{clip-path:inset(0 0 0 0)}}
.cmd{margin:0 10px 10px;font-size:13px;color:var(--muted)}
.cmd b{color:var(--acc-t);font-weight:500}
.tr-list{list-style:none;margin:0;padding:0}
.tr-list a{display:grid;grid-template-columns:30px minmax(0,1fr) auto;align-items:center;gap:10px;min-height:46px;padding:4px 10px;text-decoration:none;font-size:13px;color:var(--ink)}
.tr-list a:hover{background:rgba(79,209,255,.07)}
.t-no{color:var(--muted)}
.t-name{display:flex;flex-direction:column;gap:3px;text-transform:lowercase}
.t-name small{font-size:11px;color:var(--muted);text-transform:none;letter-spacing:0}
.t-st{font-size:11px;letter-spacing:.14em;color:var(--muted)}
.tr-list a.done .t-st{color:var(--acc-2)}
.tr-list a[aria-current] .t-no,.tr-list a[aria-current] .t-st{color:var(--acc-t)}
.tr-list a[aria-current] .t-name{color:var(--acc-t)}
.sheet-x{display:none}

/* top-right: theme + get in touch */
.tools{position:fixed;z-index:60;top:14px;right:14px;display:flex;gap:8px}
.tt{--cut:10px;display:inline-flex;align-items:center;justify-content:center;gap:10px;height:48px;padding:0 14px;color:var(--ink);font:600 11px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;cursor:pointer}
.tt:focus-visible{outline:0;box-shadow:inset 0 0 0 2px var(--acc-t)}
.tt svg{width:28px;height:16px;overflow:visible}
.tt .tt-l{stroke:var(--line-2);stroke-width:1.5}
.tt circle{transition:cx .45s cubic-bezier(.6,0,.2,1),fill .3s,stroke .3s}
.tt .tt-a,.tt .tt-b{fill:var(--bg);stroke:var(--line-2);stroke-width:1.5}
.tt .tt-p{fill:var(--acc);filter:drop-shadow(0 0 4px var(--glow))}
[data-theme="dark"] .tt .tt-b{fill:var(--acc);stroke:var(--acc)}
[data-theme="light"] .tt .tt-a{fill:var(--acc-2);stroke:var(--acc-2)}
[data-theme="light"] .tt .tt-p{cx:5px;fill:#fff}
.tt-t::after{content:"Dark"}
[data-theme="light"] .tt-t::after{content:"Light"}

/* ---------- Buttons ---------- */
.btn{position:relative;isolation:isolate;display:inline-flex;align-items:center;justify-content:center;gap:10px;min-height:48px;padding:0 22px;font:600 15px/1 var(--display);letter-spacing:.02em;color:var(--acc-ink);text-decoration:none;white-space:nowrap;filter:drop-shadow(0 0 16px var(--glow-soft));transition:filter .3s}
.btn::before{content:"";position:absolute;inset:0;z-index:-1;background:var(--acc);clip-path:polygon(11px 0,100% 0,100% calc(100% - 11px),calc(100% - 11px) 100%,0 100%,0 11px)}
.btn:hover{filter:drop-shadow(0 0 22px var(--glow))}
.btn .ar{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;transition:transform .3s}
.btn:hover .ar{transform:translateX(3px)}
.btn--ghost{color:var(--ink);filter:none}
.btn--ghost::before{background:rgba(156,203,255,.06);box-shadow:inset 0 0 0 1px var(--line-2)}
.btn--ghost:hover{filter:none}
.btn--ghost:hover::before{background:rgba(156,203,255,.12)}
[data-theme="light"] .btn--ghost::before{background:rgba(20,48,110,.04)}
.btn--down .ar{transform:rotate(90deg)}
.btn--down:hover .ar{transform:rotate(90deg) translateX(3px)}

/* ---------- Hero: the mark, then the packet header ---------- */
.hero{position:relative;min-height:100vh;min-height:100svh;display:grid;grid-template-rows:minmax(0,1fr) auto;padding:92px 0 clamp(14px,2.6vh,28px)}
.hero-stage{position:relative;min-height:0}
.hero-mark{position:absolute;left:66%;top:50%;transform:translate(-50%,-50%);display:flex;flex-direction:column;align-items:center;gap:clamp(12px,2vh,22px)}
.hero-mark .mk-c{height:clamp(200px,calc(100svh - 460px),520px);aspect-ratio:146/192;transition:opacity .7s}
.hero-mark .wm{font-size:clamp(17px,1.2vw + 4px,22px);color:var(--ink);text-shadow:0 0 24px var(--glow-soft)}
.gl-on .hero-mark .mk-c{opacity:0}
.ruler{display:grid;grid-template-columns:repeat(32,minmax(0,1fr));height:18px;margin:0 0 6px;font:500 10px/1 var(--mono);color:var(--muted)}
.ruler span{border-left:1px solid var(--line);padding:1px 0 0 4px;text-shadow:0 0 6px var(--halo)}
.ruler span.bd{border-left-color:var(--acc-t)}
.ruler span:last-child{border-right:1px solid var(--line);text-align:right;padding:1px 4px 0 0}
.strip{--cut:16px;display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);box-shadow:inset 0 1px 0 rgba(156,203,255,.1),inset 0 0 70px rgba(79,209,255,.04)}
.field{position:relative;min-width:0;padding:20px 26px 24px}
.f-subject{grid-column:1/-1;border-bottom:1px solid var(--line)}
.f-reply{border-left:1px solid var(--line)}
.f-reply .lbl::after,.f-payload .lbl::after{max-width:60%}
.lbl{display:flex;align-items:center;gap:10px;margin:0 0 14px;font:500 11px/1 var(--mono);letter-spacing:.16em;text-transform:uppercase;color:var(--muted)}
.lbl b{font-weight:600;color:var(--acc-t)}
.lbl::after{content:"";flex:1;height:1px;background:linear-gradient(90deg,var(--line-2),transparent)}
.hero h1{margin:0;font:600 clamp(32px,2.4vw + 14px,58px)/1.04 var(--display);letter-spacing:-.026em;text-wrap:balance}
.hero h1 em{font-style:normal;white-space:nowrap;color:var(--acc-t);text-shadow:0 0 28px var(--glow)}
.f-payload .lede{margin:0;color:var(--muted);max-width:46ch;text-wrap:pretty}
.f-reply{display:flex;flex-direction:column}
.f-reply .contact{margin-top:auto;padding-top:14px}
.ctas{display:flex;flex-wrap:wrap;gap:10px}
.contact{margin:16px 0 0;font:500 13px/1.5 var(--mono);color:var(--muted)}
.contact a{color:var(--ink);text-decoration:underline;text-decoration-color:var(--line-2);text-underline-offset:4px}
.contact a:hover{text-decoration-color:var(--acc-t)}

/* ---------- Hops (sections) ---------- */
.hop{position:relative;display:flex;align-items:center;min-height:100vh;min-height:100svh;padding:clamp(100px,14vh,160px) 0}
.hop>.wrap{width:100%}
.col{width:min(640px,47%)}
.hop.r .col{margin-left:auto}
.col--wide{width:min(720px,54%)}
.hoplbl{--cut:18px;display:flex;align-items:center;gap:14px;margin:0;padding:22px clamp(24px,2.6vw,40px) 4px;font:500 12px/1 var(--mono);letter-spacing:.16em;text-transform:uppercase;color:var(--muted);border-bottom:0;clip-path:polygon(var(--cut) 0,100% 0,100% 100%,0 100%,0 var(--cut))}
.hoplbl.ch-b::after,.frame.ch-b::before{display:none}
.hoplbl .no{color:var(--acc-t);font-weight:600}
.hoplbl .ln{position:relative;flex:1;height:1px;background:var(--line-2);transform-origin:left}
.hoplbl .ln::before{content:"";position:absolute;left:-5px;top:-4.5px;width:10px;height:10px;border-radius:50%;background:var(--acc);box-shadow:0 0 12px var(--glow)}
.hoplbl .ln::after{content:"";position:absolute;left:0;top:-2.5px;width:6px;height:6px;border-radius:50%;background:var(--acc);box-shadow:0 0 10px var(--glow);opacity:0}
.frame{--cut:18px;--ctl:0px;position:relative;border-top:0;padding:18px clamp(24px,2.6vw,40px) clamp(24px,2.6vw,40px);clip-path:polygon(var(--ctl) 0,var(--w) 0,var(--w) calc(100% - var(--cut)),calc(var(--w) - var(--cut)) 100%,0 100%,0 var(--ctl));box-shadow:inset 0 1px 0 rgba(156,203,255,.1),inset 0 0 70px rgba(79,209,255,.035)}
.frame h2{margin:0 0 14px;font:600 clamp(30px,1.9vw + 14px,46px)/1.06 var(--display);letter-spacing:-.022em;text-wrap:balance}
.frame .intro{margin:0 0 28px;color:var(--muted);max-width:54ch;text-wrap:pretty}

/* reveals: the hop's node pops, its link draws, then the frame arrives left to right */
.js [data-rv].hoplbl:not(.in) .ln{transform:scaleX(0)}
.js [data-rv].hoplbl:not(.in) .ln::before{transform:scale(0)}
.js [data-rv].hoplbl:not(.in) .no,.js [data-rv].hoplbl:not(.in) .nm{opacity:0}
.hoplbl .ln{transition:transform .7s cubic-bezier(.6,0,.2,1) .15s}
.hoplbl .ln::before{transition:transform .45s cubic-bezier(.34,1.56,.64,1)}
.hoplbl .no,.hoplbl .nm{transition:opacity .4s .5s}
.hoplbl.in .ln::after{animation:rule-pk 2.6s cubic-bezier(.6,0,.4,1) 1s infinite}
@keyframes rule-pk{0%{left:0;opacity:0}10%{opacity:1}80%{opacity:1}100%{left:calc(100% - 6px);opacity:0}}
.js .frame[data-rv]:not(.in){--w:0%}
.frame[data-rv]{transition:--w 1.1s cubic-bezier(.65,0,.2,1) .25s}

/* 01 handshake: a sequence diagram whose arrows carry the facts */
.lanes{display:flex;justify-content:space-between;margin:0 0 2px;font:600 11px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase}
.lanes span{--cut:7px;padding:8px 11px;background:var(--bg2);color:var(--ink)}
.lanes span:last-child{color:var(--acc-t)}
.seq{position:relative;list-style:none;margin:0;padding:10px 0 4px}
.seq::before,.seq::after{content:"";position:absolute;top:0;bottom:0;width:1px;background:repeating-linear-gradient(to bottom,var(--line-2) 0 5px,transparent 5px 10px)}
.seq::before{left:0}
.seq::after{right:0}
.m{position:relative;padding:10px 20px 24px}
.m.rx{text-align:right}
.m .fl{display:inline-block;margin:0 0 5px;font:600 10.5px/1 var(--mono);letter-spacing:.14em;color:var(--acc-t)}
.m p{margin:0;font-size:16px;line-height:1.45}
.m p a{color:var(--acc-t);text-underline-offset:3px}
.m .wire{position:absolute;left:0;right:0;bottom:9px;height:9px}
.m .wire::before{content:"";position:absolute;left:0;right:6px;top:4px;height:1.5px;background:var(--acc-t);transform-origin:left;opacity:.85}
.m .wire::after{content:"";position:absolute;right:0;top:0;width:9px;height:9px;background:var(--acc-t);clip-path:polygon(0 0,100% 50%,0 100%)}
.m.rx .wire::before{left:6px;right:0;background:var(--ink);transform-origin:right;opacity:.6}
.m.rx .wire::after{left:0;right:auto;background:var(--ink);opacity:.75;clip-path:polygon(100% 0,0 50%,100% 100%)}
.m .wire i{position:absolute;top:1px;left:0;width:7px;height:7px;border-radius:50%;background:var(--acc);box-shadow:0 0 10px var(--glow);opacity:0}
.m.rx .wire i{left:auto;right:0;background:var(--ink)}
.js .frame:not(.in) .m .wire::before{transform:scaleX(0)}
.js .frame:not(.in) .m .wire::after,.js .frame:not(.in) .m .fl,.js .frame:not(.in) .m p{opacity:0}
.m .wire::before{transition:transform .6s cubic-bezier(.6,0,.2,1) calc(1s + var(--i) * .32s)}
.m .wire::after{transition:opacity .2s calc(1.45s + var(--i) * .32s)}
.m .fl,.m p{transition:opacity .4s calc(1.1s + var(--i) * .32s)}
.frame.in .m.tx .wire i{animation:pk-tx .65s cubic-bezier(.6,0,.2,1) calc(1s + var(--i) * .32s)}
.frame.in .m.rx .wire i{animation:pk-rx .65s cubic-bezier(.6,0,.2,1) calc(1s + var(--i) * .32s)}
.m:hover .wire i,.m:focus-within .wire i{animation:pk-tx-h 1.1s cubic-bezier(.6,0,.2,1) infinite}
.m.rx:hover .wire i,.m.rx:focus-within .wire i{animation-name:pk-rx-h}
@keyframes pk-tx{0%{left:0;opacity:1}90%{opacity:1}100%{left:calc(100% - 9px);opacity:0}}
@keyframes pk-rx{0%{right:0;opacity:1}90%{opacity:1}100%{right:calc(100% - 9px);opacity:0}}
@keyframes pk-tx-h{0%{left:0;opacity:1}90%{opacity:1}100%{left:calc(100% - 9px);opacity:0}}
@keyframes pk-rx-h{0%{right:0;opacity:1}90%{opacity:1}100%{right:calc(100% - 9px);opacity:0}}

/* 02 the word: an RFC-style 32-bit header; each field is one meaning */
.bits{display:grid;grid-template-columns:repeat(32,minmax(0,1fr));margin:0 0 6px;font:500 9.5px/1 var(--mono);color:var(--muted)}
.bits span{text-align:center;padding:2px 0}
.bits span:nth-child(8n+1){color:var(--acc-t)}
.fields{display:grid;grid-template-columns:repeat(32,minmax(0,1fr));margin:0;border-top:1px solid var(--line-2);border-left:1px solid var(--line-2)}
.fld{grid-column:span var(--s);min-width:0;padding:14px 14px 16px;border-right:1px solid var(--line-2);border-bottom:1px solid var(--line-2);transition:background .3s}
.fld dt{margin:0 0 8px;font:600 16px/1.2 var(--display);transition:color .3s}
.fld dt .b{display:block;margin:0 0 7px;font:500 10px/1 var(--mono);letter-spacing:.1em;color:var(--muted)}
.fld dd{margin:0;font-size:14px;line-height:1.5;color:var(--muted);overflow-wrap:break-word}
.fld:hover,.fld.on{background:rgba(79,209,255,.07)}
[data-theme="light"] .fld:hover,[data-theme="light"] .fld.on{background:rgba(14,155,214,.08)}
.fld:hover dt,.fld.on dt{color:var(--acc-t)}
.js .frame:not(.in) .fld{opacity:0}
.fld{transition:opacity .5s calc(.9s + var(--n) * .12s),background .3s}

/* 03 routes: a routing table */
.rt{width:100%;border-collapse:collapse}
.rt thead th{padding:0 12px 12px;border-bottom:1px solid var(--line-2);font:500 11px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;color:var(--muted);text-align:left}
.rt td,.rt tbody th{padding:13px 12px;border-bottom:1px solid var(--line);vertical-align:top;text-align:left}
.rt .n{width:58px;white-space:nowrap;font:500 12px/1.6 var(--mono);color:var(--muted)}
.rt .n::before{content:"";display:inline-block;width:8px;height:8px;margin:0 10px 1px 0;border-radius:50%;box-shadow:inset 0 0 0 1.5px var(--line-2);vertical-align:middle;transition:background .3s,box-shadow .3s}
.rt tbody th{width:36%;font:600 16px/1.35 var(--display);transition:color .3s}
.rt .via{font-size:14.5px;line-height:1.5;color:var(--muted)}
.rt tbody tr{transition:background .35s}
.rt tbody tr.on{background:linear-gradient(90deg,rgba(79,209,255,.11),transparent 85%)}
[data-theme="light"] .rt tbody tr.on{background:linear-gradient(90deg,rgba(14,155,214,.12),transparent 85%)}
.rt tbody tr.on th{color:var(--acc-t)}
.rt tbody tr.on .n::before{background:var(--acc);box-shadow:0 0 10px var(--glow)}
.js .frame:not(.in) .rt tbody tr{opacity:0}
.rt tbody tr{transition:opacity .4s calc(.9s + var(--n) * .06s),background .35s}

/* 04 questions: requests and responses */
.qa{border-top:1px solid var(--line-2)}
.qa details{border-bottom:1px solid var(--line)}
.qa summary{display:grid;grid-template-columns:auto minmax(0,1fr) auto;align-items:center;gap:14px;min-height:62px;padding:12px 4px;cursor:pointer;list-style:none;font:600 17px/1.35 var(--display)}
.qa summary::-webkit-details-marker{display:none}
.qa summary:hover .q{color:var(--acc-t)}
.tag{--cut:5px;display:inline-block;padding:6px 8px;font:600 10.5px/1 var(--mono);letter-spacing:.12em}
.tag--req{color:var(--acc-t);background:rgba(79,209,255,.06);box-shadow:inset 0 0 0 1px var(--line-2)}
.tag--ok{color:var(--acc-ink);background:var(--acc)}
.st{font:600 10.5px/1 var(--mono);letter-spacing:.14em;color:var(--muted);min-width:4ch;text-align:right}
.st::after{content:"SEND"}
.qa details[open] .st{color:var(--acc-t)}
.qa details[open] .st::after{content:"ACK"}
.ans{display:grid;grid-template-columns:auto minmax(0,1fr);align-items:start;gap:14px;padding:2px 4px 22px}
.ans p{margin:0;color:var(--muted)}
.qa details::details-content{block-size:0;overflow:hidden;transition:block-size .45s cubic-bezier(.2,.7,.2,1),content-visibility .45s allow-discrete}
.qa details[open]::details-content{block-size:auto}
.js .frame:not(.in) .qa details{opacity:0}
.qa details{transition:opacity .4s calc(.9s + var(--n) * .1s)}

/* 05 delivered: one command */
.term{--cut:10px;margin:0 0 26px;padding:16px 18px;background:var(--term);color:var(--term-ink);font:500 14px/1.6 var(--mono);white-space:nowrap;overflow-x:auto;box-shadow:inset 0 0 0 1px var(--line-2)}
.term .pr{color:var(--acc);margin-right:.6ch}
[data-theme="light"] .term .pr{color:#4FD1FF}
.term .cm{display:inline-block;vertical-align:bottom;overflow:hidden;max-width:var(--n);width:var(--n)}
.js .frame:not(.in) .term .cm{width:0}
.frame.in .term .cm{animation:type 1.6s steps(var(--c)) .9s backwards}
@keyframes type{from{width:0}}
.cur{display:inline-block;width:.6em;height:1.15em;margin-left:2px;vertical-align:-.2em;background:var(--acc);animation:blink 1.05s steps(1) infinite}
[data-theme="light"] .cur{background:#4FD1FF}
@keyframes blink{50%{opacity:0}}
.btn--lg{min-height:56px;padding:0 28px;font-size:17px}

/* ---------- Footer ---------- */
.foot{margin-top:clamp(40px,8vw,100px);padding:clamp(48px,7vw,84px) 0 28px;border-top:1px solid var(--line);box-shadow:inset 0 1px 0 rgba(156,203,255,.06)}
.foot-top{display:grid;gap:40px}
@media (min-width:760px){.foot-top{grid-template-columns:minmax(0,1.3fr) minmax(0,.7fr) minmax(0,1fr)}}
@media (min-width:1100px){.foot-top{grid-template-columns:minmax(0,1.3fr) minmax(0,.6fr) minmax(0,.9fr) minmax(0,1.1fr)}}
.foot-logo .mk-c{height:64px}
.foot-logo .wm{font-size:19px}
.foot-brand p{margin:20px 0 0;color:var(--muted);max-width:34ch;font-size:16px}
.foot-col h2,.foot-cta h2{margin:6px 0 14px;font:500 11px/1 var(--mono);letter-spacing:.16em;text-transform:uppercase;color:var(--muted)}
.foot-col{display:flex;flex-direction:column;align-items:flex-start}
.foot-col a{display:inline-flex;align-items:center;gap:12px;min-height:40px;text-decoration:none;font:600 16px/1.2 var(--display);word-break:break-word}
.foot-col a::before{content:"";flex:none;width:8px;height:8px;border-radius:50%;box-shadow:inset 0 0 0 1.5px var(--line-2);transition:background .25s,box-shadow .25s}
.foot-col a:hover::before{background:var(--acc);box-shadow:0 0 10px var(--glow)}
.foot-cta p{margin:0 0 18px;font:600 22px/1.25 var(--display);letter-spacing:-.01em}
@media (min-width:760px) and (max-width:1099px){.foot-cta{grid-column:1/-1}}
.rrule{position:relative;display:flex;justify-content:space-between;align-items:center;height:12px;margin:clamp(40px,6vw,64px) 0 22px}
.rrule::before{content:"";position:absolute;left:0;right:0;top:50%;height:1px;background:var(--line-2)}
.rrule i{position:relative;width:9px;height:9px;border-radius:50%;background:var(--bg);box-shadow:inset 0 0 0 1.5px var(--line-2)}
.rrule i:first-child,.rrule i:last-child{background:var(--acc-2);box-shadow:none}
.rrule b{position:absolute;top:50%;left:0;width:6px;height:6px;margin-top:-3px;border-radius:50%;background:var(--acc);box-shadow:0 0 12px var(--glow);animation:rr 7s linear infinite}
@keyframes rr{from{left:0}to{left:calc(100% - 6px)}}
.foot-bottom{display:flex;align-items:center;justify-content:space-between;gap:14px 28px;flex-wrap:wrap;font:500 14px/1.4 var(--text);color:var(--muted)}
.foot-bottom p{margin:0}
.credits{display:flex;align-items:center;gap:10px 22px;flex-wrap:wrap}
.credits a{display:inline-flex;align-items:center;gap:10px;min-height:44px;text-decoration:none;color:var(--ink)}
.credits svg{height:19px;width:auto;display:block}
.credits .coh svg{height:22px}
.credits .sep{width:1px;height:22px;background:var(--line)}
.credits a:hover svg{opacity:.78}

/* ---------- Mid widths ---------- */
@media (max-width:1099px){
  .ro-s{display:none}
  .ro{min-width:0}
}
@media (max-width:999px){
  .c-sep,.hops{display:none}
  .hero-mark{left:50%}
  .col,.col--wide{width:min(640px,72%)}
}

/* ---------- Phones: the network gets its own window above each hop ---------- */
@media (max-width:759px){
  body{font-size:16px}
  .console{top:0;left:0;right:0}
  .c-bar{--cut:0px;height:60px;padding:0 6px 0 14px;border-width:0 0 1px;clip-path:none}
  .c-bar::before,.c-bar::after{display:none}
  .c-bar .lockup{margin-right:auto}
  .ro{min-width:0;margin-right:8px}
  .ro-s{display:inline}
  .ro .ro-n{display:none}
  .trace{margin:0;border-width:0 0 1px;clip-path:none;max-height:calc(100svh - 60px);overflow:auto;padding:14px 6px 16px}
  .trace::before,.trace::after{display:none}
  .sheet-x{display:flex;flex-wrap:wrap;gap:10px;padding:14px 10px 0;margin-top:10px;border-top:1px solid var(--line)}
  .sheet-x .btn{flex:1 1 auto}
  .tools{display:none}
  .hero{display:block;min-height:0;padding:66px 0 20px}
  .hero-stage{padding:14px 0 18px}
  .hero-mark{position:relative;left:auto;top:auto;transform:none;margin:0 auto}
  .hero-mark .mk-c{height:min(30svh,260px)}
  .ruler{display:none}
  .strip{grid-template-columns:minmax(0,1fr);background:var(--panel-solid)}
  .field{padding:18px 18px 20px}
  .f-reply{border-left:0;border-top:1px solid var(--line)}
  .ctas .btn{flex:1 1 100%}
  .hop{display:block;min-height:0;padding:0 0 40px}
  .hop::before{content:"";display:block;height:56svh}
  .col,.col--wide{width:auto}
  .hoplbl{--cut:14px;padding:16px 18px 2px;background:var(--panel-solid)}
  .frame{padding:16px 18px 24px;background:var(--panel-solid)}
  .m{padding:10px 14px 24px}
  .bits span{visibility:hidden}
  .bits span:nth-child(8n+1){visibility:visible}
  .fld{grid-column:1/-1}
  .rt thead{display:none}
  .rt,.rt tbody{display:block}
  .rt tbody tr{display:grid;grid-template-columns:52px minmax(0,1fr);padding:12px 0;border-bottom:1px solid var(--line)}
  .rt td,.rt tbody th{display:block;width:auto;padding:0;border:0}
  .rt .via{grid-column:2;margin-top:4px}
  .qa summary{grid-template-columns:auto minmax(0,1fr);font-size:16px}
  .qa summary .st{display:none}
  .ans{grid-template-columns:minmax(0,1fr);gap:10px}
  .ans .tag{justify-self:start}
  .foot-top{gap:32px}
  .credits .sep{display:none}
  .credits{flex-direction:column;align-items:flex-start;gap:0}
}

/* ---------- Theme switch: the handshake zipper ---------- */
::view-transition-old(root),::view-transition-new(root){animation:none;mix-blend-mode:normal}

@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  .mk *,.mk-c,.mk-h,.hoplbl *,.hoplbl .ln::before,.hoplbl .ln::after,.frame,.frame *,.rrule b,.cur,.trace,.hops .pk{animation:none !important;transition:none !important}
  .js .mk:not(.play) .e{stroke-dashoffset:0}
  .js .mk:not(.play) .n{transform:none}
  .js .mk:not(.play) .mk-back{opacity:1}
  .mk-pk,.you{display:none}
  .mk:hover .mk-h,.mk:focus-visible .mk-h{transform:none}
  .js .frame[data-rv]:not(.in){--w:100%}
  .js [data-rv].hoplbl:not(.in) .ln{transform:none}
  .js [data-rv].hoplbl:not(.in) .ln::before{transform:none}
  .js [data-rv].hoplbl:not(.in) .no,.js [data-rv].hoplbl:not(.in) .nm{opacity:1}
  .js .frame:not(.in) .m .wire::before{transform:none}
  .js .frame:not(.in) .m .wire::after,.js .frame:not(.in) .m .fl,.js .frame:not(.in) .m p,.js .frame:not(.in) .fld,.js .frame:not(.in) .rt tbody tr,.js .frame:not(.in) .qa details{opacity:1}
  .js .frame:not(.in) .term .cm{width:var(--n)}
}
</style>
@endverbatim
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<canvas class="net" id="net" aria-hidden="true"></canvas>
<div class="net-fb" aria-hidden="true"></div>
<div class="you" aria-hidden="true"><span>you</span></div>

<header class="console" id="console">
    <nav aria-label="Route">
        <div class="c-bar ch ch-b glass">
            <a class="mk mk--sm lockup" href="#top" aria-label="Protocol.com — back to the start">{!! $mark() !!}<span class="wm">PROTOCOL</span></a>
            <span class="c-sep" aria-hidden="true"></span>
            <ol class="hops" aria-hidden="true">
                @foreach ($hops as $i => [$id, $no, $name])
                    <li><a href="#{{ $id }}" tabindex="-1" title="Hop {{ $no }} · {{ $name }}" data-hop="{{ $i + 1 }}"></a></li>
                @endforeach
                <li><b class="pk"></b></li>
            </ol>
            <p class="ro"><span class="ro-n">hop 00/05</span><span class="ro-s">start</span></p>
            <button type="button" class="c-tog" aria-expanded="false" aria-controls="trace">Route <svg viewBox="0 0 12 12" aria-hidden="true"><path d="M2 4 L6 8 L10 4"></path></svg></button>
        </div>
        <div class="trace ch ch-b glass" id="trace">
            <p class="cmd"><b>$</b> traceroute protocol.com</p>
            <ol class="tr-list">
                @foreach ($hops as $i => [$id, $no, $name, $desc])
                    <li><a href="#{{ $id }}" data-hop="{{ $i + 1 }}"><span class="t-no">{{ $no }}</span><span class="t-name">{{ $name }}<small>{{ $desc }}</small></span><span class="t-st">* * *</span></a></li>
                @endforeach
            </ol>
            <div class="sheet-x">
                <button type="button" class="tt ch ch-b glass" data-theme-toggle aria-pressed="true" aria-label="Dark mode">{!! $toggle !!}<span class="tt-t" aria-hidden="true"></span></button>
                <a class="btn" href="{{ $mailto }}">Get in touch {!! $arrow !!}</a>
            </div>
        </div>
    </nav>
</header>
<div class="tools">
    <button type="button" class="tt ch ch-b glass" data-theme-toggle aria-pressed="true" aria-label="Dark mode" title="Switch theme">{!! $toggle !!}<span class="tt-t" aria-hidden="true"></span></button>
    <a class="btn" href="{{ $mailto }}">Get in touch</a>
</div>

<main id="main">
    <section class="hero" id="top" aria-labelledby="hero-title">
        <div class="hero-stage">
            <button type="button" class="mk mk--hero hero-mark" aria-label="Protocol.com logo — click to send a broadcast">{!! $mark() !!}<span class="wm" aria-hidden="true">PROTOCOL</span></button>
        </div>
        <div class="wrap">
            <div class="ruler" aria-hidden="true">
                @for ($b = 0; $b < 32; $b++)
                    <span @class(['bd' => in_array($b, [0, 16])])>{{ in_array($b, [0, 8, 16, 24, 31]) ? $b : '' }}</span>
                @endfor
            </div>
            <div class="strip ch ch-b glass">
                <div class="field f-subject">
                    <p class="lbl"><b>01</b> Subject </p>
                    <h1 id="hero-title">Protocol.com is an <em>elite-level</em> .com domain.</h1>
                </div>
                <div class="field f-payload">
                    <p class="lbl"><b>02</b> Payload</p>
                    <p class="lede">It is owned by Coherence.com and may be in development. One word, eight letters: the name for the rules every network runs on.</p>
                </div>
                <div class="field f-reply">
                    <p class="lbl"><b>03</b> Reply-to</p>
                    <div class="ctas">
                        <a class="btn" href="{{ $mailto }}">Get in touch {!! $arrow !!}</a>
                        <a class="btn btn--ghost btn--down" href="#handshake">Follow the route {!! $arrow !!}</a>
                    </div>
                    <p class="contact">Contact us: <a href="{{ $mailto }}">{{ $email }}</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="hop" id="handshake" aria-labelledby="handshake-title">
        <div class="wrap">
            <div class="col">
                <p class="hoplbl glass ch-b" data-rv><span class="no">Hop 01</span><span class="ln"></span><span class="nm">Handshake</span></p>
                <div class="frame glass ch-b" data-rv>
                    <h2 id="handshake-title">Every connection starts with a handshake.</h2>
                    <p class="intro">Before any data moves, two machines agree how they will talk. Here are the facts about protocol.com, in that order.</p>
                    <div class="lanes" aria-hidden="true"><span class="ch">you</span><span class="ch">protocol.com</span></div>
                    <ol class="seq">
                        @foreach ($handshake as $i => [$dir, $flag, $text])
                            <li class="m {{ $dir }}" style="--i: {{ $i }}" data-k="{{ $i }}">
                                <span class="fl">[{{ $flag }}]</span>
                                <span class="sr">{{ $dir === 'tx' ? 'You to protocol.com:' : 'protocol.com to you:' }}</span>
                                @if ($text)
                                    <p>{{ $text }}</p>
                                @else
                                    <p>Contact <a href="{{ $mailto }}">{{ $email }}</a> with the subject “Domain name: protocol.com”.</p>
                                @endif
                                <span class="wire" aria-hidden="true"><i></i></span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="hop r" id="word" aria-labelledby="word-title">
        <div class="wrap">
            <div class="col col--wide">
                <p class="hoplbl glass ch-b" data-rv><span class="no">Hop 02</span><span class="ln"></span><span class="nm">The word</span></p>
                <div class="frame glass ch-b" data-rv>
                    <h2 id="word-title">One word, six meanings.</h2>
                    <p class="intro">A protocol is a set of rules for how things are done. The word has carried that idea from papyrus rolls to the internet, so here it is as a packet header: one field per meaning.</p>
                    <div class="bits" aria-hidden="true">
                        @for ($b = 0; $b < 32; $b++)
                            <span>{{ $b % 10 }}</span>
                        @endfor
                    </div>
                    <dl class="fields">
                        @foreach ($meanings as $i => [$term, $bits, $range, $meaning])
                            <div class="fld" style="--s: {{ $bits }}; --n: {{ $i }}" data-k="{{ $i }}">
                                <dt><span class="b">bits {{ $range }}</span>{{ $term }}</dt>
                                <dd>{{ $meaning }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <section class="hop" id="routes" aria-labelledby="routes-title">
        <div class="wrap">
            <div class="col col--wide">
                <p class="hoplbl glass ch-b" data-rv><span class="no">Hop 03</span><span class="ln"></span><span class="nm">Routes</span></p>
                <div class="frame glass ch-b" data-rv>
                    <h2 id="routes-title">Twelve routes out.</h2>
                    <p class="intro">A name this broad suits any business built on rules, standards or connections. These are the destinations it fits best.</p>
                    <table class="rt">
                        <caption class="sr">Industries protocol.com suits, set out as a routing table</caption>
                        <thead><tr><th scope="col">#</th><th scope="col">Destination</th><th scope="col">Route</th></tr></thead>
                        <tbody>
                            @foreach ($routes as $i => [$industry, $line])
                                <tr style="--n: {{ $i }}" data-k="{{ $i }}">
                                    <td class="n">{{ sprintf('%02d', $i + 1) }}</td>
                                    <th scope="row">{{ $industry }}</th>
                                    <td class="via">{{ $line }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="hop r" id="questions" aria-labelledby="questions-title">
        <div class="wrap">
            <div class="col">
                <p class="hoplbl glass ch-b" data-rv><span class="no">Hop 04</span><span class="ln"></span><span class="nm">Questions</span></p>
                <div class="frame glass ch-b" data-rv>
                    <h2 id="questions-title">Requests and responses.</h2>
                    <p class="intro">Send a request; the answer comes straight back.</p>
                    <div class="qa">
                        @foreach ($faqs as $i => [$q, $a])
                            <details style="--n: {{ $i }}" data-k="{{ $i }}">
                                <summary><span class="tag tag--req ch">REQ</span><span class="q">{{ $q }}</span><span class="st" aria-hidden="true"></span></summary>
                                <div class="ans"><span class="tag tag--ok ch" aria-hidden="true">200 OK</span><p>{{ $a }}</p></div>
                            </details>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hop" id="delivered" aria-labelledby="delivered-title">
        <div class="wrap">
            <div class="col">
                <p class="hoplbl glass ch-b" data-rv><span class="no">Hop 05</span><span class="ln"></span><span class="nm">Delivered</span></p>
                <div class="frame glass ch-b" data-rv>
                    <h2 id="delivered-title">Send the first packet.</h2>
                    <p class="intro">protocol.com is owned by Coherence.com. To ask about the domain, email the team: the subject line is already filled in.</p>
                    <p class="term ch" style="--n: {{ mb_strlen($command) }}ch; --c: {{ mb_strlen($command) }}"><span class="pr" aria-hidden="true">$</span><span class="cm">{{ $command }}</span><span class="cur" aria-hidden="true"></span></p>
                    <div class="ctas"><a class="btn btn--lg" href="{{ $mailto }}">Get in touch {!! $arrow !!}</a></div>
                    <p class="contact">Contact us: <a href="{{ $mailto }}">{{ $email }}</a></p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="foot glass" id="footer">
    <div class="wrap">
        <div class="foot-top">
            <div class="foot-brand">
                <button type="button" class="mk mk--sm lockup foot-logo" aria-label="Protocol.com logo — click to send a broadcast">{!! $mark() !!}<span class="wm">PROTOCOL</span></button>
                <p>An elite-level .com domain, owned by Coherence.com.</p>
            </div>
            <nav class="foot-col" aria-label="Explore">
                <h2>Explore</h2>
                <a href="#handshake">Handshake</a>
                <a href="#word">The word</a>
                <a href="#routes">Routes</a>
                <a href="#questions">Questions</a>
            </nav>
            <div class="foot-col">
                <h2>Contact</h2>
                <a href="{{ $mailto }}">{{ $email }}</a>
                <a href="{{ $owner }}" target="_blank" rel="noopener">Coherence.com</a>
                <a href="/llms.txt">llms.txt</a>
            </div>
            <div class="foot-cta">
                <h2>Interested in protocol.com?</h2>
                <p>Send the first packet.</p>
                <a class="btn" href="{{ $mailto }}">Get in touch {!! $arrow !!}</a>
            </div>
        </div>
        <div class="rrule" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><b></b></div>
        <div class="foot-bottom">
            <p>&copy;{{ date('Y') }} Booth.com Ltd. All Rights Reserved.</p>
            <div class="credits">
                <a href="https://qquantum.ai/creative-design/brand-identity-logos" target="_blank" rel="noopener" title="QQuantum.ai — brand identity, logo and web design by an AI systems engineering studio in Barcelona">
                    <span>Designed &amp; built by</span>
                    {!! $qquantum !!}
                </a>
                <span class="sep" aria-hidden="true"></span>
                <a class="coh" href="https://coherence.com" target="_blank" rel="noopener" title="Coherence — ethical, human-centred AI across sound, education and consciousness">
                    <span>Part of</span>
                    {!! $coherence !!}
                </a>
            </div>
        </div>
    </div>
</footer>

@verbatim
<script>
(function () {
  var root = document.documentElement;
  var reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;
  var emit = function (name, detail) { window.dispatchEvent(new CustomEvent('protocol:' + name, { detail: detail || {} })); };

  /* ---- Theme: the handshake zipper. Ten bands interleave from both sides. ---- */
  var meta = document.querySelector('meta[name="theme-color"]');
  var toggles = document.querySelectorAll('[data-theme-toggle]');
  function sync() {
    var dark = root.dataset.theme !== 'light';
    toggles.forEach(function (b) { b.setAttribute('aria-pressed', dark ? 'true' : 'false'); });
    if (meta) meta.content = dark ? '#060A14' : '#EEF2F8';
  }
  function apply(t) {
    root.dataset.theme = t;
    try { localStorage.setItem('theme', t); } catch (e) {}
    sync();
    emit('theme', { theme: t });
  }
  function zipper() {
    var N = 10, steps = 40, dur = .55, stagger = .045, total = dur + stagger * (N - 1), frames = [];
    for (var s = 0; s <= steps; s++) {
      var T = s / steps * total, pts = [];
      for (var i = 0; i < N; i++) {
        var p = Math.min(1, Math.max(0, (T - i * stagger) / dur));
        p = 1 - Math.pow(1 - p, 3);
        var y0 = (i * 100 / N).toFixed(2) + '%', y1 = ((i + 1) * 100 / N).toFixed(2) + '%';
        var a = i % 2 ? (100 - p * 100).toFixed(2) + '%' : '0%';
        var b = i % 2 ? '100%' : (p * 100).toFixed(2) + '%';
        pts.push('0% ' + y0, a + ' ' + y0, b + ' ' + y0, b + ' ' + y1, a + ' ' + y1, a + ' ' + y0, '0% ' + y0, '0% ' + y1);
      }
      frames.push({ clipPath: 'polygon(' + pts.join(',') + ')' });
    }
    return frames;
  }
  toggles.forEach(function (b) {
    b.addEventListener('click', function () {
      var next = root.dataset.theme === 'light' ? 'dark' : 'light';
      emit('broadcast', { from: 'theme' });
      if (reduced || !document.startViewTransition) { apply(next); return; }
      var vt = document.startViewTransition(function () { apply(next); });
      vt.ready.then(function () {
        root.animate(zipper(), { duration: 860, easing: 'linear', pseudoElement: '::view-transition-new(root)' });
      }).catch(function () {});
    });
  });
  sync();

  /* ---- Traceroute console: hop readout, current hop, expandable listing ---- */
  var con = document.getElementById('console');
  var tog = con.querySelector('.c-tog');
  var ids = ['top', 'handshake', 'word', 'routes', 'questions', 'delivered'];
  var names = ['start', 'handshake', 'the word', 'routes', 'questions', 'delivered'];
  var secs = ids.map(function (id) { return document.getElementById(id); });
  var trLinks = con.querySelectorAll('.tr-list a');
  var hopLinks = con.querySelectorAll('.hops a');
  var roN = con.querySelector('.ro-n'), roS = con.querySelector('.ro-s');
  var cur = -1, manual = null;
  function wide() { return innerWidth >= 1100 && innerHeight >= 700; }
  function setOpen() {
    var open = manual === null ? (wide() && cur <= 0) : manual;
    con.classList.toggle('open', open);
    tog.setAttribute('aria-expanded', open ? 'true' : 'false');
  }
  tog.addEventListener('click', function () { manual = !con.classList.contains('open'); setOpen(); });
  con.querySelectorAll('.tr-list a, .hops a, .lockup').forEach(function (a) {
    a.addEventListener('click', function () { manual = null; setTimeout(setOpen, 0); });
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && con.classList.contains('open')) { manual = false; setOpen(); tog.focus(); }
  });
  function mark(list) {
    list.forEach(function (a) {
      var k = +a.dataset.hop;
      a.classList.toggle('done', k < cur);
      if (k === cur) a.setAttribute('aria-current', 'true'); else a.removeAttribute('aria-current');
      var st = a.querySelector('.t-st');
      if (st) st.textContent = k < cur ? 'ack' : k === cur ? 'now' : '* * *';
    });
  }
  function spy() {
    var line = innerHeight * .45, k = 0;
    secs.forEach(function (s, i) { if (s.getBoundingClientRect().top <= line) k = i; });
    if (k === cur) return;
    var leavingTop = cur <= 0 && k > 0;
    cur = k;
    con.style.setProperty('--hop', cur);
    roN.textContent = 'hop 0' + cur + '/05';
    roS.textContent = names[cur];
    mark(trLinks); mark(hopLinks);
    if (leavingTop && manual === true && wide()) manual = null;
    setOpen();
  }
  var ticking = false;
  function onScroll() { if (!ticking) { ticking = true; requestAnimationFrame(function () { ticking = false; spy(); }); } }
  addEventListener('scroll', onScroll, { passive: true });
  addEventListener('resize', function () { cur = -1; spy(); });
  spy();

  /* ---- Reveals: node pops, link draws, frame arrives ---- */
  var rv = document.querySelectorAll('[data-rv]');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { rootMargin: '0px 0px -10% 0px' });
    rv.forEach(function (el) { io.observe(el); });
  } else {
    rv.forEach(function (el) { el.classList.add('in'); });
  }

  /* ---- Every logo: intro when seen, click broadcasts ---- */
  var marks = document.querySelectorAll('.mk'), n = 0;
  marks.forEach(function (m) {
    m.addEventListener('click', function () {
      n++;
      m.classList.remove('ca', 'cb');
      m.classList.add(n % 2 ? 'ca' : 'cb');
      emit('broadcast', { from: 'logo' });
    });
  });
  if ('IntersectionObserver' in window) {
    var lio = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('play'); lio.unobserve(e.target); } });
    }, { threshold: .3 });
    marks.forEach(function (m) { lio.observe(m); });
  } else {
    marks.forEach(function (m) { m.classList.add('play'); });
  }

  /* ---- Handshake rows light their rung in 3D ---- */
  document.querySelectorAll('.seq .m').forEach(function (m) {
    var k = +m.dataset.k;
    m.addEventListener('pointerenter', function () { emit('hs', { k: k }); });
    m.addEventListener('pointerleave', function () { emit('hs', { k: -1 }); });
  });

  /* ---- Header fields light their shell ---- */
  document.querySelectorAll('.fld').forEach(function (f) {
    var k = +f.dataset.k;
    f.addEventListener('pointerenter', function () { f.classList.add('on'); emit('word', { k: k }); });
    f.addEventListener('pointerleave', function () { f.classList.remove('on'); emit('word', { k: -1 }); });
  });

  /* ---- Routing table: hover a row to light its route; otherwise routes cycle ---- */
  var rows = document.querySelectorAll('.rt tbody tr'), hovered = -1, cyc = -1, inView = false;
  function light(i) {
    rows.forEach(function (r, j) { r.classList.toggle('on', j === i); });
    emit('route', { k: i });
  }
  rows.forEach(function (r, i) {
    r.addEventListener('pointerenter', function () { hovered = i; cyc = i; light(i); });
    r.addEventListener('pointerleave', function () { hovered = -1; });
  });
  if ('IntersectionObserver' in window && rows.length) {
    new IntersectionObserver(function (es) {
      inView = es[0].isIntersecting;
      if (!inView) light(-1);
    }, { threshold: .15 }).observe(document.querySelector('.rt'));
  }
  setInterval(function () {
    if (!inView || hovered >= 0 || reduced) return;
    cyc = (cyc + 1) % rows.length;
    light(cyc);
  }, 1800);

  /* ---- Questions: opening one sends a request to the server node ---- */
  document.querySelectorAll('.qa details').forEach(function (d) {
    d.addEventListener('toggle', function () { if (d.open) emit('request', { k: +d.dataset.k }); });
  });
})();
</script>

<script type="module">
/* ============================================================
   The network. The reader is a packet; the route draws the P.
   ============================================================ */
import * as THREE from 'three';
import { EffectComposer } from 'three/addons/postprocessing/EffectComposer.js';
import { RenderPass } from 'three/addons/postprocessing/RenderPass.js';
import { UnrealBloomPass } from 'three/addons/postprocessing/UnrealBloomPass.js';
import { OutputPass } from 'three/addons/postprocessing/OutputPass.js';

const html = document.documentElement;
const canvas = document.getElementById('net');
const heroMark = document.querySelector('.hero-mark');
const heroBox = heroMark.querySelector('.mk-c');
const youTag = document.querySelector('.you');
const SECTIONS = ['top', 'handshake', 'word', 'routes', 'questions', 'delivered'].map(id => document.getElementById(id));
const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

const clamp01 = x => x < 0 ? 0 : x > 1 ? 1 : x;
const span = (t, a, d) => clamp01((t - a) / d);
const smooth = (a, b, x) => { const t = clamp01((x - a) / (b - a)); return t * t * (3 - 2 * t); };
const lerp = (a, b, t) => a + (b - a) * t;
const eOut = t => 1 - Math.pow(1 - t, 3);
const eInOut = t => t < .5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
const eBack = t => { const c1 = 1.70158, c3 = c1 + 1; return 1 + c3 * Math.pow(t - 1, 3) + c1 * Math.pow(t - 1, 2); };
function rng(seed) { let s = seed; return () => { s = (s * 16807) % 2147483647; return (s - 1) / 2147483646; }; }
const V = (x, y, z) => new THREE.Vector3(x, y, z);
const C = ([hex, mul]) => new THREE.Color(hex).multiplyScalar(mul);

/* Palettes from the Lattice review page; dark pushes the glow. */
const PAL = {
  dark: {
    bg: '#060A14', fog: .0105, bloom: true, amb: ['#8fb3ff', .7], key: 2.4,
    front: '#9CCBFF', back: '#5F8FD6', edge: '#86A8DA', edgeEm: '#1E3E78', thin: '#4D6A96', thinEm: '#14294F',
    trail: ['#4FD1FF', 2.2], pkt: ['#4FD1FF', 2.6], you: ['#E6FBFF', 3.2], rx: ['#E6F2FF', 2.2], flash: ['#FFFFFF', 3], lit: ['#7FE0FF', 1.7],
    net: '#4A73B4', hub: '#A9D2FF', line: '#24457E', lineA: .24, signal: ['#4FD1FF', 1.1], glow: 1, additive: true,
    route: ['#3A6BB0', 1], shell: ['#86A8DA', 1.2], server: ['#9CCBFF', 1.4], halo: .85,
  },
  light: {
    bg: '#EEF2F8', fog: .0125, bloom: false, amb: ['#ffffff', 1.1], key: 2.4,
    front: '#14306E', back: '#6F8FC4', edge: '#2A4E95', edgeEm: '#000000', thin: '#9DB2D6', thinEm: '#000000',
    trail: ['#0E9BD6', 1], pkt: ['#0E9BD6', 1], you: ['#0E9BD6', 1], rx: ['#14306E', 1], flash: ['#0E9BD6', 1], lit: ['#0E9BD6', 1],
    net: '#6F8FC4', hub: '#14306E', line: '#9DB2D6', lineA: .6, signal: ['#0E9BD6', 1], glow: 0, additive: false,
    route: ['#9DB2D6', 1], shell: ['#2A4E95', 1], server: ['#14306E', 1], halo: 0,
  },
};

/* The Lattice P (from the review page), at world scale. */
const P2 = [[-.6,-1.15],[-.6,-.62],[-.6,-.1],[-.6,.45],[-.6,1],[-.2,1],[.2,1],[.589,.839],[.75,.45],[.589,.061],[.2,-.1],[-.2,-.1]];
const CHAIN = [[0,1],[1,2],[2,3],[3,4],[4,5],[5,6],[6,7],[7,8],[8,9],[9,10],[10,11],[11,2]];
const N = 12, S = 4.72, OX = -.08, Z = 1.36;
const ROUTE = [0,1,2,3,4,5,6,7,8,9,10,11,2];

/* Camera waypoints every half section; u = 0 is framed from the hero's mark box. */
const WP = [
  null,
  { pos: V(6.5, -3.4, 24), look: V(-1.8, -2.0, 0) },
  { pos: V(11.7, -2.5, 18.7), look: V(-3.21, -.6, 0), fx: .2 },
  { pos: V(3.0, -1.0, 15), look: V(-2.4, .6, 0) },
  { pos: V(-6.9, 2.9, 13.8), look: V(0, 2.12, .3), fx: -.2 },
  { pos: V(-4.5, 7.0, 15.5), look: V(0, 6.2, 0) },
  { pos: V(6.5, 1.0, 23.1), look: V(1.2, 7.2, -1.6), fx: .22 },
  { pos: V(10, 5.0, 15), look: V(2.0, 4.0, -1) },
  { pos: V(12.6, 5.4, 13.6), look: V(-.8, 4.4, -3.6), fx: -.2 },
  { pos: V(6, -1.0, 19), look: V(-1, -.5, 0) },
  { pos: V(-8.5, 2.2, 35), look: V(.2, 2.6, -2), fx: .2 },
];

function haloTexture() {
  const c = document.createElement('canvas'); c.width = c.height = 128;
  const g = c.getContext('2d'), gr = g.createRadialGradient(64, 64, 0, 64, 64, 64);
  gr.addColorStop(0, 'rgba(255,255,255,1)'); gr.addColorStop(.22, 'rgba(255,255,255,.5)'); gr.addColorStop(1, 'rgba(255,255,255,0)');
  g.fillStyle = gr; g.fillRect(0, 0, 128, 128);
  const t = new THREE.CanvasTexture(c); t.colorSpace = THREE.SRGBColorSpace; return t;
}

function start() {
  let renderer;
  try { renderer = new THREE.WebGLRenderer({ canvas, antialias: false, powerPreference: 'high-performance' }); }
  catch (e) { return; }
  const DPR = Math.min(window.devicePixelRatio || 1, 1.5);
  renderer.setPixelRatio(DPR);
  renderer.outputColorSpace = THREE.SRGBColorSpace;
  renderer.toneMapping = THREE.ACESFilmicToneMapping;

  const scene = new THREE.Scene();
  scene.fog = new THREE.FogExp2('#060A14', .0105);
  const cam = new THREE.PerspectiveCamera(35, 1, .1, 400);
  const rt = new THREE.WebGLRenderTarget(2, 2, { type: THREE.HalfFloatType, samples: renderer.capabilities.isWebGL2 ? 4 : 0 });
  const composer = new EffectComposer(renderer, rt);
  composer.addPass(new RenderPass(scene, cam));
  const bloom = new UnrealBloomPass(new THREE.Vector2(256, 256), 1.1, .5, .42);
  composer.addPass(bloom);
  composer.addPass(new OutputPass());

  const ambL = new THREE.AmbientLight('#8fb3ff', .7); scene.add(ambL);
  const key = new THREE.DirectionalLight('#ffffff', 2.4); key.position.set(12, 16, 24); scene.add(key);
  const fill = new THREE.PointLight('#4FD1FF', 110, 0, 2); fill.position.set(5.6, 3.2, 8.8); scene.add(fill);

  const P = new THREE.Group(); scene.add(P);
  const halo = haloTexture();
  const inst = (geo, mat, count) => { const m = new THREE.InstancedMesh(geo, mat, count); m.frustumCulled = false; P.add(m); return m; };
  const basic = () => new THREE.MeshBasicMaterial({ color: '#ffffff', fog: false });

  /* ---- The P: two layers of nodes, thick chains, thin rungs and diagonals ---- */
  const nodes = [];
  [[0, Z], [1, -Z]].forEach(([layer, z]) => P2.forEach(([x, y], k) => nodes.push({ p: V((x + OX) * S, y * S, z), k, layer })));
  const edges = [];
  CHAIN.forEach(([a, b], j) => { edges.push({ a, b, t0: .25 + j * .09, kind: 0 }); edges.push({ a: a + N, b: b + N, t0: .32 + j * .09, kind: 0 }); });
  for (let i = 0; i < N; i++) edges.push({ a: i, b: i + N, t0: 1.25 + i * .04, kind: 1 });
  CHAIN.forEach(([a, b], j) => edges.push({ a, b: b + N, t0: 1.45 + j * .04, kind: 1 }));
  const UP = V(0, 1, 0);
  edges.forEach(e => {
    const A = nodes[e.a].p, d = nodes[e.b].p.clone().sub(A);
    e.len = d.length(); e.dir = d.normalize(); e.q = new THREE.Quaternion().setFromUnitVectors(UP, e.dir); e.A = A;
  });
  const nodeMesh = inst(new THREE.SphereGeometry(.29, 28, 18), basic(), nodes.length);
  const thickMat = new THREE.MeshStandardMaterial({ metalness: .55, roughness: .3, fog: false });
  const thinMat = new THREE.MeshStandardMaterial({ metalness: .5, roughness: .45, fog: false });
  const thickN = edges.filter(e => !e.kind).length;
  const thick = inst(new THREE.CylinderGeometry(.088, .088, 1, 14), thickMat, thickN);
  const thin = inst(new THREE.CylinderGeometry(.036, .036, 1, 8), thinMat, edges.length - thickN);

  /* ---- The route: a lit trail that draws the P as you scroll ---- */
  const segs = []; let L = 0;
  for (let s = 0; s < ROUTE.length - 1; s++) {
    const A = nodes[ROUTE[s]].p, d = nodes[ROUTE[s + 1]].p.clone().sub(A), len = d.length(), dir = d.normalize();
    segs.push({ A, dir, len, c0: L, q: new THREE.Quaternion().setFromUnitVectors(UP, dir) });
    L += len;
  }
  const reachedAt = {};
  ROUTE.forEach((k, i) => { if (!(k in reachedAt)) reachedAt[k] = i === 0 ? 0 : segs[i - 1].c0 + segs[i - 1].len; });
  const PU = [0, 0, (segs[2].c0 + segs[2].len / 2) / L, segs[5].c0 / L, segs[8].c0 / L, 1];
  const trailMat = basic();
  const trail = inst(new THREE.CylinderGeometry(.13, .13, 1, 14), trailMat, segs.length);
  const routeAt = (d, out) => {
    d = Math.max(0, Math.min(L, d));
    let i = 0; while (i < segs.length - 1 && segs[i].c0 + segs[i].len < d) i++;
    return out.copy(segs[i].A).addScaledVector(segs[i].dir, d - segs[i].c0);
  };

  /* ---- You: the packet at the head of the route ---- */
  const youMat = basic();
  const you = new THREE.Mesh(new THREE.SphereGeometry(.24, 24, 16), youMat); P.add(you);
  const youHalo = new THREE.Sprite(new THREE.SpriteMaterial({ map: halo, color: '#4FD1FF', blending: THREE.AdditiveBlending, depthWrite: false, transparent: true, fog: false }));
  P.add(youHalo);
  const youLight = new THREE.PointLight('#4FD1FF', 18, 0, 2); P.add(youLight);

  /* ---- Idle packets round the bowl, as on the review page ---- */
  const loopIdx = [2,3,4,5,6,7,8,9,10,11,2];
  const mkLoop = (off, rev) => {
    const pts = loopIdx.map(i => nodes[i + off].p); if (rev) pts.reverse();
    const cum = [0]; for (let i = 1; i < pts.length; i++) cum.push(cum[i - 1] + pts[i].distanceTo(pts[i - 1]));
    return { pts, cum, L: cum[cum.length - 1] };
  };
  const along = (loop, f, out) => {
    const d = f * loop.L; let i = 1; while (i < loop.cum.length - 1 && loop.cum[i] < d) i++;
    const u = (d - loop.cum[i - 1]) / (loop.cum[i] - loop.cum[i - 1] || 1);
    return out.lerpVectors(loop.pts[i - 1], loop.pts[i], u);
  };
  const fLoop = mkLoop(0, false), bLoop = mkLoop(N, true);
  const pktMat = basic(), pktGeo = new THREE.SphereGeometry(.17, 16, 12);
  const packets = [[fLoop, 0], [fLoop, .34], [fLoop, .67], [bLoop, .17], [bLoop, .6]].map(([loop, off]) => {
    const m = new THREE.Mesh(pktGeo, pktMat); P.add(m); return { loop, off, m };
  });

  /* ---- 01 Handshake: six messages cross the six lowest rungs, front (you) to back (protocol.com) ---- */
  const HS = [[0, 1], [1, -1], [2, 1], [3, -1], [4, -1], [5, -1]];
  const txMat = basic(), rxMat = basic();
  const hsPk = HS.map(([r, dir]) => {
    const m = new THREE.Mesh(new THREE.SphereGeometry(.26, 16, 12), dir > 0 ? txMat : rxMat); P.add(m);
    const glow = new THREE.Sprite(new THREE.SpriteMaterial({ map: halo, color: dir > 0 ? '#4FD1FF' : '#CFE6FF', blending: THREE.AdditiveBlending, depthWrite: false, transparent: true, fog: false })); P.add(glow);
    return { r, dir, m, glow };
  });
  const rungMat = basic();
  const rungGlow = inst(new THREE.CylinderGeometry(.1, .1, 1, 12), rungMat, HS.length);
  let hsHover = -1;

  /* ---- 02 The word: six packet-header fields, exploded inside the counter ---- */
  const FIELDS = [[12, 0], [10, 0], [10, 0], [18, 1], [14, 1], [32, 2]];
  const BIT = .084, GAP = .09, rowX = [0, 0, 0];
  const shellGroup = new THREE.Group(); shellGroup.position.set(-.05, 2.12, 0); P.add(shellGroup);
  const shells = FIELDS.map(([bits, row], i) => {
    const w = bits * BIT - GAP, box = new THREE.BoxGeometry(w, .5, .34);
    const line = new THREE.LineSegments(new THREE.EdgesGeometry(box), new THREE.LineBasicMaterial({ color: '#ffffff', transparent: true, fog: false }));
    const face = new THREE.Mesh(box, new THREE.MeshBasicMaterial({ color: '#ffffff', transparent: true, opacity: .06, depthWrite: false, fog: false }));
    const g = new THREE.Group(); g.add(face, line); shellGroup.add(g);
    const x = rowX[row] + w / 2 + GAP / 2 - 32 * BIT / 2; rowX[row] += bits * BIT;
    return { g, line, face, home: V(x, (1 - row) * .7, 0), row, i, hl: 0 };
  });
  let wordHover = -1;

  /* ---- 03 Routes: twelve destinations on an arc, routed from the top of the stem ---- */
  const O5 = nodes[5].p;
  const routes = [];
  for (let k = 0; k < 12; k++) {
    const th = (104 - k * 98 / 11) * Math.PI / 180, rad = 6.2 + (k % 2) * .6;
    const D = V(O5.x + .6 + rad * Math.cos(th), O5.y + .4 + rad * Math.sin(th), -1.4 - 1.8 * Math.sin(k * 1.7) - k * .12);
    const dir = D.clone().sub(O5).normalize();
    const curve = new THREE.CubicBezierCurve3(O5.clone(), V(O5.x, O5.y + 2.4, O5.z), D.clone().addScaledVector(dir, -2.4), D.clone());
    const geo = new THREE.TubeGeometry(curve, 64, .03, 6, false);
    const mat = new THREE.MeshBasicMaterial({ color: '#ffffff', fog: false });
    const tube = new THREE.Mesh(geo, mat); tube.frustumCulled = false; P.add(tube);
    const node = new THREE.Mesh(new THREE.SphereGeometry(.21, 20, 14), new THREE.MeshBasicMaterial({ color: '#ffffff', fog: false })); node.position.copy(D); P.add(node);
    const ring = new THREE.Mesh(new THREE.TorusGeometry(.44, .018, 6, 48), new THREE.MeshBasicMaterial({ color: '#ffffff', fog: false, transparent: true })); ring.position.copy(D); P.add(ring);
    const pk = new THREE.Mesh(pktGeo, pktMat); P.add(pk);
    routes.push({ curve, geo, tube, node, ring, pk, hl: 0 });
  }
  let routeHover = -1;

  /* ---- 04 Questions: a server far behind the bowl; requests leave from node 8 ---- */
  const SERVER = V(-4.6, 8.4, -13);
  const server = new THREE.Group(); server.position.copy(SERVER); P.add(server);
  const serverLines = new THREE.LineBasicMaterial({ color: '#ffffff', transparent: true, fog: false });
  const ico = new THREE.LineSegments(new THREE.EdgesGeometry(new THREE.IcosahedronGeometry(1.15, 1)), serverLines);
  const core = new THREE.Mesh(new THREE.SphereGeometry(.42, 24, 16), basic());
  const ringMat = new THREE.MeshBasicMaterial({ color: '#ffffff', fog: false, transparent: true });
  const ringA = new THREE.Mesh(new THREE.TorusGeometry(1.75, .022, 6, 80), ringMat), ringB = new THREE.Mesh(new THREE.TorusGeometry(2.1, .016, 6, 80), ringMat);
  server.add(ico, core, ringA, ringB);
  const O8 = nodes[8].p;
  const link = new THREE.CubicBezierCurve3(O8.clone(), V(O8.x + 2.4, O8.y + 2.6, O8.z - 3), V(SERVER.x + 3.8, SERVER.y + 3, SERVER.z + 4), SERVER.clone());
  const linkGeo = new THREE.TubeGeometry(link, 96, .026, 6, false);
  const linkMat = new THREE.MeshBasicMaterial({ color: '#ffffff', fog: false, transparent: true });
  const linkTube = new THREE.Mesh(linkGeo, linkMat); linkTube.frustumCulled = false; P.add(linkTube);
  const reqMat = basic(), resMat = basic();
  const reqPk = [...Array(8)].map(() => { const m = new THREE.Mesh(new THREE.SphereGeometry(.22, 16, 12), reqMat); m.visible = false; P.add(m); return m; });
  const reqs = [];
  let serverFlash = 0, node8Flash = 0, lastReq = -99;

  /* ---- The wider network: nodes, links, and signals walking between them ---- */
  const R = rng(20261009), small = innerWidth < 760;
  const NP = small ? 160 : 270, pts = [];
  while (pts.length < NP) {
    const x = (R() * 2 - 1) * 42, y = (R() * 2 - 1) * 25 + 2, z = 8 - R() * 64;
    if (Math.abs(x - .5) < 8 && y > -8.5 && y < 14 && z > -11 && z < 4.5) continue;
    if (z > 3 && Math.abs(x) < 15 && y > -9 && y < 11) continue;
    if (Math.abs(x + 4.6) < 3.5 && Math.abs(y - 8.4) < 3.5 && Math.abs(z + 13) < 3.5) continue;
    pts.push(V(x, y, z));
  }
  const pairs = new Set(), lineIdx = [];
  pts.forEach((p, i) => {
    const near = pts.map((q, j) => [j, p.distanceToSquared(q)]).filter(([j]) => j !== i).sort((a, b) => a[1] - b[1]).slice(0, 3);
    near.forEach(([j, d2], n) => {
      if (n > 0 && d2 > 15 * 15) return;
      const key = i < j ? i + ':' + j : j + ':' + i;
      if (!pairs.has(key)) { pairs.add(key); lineIdx.push([i, j]); }
    });
  });
  const adj = pts.map(() => []);
  lineIdx.forEach(([a, b], e) => { adj[a].push(e); adj[b].push(e); });

  const shared = {
    uTime: { value: 0 }, uScale: { value: 1 }, uFog: { value: .0105 },
    uWave: { value: new THREE.Vector4(0, 0, 0, -99) }, uWaveAmp: { value: 0 },
    uFlash: { value: new THREE.Color() }, uGlow: { value: 1 },
  };
  const pointVS = `
    attribute float aSize; attribute float aPhase; attribute float aHub;
    uniform float uTime, uScale, uFog, uWaveAmp; uniform vec4 uWave;
    varying float vA; varying float vHub; varying float vW;
    void main(){
      vec4 mv = modelViewMatrix * vec4(position, 1.0);
      float depth = max(.5, -mv.z);
      float w = uWaveAmp * exp(-pow(distance(position, uWave.xyz) - uWave.w, 2.0) / 12.0);
      vA = exp(-uFog * uFog * depth * depth) * (.66 + .34 * sin(uTime * 1.3 + aPhase));
      vHub = aHub; vW = w;
      gl_PointSize = aSize * (1.0 + w * 1.5) * uScale / depth;
      gl_Position = projectionMatrix * mv;
    }`;
  const pointFS = `
    uniform vec3 uColor, uHub, uFlash; uniform float uAlpha, uGlow;
    varying float vA; varying float vHub; varying float vW;
    void main(){
      float r = length(gl_PointCoord - .5) * 2.0;
      float c = clamp(1.0 - r, 0.0, 1.0);
      float a = (pow(c, 6.0) + pow(c, 2.2) * .22) * vA * uAlpha;
      if (a < .004) discard;
      vec3 col = mix(mix(uColor, uHub, vHub), uFlash, clamp(vW, 0.0, 1.0));
      gl_FragColor = vec4(col * (1.0 + vW * 2.2 * uGlow), a);
    }`;
  const pointMat = (alpha) => new THREE.ShaderMaterial({
    uniforms: { ...shared, uColor: { value: new THREE.Color() }, uHub: { value: new THREE.Color() }, uAlpha: { value: alpha } },
    vertexShader: pointVS, fragmentShader: pointFS, transparent: true, depthWrite: false, blending: THREE.AdditiveBlending,
  });
  const netGeo = new THREE.BufferGeometry().setFromPoints(pts);
  const sizes = new Float32Array(NP), phases = new Float32Array(NP), hubs = new Float32Array(NP);
  for (let i = 0; i < NP; i++) { const hub = R() < .1; hubs[i] = hub ? 1 : 0; sizes[i] = hub ? 1.15 : .5 + R() * .25; phases[i] = R() * 6.28; }
  netGeo.setAttribute('aSize', new THREE.BufferAttribute(sizes, 1));
  netGeo.setAttribute('aPhase', new THREE.BufferAttribute(phases, 1));
  netGeo.setAttribute('aHub', new THREE.BufferAttribute(hubs, 1));
  const netMat = pointMat(1);
  const netPts = new THREE.Points(netGeo, netMat); netPts.frustumCulled = false; scene.add(netPts);

  const linePos = new Float32Array(lineIdx.length * 6);
  lineIdx.forEach(([a, b], i) => { pts[a].toArray(linePos, i * 6); pts[b].toArray(linePos, i * 6 + 3); });
  const lineGeo = new THREE.BufferGeometry(); lineGeo.setAttribute('position', new THREE.BufferAttribute(linePos, 3));
  const lineMat = new THREE.ShaderMaterial({
    uniforms: { uFog: shared.uFog, uWave: shared.uWave, uWaveAmp: shared.uWaveAmp, uFlash: shared.uFlash, uColor: { value: new THREE.Color() }, uAlpha: { value: .42 } },
    vertexShader: `
      uniform float uFog, uWaveAmp; uniform vec4 uWave; varying float vA; varying float vW;
      void main(){
        vec4 mv = modelViewMatrix * vec4(position, 1.0); float depth = max(.5, -mv.z);
        vA = exp(-uFog * uFog * depth * depth);
        vW = uWaveAmp * exp(-pow(distance(position, uWave.xyz) - uWave.w, 2.0) / 12.0);
        gl_Position = projectionMatrix * mv;
      }`,
    fragmentShader: `
      uniform vec3 uColor, uFlash; uniform float uAlpha; varying float vA; varying float vW;
      void main(){ gl_FragColor = vec4(mix(uColor, uFlash, clamp(vW, 0.0, 1.0)) * (1.0 + vW * 1.4), (uAlpha + vW * .6) * vA); }`,
    transparent: true, depthWrite: false, blending: THREE.AdditiveBlending,
  });
  const netLines = new THREE.LineSegments(lineGeo, lineMat); netLines.frustumCulled = false; scene.add(netLines);

  const NS = small ? 36 : 64;
  const sigGeo = new THREE.BufferGeometry();
  const sigPos = new Float32Array(NS * 3);
  sigGeo.setAttribute('position', new THREE.BufferAttribute(sigPos, 3));
  sigGeo.setAttribute('aSize', new THREE.BufferAttribute(new Float32Array(NS).fill(1.1), 1));
  sigGeo.setAttribute('aPhase', new THREE.BufferAttribute(new Float32Array(NS).map(() => R() * 6.28), 1));
  sigGeo.setAttribute('aHub', new THREE.BufferAttribute(new Float32Array(NS).fill(1), 1));
  const sigMat = pointMat(1);
  const sigPts = new THREE.Points(sigGeo, sigMat); sigPts.frustumCulled = false; scene.add(sigPts);
  const signals = [...Array(NS)].map(() => ({ e: Math.floor(R() * lineIdx.length), dir: R() < .5 ? 1 : -1, t: R(), sp: 3 + R() * 5 }));
  const tmp = V(0, 0, 0);

  /* ---- Theme ---- */
  let th;
  const cFront = new THREE.Color(), cBack = new THREE.Color(), cLit = new THREE.Color(), cFlash = new THREE.Color();
  const cShell = new THREE.Color(), cShellHi = new THREE.Color(), cRoute = new THREE.Color(), cRouteHi = new THREE.Color(), cServer = new THREE.Color();
  function setTheme(name) {
    th = PAL[name] || PAL.dark;
    renderer.setClearColor(th.bg, 1);
    renderer.toneMapping = th.bloom ? THREE.ACESFilmicToneMapping : THREE.NoToneMapping;
    scene.fog.color.set(th.bg); scene.fog.density = th.fog; shared.uFog.value = th.fog;
    bloom.enabled = th.bloom;
    ambL.color.set(th.amb[0]); ambL.intensity = th.amb[1];
    fill.visible = youLight.visible = th.bloom;
    thickMat.color.set(th.edge); thickMat.emissive.set(th.edgeEm);
    thinMat.color.set(th.thin); thinMat.emissive.set(th.thinEm);
    trailMat.color.copy(C(th.trail)); pktMat.color.copy(C(th.pkt)); youMat.color.copy(C(th.you));
    txMat.color.copy(C(th.pkt)); rxMat.color.copy(C(th.rx)); rungMat.color.copy(C(th.trail));
    reqMat.color.copy(C(th.pkt)); resMat.color.copy(C(th.rx));
    youHalo.material.opacity = th.halo; youHalo.visible = th.halo > 0;
    cFront.set(th.front); cBack.set(th.back); cLit.copy(C(th.lit)); cFlash.copy(C(th.flash));
    cShell.copy(C(th.shell)); cShellHi.copy(C(th.trail)); cRoute.copy(C(th.route)); cRouteHi.copy(C(th.trail)); cServer.copy(C(th.server));
    netMat.uniforms.uColor.value.set(th.net); netMat.uniforms.uHub.value.set(th.hub);
    sigMat.uniforms.uColor.value.copy(C(th.signal)); sigMat.uniforms.uHub.value.copy(C(th.signal));
    lineMat.uniforms.uColor.value.set(th.line); lineMat.uniforms.uAlpha.value = th.lineA;
    shared.uFlash.value.copy(C(th.flash)); shared.uGlow.value = th.glow;
    [netMat, sigMat, lineMat].forEach(m => { m.blending = th.additive ? THREE.AdditiveBlending : THREE.NormalBlending; m.needsUpdate = true; });
    serverLines.color.copy(cServer); core.material.color.copy(C(th.pkt));
  }
  setTheme(html.dataset.theme);

  /* ---- Layout: hero framing, section anchors, camera curves ---- */
  let W = 1, H = 1, mobile = false, anchors = [0, 1, 2, 3, 4, 5], posCurve, lookCurve, FX = [0, 0, 0, 0, 0, 0], FY = [0, 0, 0, 0, 0, 0];
  const hero = { cx: 0, cy: 0, h: 1, pos: V(0, 0, 40), look: V(0, 0, 0), fx: 0 };
  const tanHalf = () => Math.tan(cam.fov * Math.PI / 360);
  function layout() {
    const w = Math.max(1, canvas.clientWidth), h = Math.max(1, canvas.clientHeight);
    if (w !== W || h !== H) { W = w; H = h; renderer.setSize(W, H, false); composer.setPixelRatio(DPR); composer.setSize(W, H); }
    mobile = W < 760;
    cam.aspect = W / H;
    shared.uScale.value = H * DPR / (2 * tanHalf());
    const sy = scrollY, r = heroBox.getBoundingClientRect();
    hero.cx = r.left + r.width / 2; hero.cy = r.top + sy + r.height / 2; hero.h = Math.max(80, r.height);
    const D = 12.4 * H / (hero.h * 2 * tanHalf());
    hero.look.set(-.02, -.35, 0); hero.pos.set(-.02, -.35 + D * .035, D);
    hero.fx = (hero.cx - W / 2) / W;
    anchors = SECTIONS.map((el, i) => {
      if (!i) return 0;
      const top = el.getBoundingClientRect().top + sy, h = el.offsetHeight;
      return mobile ? top : top + Math.min(0, (h - H) / 2);
    });
    for (let i = 1; i < anchors.length; i++) anchors[i] = Math.max(anchors[i], anchors[i - 1] + 1);
    const ps = [], ls = [];
    WP.forEach((w, i) => {
      let pos = i ? w.pos.clone() : hero.pos.clone(), look = i ? w.look.clone() : hero.look.clone();
      if (mobile && i > 1) pos = look.clone().add(pos.sub(look).multiplyScalar(1.7));
      ps.push(pos); ls.push(look);
    });
    ps[1] = hero.pos.clone().lerp(ps[2], .5).add(V(1.4, -.6, 0)); ls[1] = hero.look.clone().lerp(ls[2], .55);
    posCurve = new THREE.CatmullRomCurve3(ps, false, 'centripetal');
    lookCurve = new THREE.CatmullRomCurve3(ls, false, 'centripetal');
    for (let i = 1; i < 6; i++) { FX[i] = mobile ? 0 : WP[i * 2].fx; FY[i] = mobile ? -.2 : 0; }
    FX[0] = hero.fx;
  }
  function uFromScroll(y) {
    for (let i = 0; i < 5; i++) {
      if (y < anchors[i + 1]) return i + smooth(.16, .84, (y - anchors[i]) / (anchors[i + 1] - anchors[i]));
    }
    return 5;
  }

  /* ---- Input from the page ---- */
  let hover = 0, hoverT = 0, px = 0, py = 0, sx = 0, sy = 0, spinT0 = -99, clock = 0;
  const bc = { t0: -99, origin: V(0, 0, 0), world: V(0, 0, 0) };
  heroMark.addEventListener('pointermove', e => {
    const r = heroBox.getBoundingClientRect();
    px = ((e.clientX - r.left) / r.width) * 2 - 1; py = -(((e.clientY - r.top) / r.height) * 2 - 1); hoverT = 1;
  });
  heroMark.addEventListener('pointerleave', () => { hoverT = 0; px = py = 0; });
  heroMark.addEventListener('focus', () => { hoverT = 1; });
  heroMark.addEventListener('blur', () => { hoverT = 0; });
  const broadcast = k => { bc.t0 = clock; bc.origin.copy(nodes[k].p); };
  addEventListener('protocol:broadcast', () => { broadcast(0); if (uS < .5) spinT0 = clock; kick(); });
  addEventListener('protocol:theme', e => { setTheme(e.detail.theme); kick(); });
  addEventListener('protocol:hs', e => { hsHover = e.detail.k; });
  addEventListener('protocol:word', e => { wordHover = e.detail.k; });
  addEventListener('protocol:route', e => { routeHover = e.detail.k; });
  addEventListener('protocol:request', () => { if (reqs.length < 6) reqs.push({ t0: clock }); lastReq = clock; });

  /* ---- Frame ---- */
  const m4 = new THREE.Matrix4(), q0 = new THREE.Quaternion(), sc = V(1, 1, 1), mid = V(0, 0, 0), col = new THREE.Color(), look = V(0, 0, 0), wp = V(0, 0, 0);
  let uS = 0, first = true, edgesDone = false, arrived = false, skipIntro = scrollY > innerHeight * .5, glT0 = 0;
  function update(dt) {
    const tI = reduce || skipIntro ? 20 : clock - glT0;
    const uT = uFromScroll(scrollY);
    uS = first || reduce ? uT : uS + (uT - uS) * (1 - Math.exp(-dt * 3.2));
    first = false;
    const u = reduce ? 0 : uS;
    hover += (hoverT - hover) * Math.min(1, dt * 6);
    sx += (px - sx) * Math.min(1, dt * 5); sy += (py - sy) * Math.min(1, dt * 5);

    /* camera */
    posCurve.getPoint(u / 5, cam.position);
    lookCurve.getPoint(u / 5, look);
    cam.lookAt(look);
    const i0 = Math.min(4, Math.floor(u)), f = u - i0;
    const fyHero = (hero.cy - (reduce ? 0 : scrollY) - H / 2) / H;
    const fx = lerp(FX[i0], FX[i0 + 1], f), fy = lerp(i0 === 0 ? fyHero : FY[i0], FY[i0 + 1], f);
    cam.setViewOffset(W, H, -fx * W, -fy * H, W, H);
    bloom.strength = lerp(.5, 1.12, smooth(16, 36, cam.position.distanceTo(look)));

    /* the P turns only in the hero */
    const heroW = 1 - smooth(0, .55, u), intro = eOut(span(tI, 0, 2.4));
    const spin = clock - spinT0 < 1.4 ? eInOut(span(clock - spinT0, 0, 1.4)) * Math.PI * 2 : 0;
    P.rotation.y = ((1 - intro) * -1.5 + Math.sin(tI * .35) * .4 * intro + sx * .6 * hover + spin) * heroW;
    P.rotation.x = (.1 - sy * .35 * hover) * heroW;

    /* broadcast wave */
    const bt = clock - bc.t0, wave = bt >= 0 && bt < 7 ? bt * 10 : -99, wAmp = bt >= 0 ? 1 - smooth(3, 6, bt) : 0;
    bc.world.copy(bc.origin).applyMatrix4(P.matrixWorld);
    shared.uWave.value.set(bc.world.x, bc.world.y, bc.world.z, wave); shared.uWaveAmp.value = wave > -1 ? wAmp : 0;
    shared.uTime.value = clock;

    /* route progress */
    const p = reduce ? 1 : lerp(PU[i0], PU[i0 + 1], f), d = p * L;
    node8Flash *= Math.exp(-dt * 3);
    nodes.forEach((nd, i) => {
      const pop = eBack(span(tI, .1 + nd.k * .09 + nd.layer * .06, .4));
      let fl = wave > -1 ? Math.exp(-Math.pow(nd.p.distanceTo(bc.origin) - wave, 2) / 1.6) * wAmp : 0;
      if (!nd.layer && nd.k === 8) fl = Math.max(fl, node8Flash);
      const lit = nd.layer ? 0 : smooth(reachedAt[nd.k] - 1.4, reachedAt[nd.k] + .1, d) * span(tI, 2.2, .5);
      const pulse = 1 + .08 * Math.sin(clock * 2.2 + i * .7) * intro;
      const k = Math.max(.0001, pop * (pulse + fl * .8 + hover * heroW * .15 + lit * .2));
      m4.compose(nd.p, q0, sc.set(k, k, k)); nodeMesh.setMatrixAt(i, m4);
      col.copy(nd.layer ? cBack : cFront).lerp(cLit, lit);
      if (th.glow) col.multiplyScalar(1 + hover * heroW * .5);
      col.lerp(cFlash, Math.min(1, fl)); nodeMesh.setColorAt(i, col);
    });
    nodeMesh.instanceMatrix.needsUpdate = true; nodeMesh.instanceColor.needsUpdate = true;
    if (!edgesDone) {
      edgesDone = tI > 3;
      let ti = 0, hi = 0;
      for (const e of edges) {
        const g = Math.max(.0001, eOut(span(tI, e.t0, e.kind ? .35 : .28)));
        mid.copy(e.A).addScaledVector(e.dir, e.len * g / 2);
        m4.compose(mid, e.q, sc.set(1, e.len * g, 1));
        if (e.kind) thin.setMatrixAt(hi++, m4); else thick.setMatrixAt(ti++, m4);
      }
      thick.instanceMatrix.needsUpdate = true; thin.instanceMatrix.needsUpdate = true;
    }
    const on = span(tI, 2.2, .6);
    segs.forEach((s, i) => {
      const g = clamp01((d - s.c0) / s.len) * on, r = g > 0 ? 1 : .0001;
      mid.copy(s.A).addScaledVector(s.dir, s.len * g / 2);
      m4.compose(mid, s.q, sc.set(r, Math.max(.0001, s.len * g), r)); trail.setMatrixAt(i, m4);
    });
    trail.instanceMatrix.needsUpdate = true;

    /* you */
    routeAt(d, you.position);
    const beat = 1 + .16 * Math.sin(clock * 4.2);
    const ys = Math.max(.0001, on * beat * (1 + .5 * (wave > -1 ? Math.exp(-Math.pow(you.position.distanceTo(bc.origin) - wave, 2) / 1.6) * wAmp : 0)));
    you.scale.setScalar(ys);
    youHalo.position.copy(you.position); youHalo.scale.setScalar(3.2 * ys);
    youLight.position.copy(you.position);

    /* idle packets */
    packets.forEach(pk => { along(pk.loop, ((clock * .1 + pk.off) % 1 + 1) % 1, pk.m.position); pk.m.scale.setScalar(Math.max(.0001, reduce ? 0 : on)); });

    /* 01 handshake */
    const hsOn = reduce ? 0 : smooth(.45, .9, u) * (1 - smooth(1.4, 1.85, u)), T = clock % 7.6;
    hsPk.forEach((h, m) => {
      const s0 = .3 + m * 1.0, ph = span(T, s0, .75);
      const f2 = h.dir > 0 ? eInOut(ph) : 1 - eInOut(ph);
      h.m.position.lerpVectors(nodes[h.r].p, nodes[h.r + N].p, f2);
      const fly = (ph > 0 && ph < 1 ? 1 : 0) * hsOn;
      h.m.scale.setScalar(Math.max(.0001, fly));
      h.glow.position.copy(h.m.position); h.glow.scale.setScalar(Math.max(.0001, 2.4 * fly)); h.glow.visible = th.halo > 0 && fly > 0;
      const lit = Math.max((T > s0 + .75 ? 1 - span(T, 7, .5) : ph * .4), hsHover === m ? 1 : 0) * hsOn;
      const A = nodes[h.r].p, B = nodes[h.r + N].p, len = A.distanceTo(B), r = Math.max(.0001, lit);
      mid.lerpVectors(A, B, .5);
      m4.compose(mid, q0.setFromUnitVectors(UP, tmp.subVectors(B, A).normalize()), sc.set(r, len, r)); rungGlow.setMatrixAt(m, m4);
    });
    q0.identity();
    rungGlow.instanceMatrix.needsUpdate = true;

    /* 02 the word */
    const wordOn = reduce ? 0 : smooth(1.3, 1.85, u) * (1 - smooth(2.4, 2.85, u));
    shellGroup.visible = wordOn > .001;
    if (shellGroup.visible) {
      shells.forEach(s => {
        s.hl += ((wordHover === s.i ? 1 : 0) - s.hl) * Math.min(1, dt * 8);
        s.g.position.set(s.home.x * 1.3, s.home.y * 1.45, (1 - s.row) * 1.15 + Math.sin(clock * .7 + s.i) * .08);
        s.g.rotation.set(Math.sin(clock * .5 + s.i) * .1, s.home.x * .16 + Math.sin(clock * .4 + s.i * 1.7) * .14, 0);
        s.g.scale.setScalar(Math.max(.0001, eOut(clamp01(wordOn * 1.6 - s.i * .1)) * (1 + .1 * s.hl)));
        s.line.material.color.copy(cShell).lerp(cShellHi, s.hl);
        s.face.material.opacity = .05 + .22 * s.hl;
        s.face.material.color.copy(cShellHi);
      });
    }

    /* 03 routes */
    const routesOn = reduce ? 0 : smooth(2.35, 3.0, u);
    routes.forEach((r, k) => {
      const g = eOut(clamp01((routesOn - k * .035) / .6));
      r.tube.visible = r.node.visible = r.ring.visible = g > .001;
      if (!r.tube.visible) { r.pk.visible = false; return; }
      r.geo.setDrawRange(0, Math.floor(g * 64) * 36);
      r.hl += ((routeHover === k ? 1 : 0) - r.hl) * Math.min(1, dt * 6);
      r.tube.material.color.copy(cRoute).lerp(cRouteHi, r.hl);
      r.node.scale.setScalar(Math.max(.0001, eBack(span(g, .85, .15)) * (1 + .35 * r.hl)));
      r.node.material.color.copy(cFront).lerp(cRouteHi, r.hl);
      r.ring.quaternion.copy(cam.quaternion);
      r.ring.material.color.copy(cRoute).lerp(cRouteHi, r.hl); r.ring.material.opacity = .35 + .65 * r.hl;
      r.ring.scale.setScalar(Math.max(.0001, g * (1 + .25 * r.hl + .06 * Math.sin(clock * 3 + k))));
      r.pk.visible = r.hl > .05;
      if (r.pk.visible) { r.curve.getPoint((clock * .75) % 1, r.pk.position); r.pk.scale.setScalar(r.hl); }
    });

    /* 04 questions */
    const serverOn = reduce ? 0 : smooth(3.4, 4.0, u);
    server.visible = linkTube.visible = serverOn > .001;
    if (server.visible) {
      server.scale.setScalar(Math.max(.0001, eOut(serverOn)));
      linkGeo.setDrawRange(0, Math.floor(eOut(serverOn) * 96) * 36);
      ico.rotation.y = clock * .25; ico.rotation.x = clock * .11;
      ringA.rotation.set(Math.PI / 2 + Math.sin(clock * .4) * .3, clock * .5, 0);
      ringB.rotation.set(Math.sin(clock * .3) * .5, clock * -.35, Math.PI / 3);
      serverFlash *= Math.exp(-dt * 3);
      core.scale.setScalar(1 + .12 * Math.sin(clock * 2.6) + serverFlash * .8);
      ringMat.color.copy(cServer).lerp(cFlash, serverFlash); ringMat.opacity = .5 + .5 * serverFlash;
      linkMat.color.copy(cRoute).lerp(cRouteHi, .35); linkMat.opacity = .9;
      if (serverOn > .9 && clock - lastReq > 6.5 && reqs.length === 0) { reqs.push({ t0: clock }); lastReq = clock; }
    }
    reqPk.forEach(m => { m.visible = false; });
    for (let i = reqs.length - 1; i >= 0; i--) {
      const a = clock - reqs[i].t0;
      if (a > 3.1) { reqs.splice(i, 1); continue; }
      const m = reqPk[i]; if (!m || !server.visible) continue;
      if (a < 1.3) { m.visible = true; m.material = reqMat; link.getPoint(eInOut(a / 1.3), m.position); }
      else if (a < 1.6) serverFlash = 1;
      else if (a < 2.9) { m.visible = true; m.material = resMat; link.getPoint(1 - eInOut((a - 1.6) / 1.3), m.position); }
      else node8Flash = 1;
    }

    /* 05 delivered: arrival broadcasts from the junction */
    if (!reduce) {
      if (uS > 4.7 && !arrived) { arrived = true; broadcast(2); }
      if (uS < 4.3) arrived = false;
    }

    /* the wider network */
    signals.forEach((s, i) => {
      const [a, b] = lineIdx[s.e], A = pts[a], B = pts[b], len = A.distanceTo(B) || 1;
      if (!reduce) s.t += dt * s.sp / len;
      if (s.t >= 1) {
        const end = s.dir > 0 ? b : a, opts = adj[end];
        s.e = opts[Math.floor(R() * opts.length)]; s.dir = lineIdx[s.e][0] === end ? 1 : -1; s.t = 0;
      }
      const [a2, b2] = lineIdx[s.e];
      tmp.lerpVectors(pts[a2], pts[b2], s.dir > 0 ? s.t : 1 - s.t).toArray(sigPos, i * 3);
    });
    sigGeo.attributes.position.needsUpdate = true;
    sigPts.visible = !reduce;

    /* the "you" tag follows the packet on screen */
    if (youTag) {
      const showTag = !reduce && u > .55 && u < 4.75 && on > .5;
      youTag.classList.toggle('on', showTag);
      if (showTag) {
        you.getWorldPosition(wp).project(cam);
        youTag.style.transform = `translate3d(${((wp.x + 1) / 2 * W).toFixed(1)}px, ${((1 - wp.y) / 2 * H).toFixed(1)}px, 0)`;
      }
    }
  }

  layout();
  let started = false, last = performance.now();
  const render = () => { composer.render(); if (!started) { started = true; html.classList.add('gl-on'); } };
  function kick() { if (reduce) requestAnimationFrame(() => { update(0); render(); }); }
  const ro = new ResizeObserver(() => { layout(); kick(); });
  ro.observe(canvas); ro.observe(document.body);
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(() => { layout(); kick(); });
  glT0 = 0; clock = 0;
  if (reduce) { update(0); render(); addEventListener('scroll', kick, { passive: true }); }
  else {
    const t0 = performance.now();
    const loop = now => {
      requestAnimationFrame(loop);
      const dt = Math.min(.25, Math.max(0, now - last) / 1000); last = now;
      clock = (now - t0) / 1000;
      update(dt);
      render();
    };
    requestAnimationFrame(loop);
  }
  window.__protocolScene = { get u() { return uS; }, anchors: () => anchors.slice() };
}
start();
</script>
@endverbatim
</body>
</html>
