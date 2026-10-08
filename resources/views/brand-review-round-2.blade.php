{{--
    Protocol.com — private identity review, round two (3D marks).
    Self-contained: no Vite build. Fonts from Google Fonts, three.js 0.160.0 from jsDelivr.
    Kept out of search: robots meta below + X-Robots-Tag header on the route.
--}}
@php
    // Flat drawings of each 3D mark, for favicons and app icons. Colours come from
    // --i-* custom properties on the wrapper, so one drawing serves light, dark and brand tiles.
    $inP = fn (float $x, float $y) => ($x >= -0.78 && $x <= -0.36 && $y >= -1.2 && $y <= 1.12)
        || ($x >= -0.4 && ($d = hypot($x - 0.14, $y - 0.44)) >= 0.3 && $d <= 0.68);

    $mark = [
        'lattice' => function () {
            $pts = [[-.6, -1.15], [-.6, -.62], [-.6, -.1], [-.6, .45], [-.6, 1], [-.2, 1], [.2, 1], [.589, .839], [.75, .45], [.589, .061], [.2, -.1], [-.2, -.1]];
            $xy = array_map(fn ($p) => [round(100 + ($p[0] - .075) * 95, 1), round(100 - ($p[1] + .075) * 80, 1)], $pts);
            $chain = [[0, 1], [1, 2], [2, 3], [3, 4], [4, 5], [5, 6], [6, 7], [7, 8], [8, 9], [9, 10], [10, 11], [11, 2]];
            $lines = collect($chain)->map(fn ($e) => "M{$xy[$e[0]][0]} {$xy[$e[0]][1]} L{$xy[$e[1]][0]} {$xy[$e[1]][1]}")->implode(' ');
            $dots = collect([0, 2, 4, 6, 8, 10])->map(fn ($i) => '<circle cx="'.$xy[$i][0].'" cy="'.$xy[$i][1].'" r="13" style="fill:var(--i-acc);stroke:var(--i-ink)" stroke-width="5"></circle>')->implode('');

            return '<svg viewBox="0 0 200 200" aria-hidden="true"><path d="'.$lines.'" fill="none" stroke-width="10" stroke-linecap="round" style="stroke:var(--i-ink)"></path>'.$dots.'</svg>';
        },
        'swarm' => function () use ($inP) {
            $out = '';
            $n = 0;
            for ($y = -1.15; $y <= 1.1; $y += .118) {
                for ($x = -.76; $x <= .84; $x += .118) {
                    if ($inP($x, $y)) {
                        $n++;
                        $out .= '<circle cx="'.round(100 + ($x - .03) * 92, 1).'" cy="'.round(100 - ($y + .04) * 80, 1).'" r="6.2" style="fill:var(--i-'.($n % 6 === 0 ? 'acc' : 'ink').')"></circle>';
                    }
                }
            }

            return '<svg viewBox="0 0 200 200" aria-hidden="true">'.$out.'</svg>';
        },
        'fold' => function () {
            $cells = [[0, 0], [0, 1], [0, 2], [0, 3], [0, 4], [0, 5], [0, 6], [1, 6], [2, 6], [3, 6], [3, 5], [3, 4], [2, 4], [1, 4]];
            $out = '';
            foreach ($cells as $i => [$c, $r]) {
                $fill = $i === 0 ? 'acc' : ($i % 2 ? 'a' : 'b');
                $out .= '<rect x="'.(53 + $c * 24.5).'" y="'.(170 - $r * 24.5).'" width="22" height="22" rx="4" style="fill:var(--i-'.$fill.')"></rect>';
            }

            return '<svg viewBox="0 0 200 200" aria-hidden="true">'.$out.'</svg>';
        },
        'flip' => function () {
            $bitmap = ['.........', '.######..', '.#######.', '.##...##.', '.##...##.', '.#######.', '.######..', '.##......', '.##......', '.##......', '.........'];
            $out = '';
            foreach ($bitmap as $r => $row) {
                foreach (str_split($row) as $c => $ch) {
                    $out .= '<rect x="'.(22.5 + $c * 17.5).'" y="'.(5 + $r * 17.5).'" width="15" height="15" rx="2" style="fill:var(--i-'.($ch === '#' ? 'on' : 'off').')"></rect>';
                }
            }

            return '<svg viewBox="0 0 200 200" aria-hidden="true">'.$out.'</svg>';
        },
        'fibre' => fn () => '<svg viewBox="0 0 200 200" aria-hidden="true"><path d="M76 150 V50 Q76 30 96 30 H112 A44 44 0 0 1 112 118 H90" fill="none" stroke-width="24" stroke-linecap="round" stroke-linejoin="round" style="stroke:var(--i-ink)"></path><path d="M76 150 V50 Q76 30 96 30 H112 A44 44 0 0 1 112 118 H90" fill="none" stroke-width="5" stroke-linecap="round" stroke-dasharray="14 22" style="stroke:var(--i-acc)"></path><rect x="61" y="146" width="30" height="40" rx="5" style="fill:var(--i-metal)"></rect><circle cx="84" cy="106" r="5" style="fill:var(--i-acc)"></circle><circle cx="80" cy="120" r="4" style="fill:var(--i-acc)"></circle><circle cx="86" cy="130" r="3" style="fill:var(--i-acc)"></circle></svg>',
    ];

    $vars = fn (array $c) => collect($c)->except('bg')->map(fn ($v, $k) => "--i-{$k}: {$v}")->push('--i-bg: '.($c['bg'] ?? 'transparent'))->implode('; ');

    $concepts = [
        [
            'id' => 'lattice', 'num' => '01', 'name' => 'Lattice',
            'idea' => 'The P as a two-layer truss of nodes and links, a network you can walk around. Nodes come online one by one, packets run the loop of the bowl, and a click broadcasts a signal outwards from the base node.',
            'word' => 'PROTOCOL', 'wordClass' => 'w-lattice',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings', 'family' => 'Red Hat Display', 'css' => "'Red Hat Display', system-ui, sans-serif", 'weight' => 600, 'tracking' => '0.02em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Red Hat Text', 'css' => "'Red Hat Text', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Midnight', '#060A14', 'Dark background', '#E7EEF8'],
                ['Signal Cyan', '#4FD1FF', 'Accent on dark', '#060A14'],
                ['Navy', '#14306E', 'Primary on light', '#FFFFFF'],
                ['Ice', '#EEF2F8', 'Light background', '#14306E'],
                ['Steel Blue', '#6F8FC4', 'Supporting links', '#060A14'],
                ['Ocean', '#0E9BD6', 'Accent on light', '#060A14'],
            ],
            'icons' => [
                'light' => ['bg' => '#EEF2F8', 'ink' => '#14306E', 'acc' => '#0E9BD6'],
                'dark' => ['bg' => '#060A14', 'ink' => '#9CCBFF', 'acc' => '#4FD1FF'],
                'brand' => ['bg' => '#14306E', 'ink' => '#FFFFFF', 'acc' => '#4FD1FF'],
            ],
            'stages' => ['light' => ['#EEF2F8', '#14306E', '#4E5F7E'], 'dark' => ['#060A14', '#E7EEF8', '#8C99AE']],
        ],
        [
            'id' => 'swarm', 'num' => '02', 'name' => 'Swarm',
            'idea' => 'Twelve hundred points spiral in from every direction and agree on one shape: a solid P with real depth. The pointer pushes the swarm apart where it passes; a click scatters it and lets it regroup.',
            'word' => 'protocol', 'wordClass' => 'w-swarm',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings', 'family' => 'Gloock', 'css' => "'Gloock', Georgia, serif", 'weight' => 400, 'tracking' => '-0.01em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Hanken Grotesk', 'css' => "'Hanken Grotesk', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Nightshade', '#0D0B12', 'Dark background', '#F3ECE4'],
                ['Ember', '#FF6A3D', 'Accent on dark', '#0D0B12'],
                ['Paper', '#F1ECE4', 'Light background', '#2A2420'],
                ['Charcoal', '#2A2420', 'Points & text on light', '#F1ECE4'],
                ['Signal Orange', '#E2552B', 'Accent on light', '#0D0B12'],
                ['Dusk', '#9C93A3', 'Secondary text on dark', '#0D0B12'],
            ],
            'icons' => [
                'light' => ['bg' => '#F1ECE4', 'ink' => '#2A2420', 'acc' => '#E2552B'],
                'dark' => ['bg' => '#0D0B12', 'ink' => '#FFE8D2', 'acc' => '#FF6A3D'],
                'brand' => ['bg' => '#E2552B', 'ink' => '#FFF4EC', 'acc' => '#2A2420'],
            ],
            'stages' => ['light' => ['#F1ECE4', '#2A2420', '#6A5F55'], 'dark' => ['#0D0B12', '#F3ECE4', '#9C93A3']],
        ],
        [
            'id' => 'fold', 'num' => '03', 'name' => 'Fold',
            'idea' => 'Fourteen lacquered blocks on an elastic, the kind of puzzle that only works if you take the steps in order. It starts as a tangle and solves itself, one joint at a time, into a P. Click to scramble it into a new tangle and watch it solve again.',
            'word' => 'protocol', 'wordClass' => 'w-fold',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings', 'family' => 'Rubik', 'css' => "'Rubik', system-ui, sans-serif", 'weight' => 600, 'tracking' => '-0.02em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Karla', 'css' => "'Karla', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Cobalt', '#2B4BD6', 'Primary blocks', '#FFFFFF'],
                ['Sky', '#8FB0FF', 'Alternate blocks on light', '#0F1320'],
                ['Coral', '#FF5B3A', 'Start block · accent', '#0F1320'],
                ['Night', '#0F1320', 'Dark background', '#ECEFF4'],
                ['Mist', '#ECEFF4', 'Light background', '#0F1320'],
                ['Ice', '#DCE5F5', 'Alternate blocks on dark', '#0F1320'],
            ],
            'icons' => [
                'light' => ['bg' => '#ECEFF4', 'a' => '#2B4BD6', 'b' => '#8FB0FF', 'acc' => '#FF5B3A'],
                'dark' => ['bg' => '#0F1320', 'a' => '#3A62F0', 'b' => '#DCE5F5', 'acc' => '#FF5B3A'],
                'brand' => ['bg' => '#2B4BD6', 'a' => '#FFFFFF', 'b' => '#8FB0FF', 'acc' => '#FF5B3A'],
            ],
            'stages' => ['light' => ['#ECEFF4', '#0F1320', '#4D5568'], 'dark' => ['#0F1320', '#ECEFF4', '#8E97AD']],
        ],
        [
            'id' => 'flip', 'num' => '04', 'name' => 'Flip wall',
            'idea' => 'A wall of 99 flip tiles, like an old departures board. It runs a few rounds of the Game of Life, a system driven by a handful of simple rules, then settles into the P. Tiles lean towards the pointer; a click sends a flip across the wall.',
            'word' => 'PROTOCOL', 'wordClass' => 'w-flip',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, display', 'family' => 'Doto', 'css' => "'Doto', ui-monospace, monospace", 'weight' => 800, 'tracking' => '0.06em'],
                ['role' => 'Secondary', 'use' => 'Body copy, data, interface', 'family' => 'IBM Plex Mono', 'css' => "'IBM Plex Mono', ui-monospace, monospace", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Graphite', '#1E2126', 'Dark background', '#F2EEE4'],
                ['Signal Yellow', '#FFC93C', 'Tiles on dark', '#16181D'],
                ['Ink', '#16181D', 'Tiles on light · text', '#F2EEE4'],
                ['Aluminium', '#E3E5E9', 'Light background', '#16181D'],
                ['Tile Grey', '#2E3238', 'Off tiles on dark', '#F2EEE4'],
                ['Steel', '#A2A8B0', 'Tile edges', '#16181D'],
            ],
            'icons' => [
                'light' => ['bg' => '#E3E5E9', 'on' => '#16181D', 'off' => '#CDD1D7'],
                'dark' => ['bg' => '#1E2126', 'on' => '#FFC93C', 'off' => '#2E3238'],
                'brand' => ['bg' => '#16181D', 'on' => '#FFC93C', 'off' => '#2A2D33'],
            ],
            'stages' => ['light' => ['#E3E5E9', '#16181D', '#525862'], 'dark' => ['#1E2126', '#F2EEE4', '#959BA5']],
        ],
        [
            'id' => 'fibre', 'num' => '05', 'name' => 'Fibre',
            'idea' => 'A braided bundle of glass fibres runs out of a connector at the foot of the stem, twists up and round into the P, and sprays its light back at the stem. Pulses run through it like data down a cable. Hover speeds the traffic; a click fires one packet down every fibre.',
            'word' => 'PROTOCOL', 'wordClass' => 'w-fibre',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings (set wide)', 'family' => 'Sora', 'css' => "'Sora', system-ui, sans-serif", 'weight' => 300, 'tracking' => '0.12em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Instrument Sans', 'css' => "'Instrument Sans', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Void', '#05070B', 'Dark background', '#DDF6FF'],
                ['Cyan', '#38D6FF', 'Fibres on dark', '#05070B'],
                ['Ice Glow', '#BFEFFF', 'Pulses & tips', '#05070B'],
                ['Deep Blue', '#0B5CAD', 'Fibres on light', '#FFFFFF'],
                ['Cloud', '#EDF1F6', 'Light background', '#0B5CAD'],
                ['Violet', '#8C7BFF', 'Secondary fibres', '#05070B'],
            ],
            'icons' => [
                'light' => ['bg' => '#EDF1F6', 'ink' => '#0B5CAD', 'acc' => '#38D6FF', 'metal' => '#9AA3AE'],
                'dark' => ['bg' => '#05070B', 'ink' => '#1C6EA8', 'acc' => '#BFEFFF', 'metal' => '#6B737E'],
                'brand' => ['bg' => '#0B5CAD', 'ink' => '#05070B', 'acc' => '#BFEFFF', 'metal' => '#D6DCE4'],
            ],
            'stages' => ['light' => ['#EDF1F6', '#0B2E57', '#4E6075'], 'dark' => ['#05070B', '#DDF6FF', '#7C8EA0']],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex">
<meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex">
<meta name="bingbot" content="noindex, nofollow, noarchive">
<meta name="referrer" content="no-referrer">
<title>Protocol identity review, round two — private</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Doto:wght@800&amp;family=Geist+Mono:wght@400;500&amp;family=Geist:wght@400;500;600&amp;family=Gloock&amp;family=Hanken+Grotesk:wght@400;500&amp;family=IBM+Plex+Mono:wght@400;500&amp;family=Instrument+Sans:wght@400;500&amp;family=Karla:wght@400;500&amp;family=Red+Hat+Display:wght@600&amp;family=Red+Hat+Text:wght@400;500&amp;family=Rubik:wght@600&amp;family=Sora:wght@300&amp;display=swap">
@verbatim
<script type="importmap">
{"imports":{"three":"https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js","three/addons/":"https://cdn.jsdelivr.net/npm/three@0.160.0/examples/jsm/"}}
</script>
<style>
:root{--page:#F4F3EF;--text:#151515;--muted:#5E5D58;--line:#E2E0D9;--card:#FFFFFF}
*{box-sizing:border-box}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{margin:0;background:var(--page);color:var(--text);font:400 16px/1.55 'Geist',system-ui,sans-serif}
a{color:inherit}
.wrap{max-width:1200px;margin:0 auto;padding:0 16px}
@media (min-width:760px){.wrap{padding:0 32px}}

.top{position:sticky;top:0;z-index:10;background:rgba(244,243,239,.88);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid var(--line)}
.top .wrap{display:flex;align-items:center;justify-content:space-between;gap:16px;min-height:60px;flex-wrap:wrap;padding-top:8px;padding-bottom:8px}
.brand{display:flex;align-items:baseline;gap:12px;font-weight:600;letter-spacing:-.01em}
.brand small{font-weight:400;font-size:13px;color:var(--muted)}
.nav{display:flex;gap:4px;flex-wrap:wrap}
.nav a{display:inline-flex;align-items:center;gap:6px;min-height:44px;padding:0 12px;border-radius:999px;text-decoration:none;font-size:14px;color:var(--muted)}
.nav a:hover{background:#E9E7E1;color:var(--text)}
.nav a span{font-family:'Geist Mono',monospace;font-size:12px}

.hero{padding-top:72px;padding-bottom:40px}
.eyebrow{font:500 12px/1 'Geist Mono',monospace;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin:0 0 20px}
.hero h1{font-size:clamp(36px,6vw,64px);line-height:1.02;letter-spacing:-.035em;font-weight:600;margin:0;max-width:15ch;text-wrap:balance}
.hero p{max-width:62ch;color:var(--muted);font-size:18px;margin:24px 0 0;text-wrap:pretty}
.how{display:flex;gap:8px;flex-wrap:wrap;margin-top:28px}
.how span{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border:1px solid var(--line);border-radius:999px;font-size:14px;background:var(--card)}
.how b{font:500 11px/1 'Geist Mono',monospace;letter-spacing:.08em;text-transform:uppercase;color:var(--muted)}

.concept{padding:56px 0;border-top:1px solid var(--line);scroll-margin-top:72px}
.c-head{display:grid;gap:12px 40px;margin-bottom:28px}
@media (min-width:900px){.c-head{grid-template-columns:minmax(0,1fr) minmax(0,1.3fr);align-items:end}}
.c-head h2{margin:0;font-size:clamp(32px,4.4vw,48px);letter-spacing:-.03em;line-height:1;font-weight:600;display:flex;align-items:baseline;gap:16px}
.c-head h2 span{font:500 14px/1 'Geist Mono',monospace;color:var(--muted);letter-spacing:.04em}
.c-head p{margin:0;color:var(--muted);max-width:60ch;text-wrap:pretty}

.stages{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
@media (max-width:760px){.stages{grid-template-columns:minmax(0,1fr)}}
.stage{position:relative;height:clamp(380px,40vw,480px);border-radius:24px;overflow:hidden;background:var(--bg);color:var(--ink)}
.hit{position:absolute;inset:0;appearance:none;border:0;padding:0;margin:0;background:none;display:block;width:100%;height:100%;cursor:pointer;-webkit-tap-highlight-color:transparent}
.hit:focus-visible{outline:2px solid var(--ink);outline-offset:-8px;border-radius:24px}
.hit canvas{display:block;width:100%;height:100%}
.stage .mode{position:absolute;top:18px;left:20px;font:500 11px/1 'Geist Mono',monospace;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);pointer-events:none}
.word{position:absolute;left:50%;bottom:26px;transform:translateX(-50%);line-height:1;white-space:nowrap;pointer-events:none;color:var(--ink)}
.w-lattice{font:600 clamp(18px,2.2vw,24px)/1 'Red Hat Display',system-ui,sans-serif;letter-spacing:.32em;padding-left:.32em}
.w-swarm{font:400 clamp(32px,4vw,44px)/1 'Gloock',Georgia,serif;letter-spacing:-.01em}
.w-fold{font:600 clamp(30px,3.8vw,42px)/1 'Rubik',system-ui,sans-serif;letter-spacing:-.02em}
.w-flip{font:800 clamp(24px,3vw,34px)/1 'Doto',ui-monospace,monospace;letter-spacing:.08em;padding-left:.08em}
.w-fibre{font:300 clamp(17px,2vw,22px)/1 'Sora',system-ui,sans-serif;letter-spacing:.46em;padding-left:.46em}
.replay{position:absolute;right:14px;top:10px;height:44px;padding:0 16px 0 12px;display:flex;align-items:center;gap:8px;border-radius:999px;border:1px solid color-mix(in srgb,var(--ink) 24%,transparent);background:color-mix(in srgb,var(--bg) 70%,transparent);color:var(--ink);font:500 13px/1 'Geist',system-ui,sans-serif;cursor:pointer;transition:background-color .2s,border-color .2s}
.replay:hover{background:color-mix(in srgb,var(--ink) 8%,var(--bg));border-color:color-mix(in srgb,var(--ink) 45%,transparent)}
.replay:focus-visible{outline:2px solid var(--ink);outline-offset:3px}
.fallback{position:absolute;inset:0;display:none;place-items:center;padding:24px;text-align:center;color:var(--muted);font-size:14px}
.no-webgl .fallback{display:grid}

.details{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px;margin-top:16px}
@media (max-width:760px){.details{grid-template-columns:minmax(0,1fr)}}
.card{background:var(--card);border:1px solid var(--line);border-radius:24px;padding:24px;min-width:0}
.card h3{margin:0 0 20px;font:500 12px/1 'Geist Mono',monospace;letter-spacing:.12em;text-transform:uppercase;color:var(--muted)}
.tabbar{display:flex;align-items:flex-end;height:46px;padding:0 10px;border-radius:12px 12px 0 0;gap:4px}
.tabbar.light{background:#DEE1E6}
.tabbar.dark{background:#1F2023;margin-top:12px}
.tab{display:flex;align-items:center;gap:10px;height:36px;padding:0 12px;border-radius:10px 10px 0 0;font:400 13px/1 system-ui,sans-serif;min-width:0;width:230px;max-width:100%}
.tabbar.light .tab{background:#FFFFFF;color:#1F1F1F}
.tabbar.dark .tab{background:#35363A;color:#E8EAED}
.tab .t{flex:1;overflow:hidden;white-space:nowrap;text-overflow:ellipsis}
.tab .x{opacity:.6;font-size:15px}
.tab .fav{width:16px;height:16px;flex:none;display:block}
.fav svg,.app svg,.sz svg{display:block;width:100%;height:100%}
.sizes{display:flex;gap:12px;margin-top:20px;flex-wrap:wrap}
.sizes .grp{display:flex;align-items:flex-end;gap:14px;padding:14px 16px;border-radius:14px;background:var(--i-bg)}
.sz{display:flex;flex-direction:column;align-items:center;gap:8px;font:400 11px/1 'Geist Mono',monospace}
.sizes .grp.light .sz{color:#5E5D58}
.sizes .grp.dark .sz{color:#A3A3A8}
.apps{display:flex;gap:20px;flex-wrap:wrap}
.app-item{display:flex;flex-direction:column;align-items:center;gap:10px;font-size:13px;color:var(--muted)}
.app{width:96px;height:96px;border-radius:22.5%;background:var(--i-bg);padding:16px;box-shadow:0 1px 2px rgba(0,0,0,.08),0 8px 24px -8px rgba(0,0,0,.25),inset 0 0 0 1px rgba(0,0,0,.06)}
.app.sm{width:60px;height:60px;padding:10px}
.apps-row{display:flex;align-items:flex-end;gap:14px;margin-top:22px;padding-top:20px;border-top:1px solid var(--line);flex-wrap:wrap}
.fonts{display:grid;gap:20px}
.font{display:grid;grid-template-columns:auto minmax(0,1fr);gap:4px 20px;align-items:center}
.font .aa{font-size:64px;line-height:1;grid-row:span 3}
.font .role{font:500 11px/1.4 'Geist Mono',monospace;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
.font .fam{font-size:20px;font-weight:600;letter-spacing:-.01em}
.font .use{font-size:13px;color:var(--muted)}
.sample{margin:4px 0 0;padding-top:16px;border-top:1px solid var(--line);display:grid;gap:10px}
.sample .h{font-size:clamp(22px,2.8vw,28px);line-height:1.15;margin:0;text-wrap:balance}
.sample .b{font-size:16px;line-height:1.6;margin:0;color:#3D3C38}
.swatches{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}
@media (max-width:480px){.swatches{grid-template-columns:repeat(2,minmax(0,1fr))}}
.sw{border-radius:16px;padding:14px;min-height:112px;display:flex;flex-direction:column;justify-content:space-between;gap:10px;box-shadow:inset 0 0 0 1px rgba(0,0,0,.07)}
.sw b{font-size:15px;font-weight:600}
.sw span{display:block;font:400 12px/1.35 'Geist Mono',monospace}
.closing{padding:64px 0;border-top:1px solid var(--line)}
.closing h2{font-size:clamp(28px,4vw,40px);letter-spacing:-.03em;line-height:1.05;margin:0;font-weight:600}
.closing p{color:var(--muted);max-width:62ch;margin:16px 0 0}
.foot{border-top:1px solid var(--line);padding:28px 0 40px}
.foot .wrap{display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;font-size:13px;color:var(--muted)}
.credit{display:inline-flex;align-items:center;gap:12px;text-decoration:none;color:#151515;min-height:44px}
.credit svg{height:20px;width:auto;display:block}
.credit:hover svg{opacity:.8}
@media (prefers-reduced-motion:reduce){html{scroll-behavior:auto}}
</style>
@endverbatim
</head>
<body>

<header class="top">
    <div class="wrap">
        <div class="brand">Protocol.com <small>Identity review · round two · private preview</small></div>
        <nav class="nav" aria-label="Directions">
            @foreach ($concepts as $c)
                <a href="#{{ $c['id'] }}"><span>{{ $c['num'] }}</span>{{ $c['name'] }}</a>
            @endforeach
        </nav>
    </div>
</header>

<main>
    <section class="hero wrap">
        <p class="eyebrow">Protocol.com · Brand identity · Round two</p>
        <h1>Five directions for the Protocol mark, built in 3D.</h1>
        <p>Each icon is a real three-dimensional object, shown live in light and dark mode, with its flat favicon and app icon, type pairing and colour palette. The wordmark stays flat, as it would on a website header or a business card.</p>
        <div class="how">
            <span><b>Move</b> Tilt or steer a mark</span>
            <span><b>Click</b> Set it off (or press Enter)</span>
            <span><b>Replay</b> Watch the intro again</span>
        </div>
    </section>

    @foreach ($concepts as $c)
        <section class="concept" id="{{ $c['id'] }}" aria-labelledby="{{ $c['id'] }}-title">
            <div class="wrap">
                <div class="c-head">
                    <h2 id="{{ $c['id'] }}-title"><span>{{ $c['num'] }}</span>{{ $c['name'] }}</h2>
                    <p>{{ $c['idea'] }}</p>
                </div>

                <div class="stages">
                    @foreach (['light', 'dark'] as $m)
                        @php([$sbg, $sink, $smuted] = $c['stages'][$m])
                        <div class="stage" data-concept="{{ $c['id'] }}" data-mode="{{ $m }}" style="--bg: {{ $sbg }}; --ink: {{ $sink }}; --muted: {{ $smuted }}">
                            <button type="button" class="hit" aria-label="Play the {{ $c['name'] }} mark, {{ $m }} mode"><canvas></canvas></button>
                            <span class="mode">{{ ucfirst($m) }} mode</span>
                            <span class="word {{ $c['wordClass'] }}">{{ $c['word'] }}</span>
                            <button type="button" class="replay">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 3-6.7"></path><path d="M3 4v5h5"></path></svg>
                                <span>Replay</span>
                            </button>
                            <p class="fallback">This mark needs WebGL, which this browser has turned off.</p>
                        </div>
                    @endforeach
                </div>

                <div class="details">
                    <div class="card">
                        <h3>Favicon</h3>
                        <div class="tabbar light">
                            <div class="tab"><span class="fav" style="{{ $vars($c['icons']['light']) }}">{!! $mark[$c['id']]() !!}</span><span class="t">Protocol.com</span><span class="x" aria-hidden="true">×</span></div>
                        </div>
                        <div class="tabbar dark">
                            <div class="tab"><span class="fav" style="{{ $vars($c['icons']['dark']) }}">{!! $mark[$c['id']]() !!}</span><span class="t">Protocol.com</span><span class="x" aria-hidden="true">×</span></div>
                        </div>
                        <div class="sizes">
                            @foreach (['light', 'dark'] as $m)
                                <div class="grp {{ $m }}" style="{{ $vars($c['icons'][$m]) }}">
                                    @foreach ([16, 32, 48] as $sz)
                                        <div class="sz"><span style="width: {{ $sz }}px; height: {{ $sz }}px; display: block">{!! $mark[$c['id']]() !!}</span>{{ $sz }}px</div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <h3>App icon</h3>
                        <div class="apps">
                            @foreach (['light' => 'Light', 'dark' => 'Dark', 'brand' => 'Brand'] as $k => $label)
                                <div class="app-item">
                                    <div class="app" style="{{ $vars($c['icons'][$k]) }}">{!! $mark[$c['id']]() !!}</div>
                                    {{ $label }}
                                </div>
                            @endforeach
                        </div>
                        <div class="apps-row" aria-label="Smaller sizes">
                            @foreach (['light', 'dark', 'brand'] as $k)
                                <div class="app sm" style="{{ $vars($c['icons'][$k]) }}">{!! $mark[$c['id']]() !!}</div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <h3>Typography</h3>
                        <div class="fonts">
                            @foreach ($c['fonts'] as $f)
                                <div class="font">
                                    <span class="aa" style="font-family: {{ $f['css'] }}; font-weight: {{ $f['weight'] }}; letter-spacing: {{ $f['tracking'] }}" aria-hidden="true">Aa</span>
                                    <span class="role">{{ $f['role'] }}</span>
                                    <span class="fam">{{ $f['family'] }}</span>
                                    <span class="use">{{ $f['use'] }}</span>
                                </div>
                            @endforeach
                            <div class="sample">
                                <p class="h" style="font-family: {{ $c['fonts'][0]['css'] }}; font-weight: {{ $c['fonts'][0]['weight'] }}; letter-spacing: {{ $c['fonts'][0]['tracking'] }}">Protocol.com — the agreed way things connect.</p>
                                <p class="b" style="font-family: {{ $c['fonts'][1]['css'] }}">The word comes from the Greek prōtokollon: the first sheet glued to a papyrus roll, recording what the roll contained.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h3>Colour palette</h3>
                        <div class="swatches">
                            @foreach ($c['palette'] as [$name, $hex, $role, $on])
                                <div class="sw" style="background: {{ $hex }}; color: {{ $on }}">
                                    <b>{{ $name }}</b>
                                    <div><span>{{ $hex }}</span><span>{{ $role }}</span></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="closing">
        <div class="wrap">
            <h2>Choosing a direction</h2>
            <p>Let us know the number of the direction you prefer. Each 3D mark comes with a flat version for favicons, app icons, print and social images, and elements can be combined before the identity is finalised.</p>
        </div>
    </section>
</main>

<footer class="foot">
    <div class="wrap">
        <span>Private preview for Protocol.com — please don’t share this link.</span>
        <a class="credit" href="https://qquantum.ai/creative-design/brand-identity-logos" target="_blank" rel="noopener" title="QQuantum.ai — brand identity and logo design">
            <span>Brand identity by</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-40 -780 5620 1010" role="img" aria-label="QQuantum.ai" fill="none"><title>QQuantum.ai</title><g><path transform="translate(301 0)" d="M338 14Q206 14 128 -58Q50 -131 50 -266V-434Q50 -569 128 -642Q206 -714 338 -714Q470 -714 548 -642Q626 -569 626 -434V-266Q626 -131 548 -58Q470 14 338 14ZM338 -104Q412 -104 453 -147Q494 -190 494 -262V-438Q494 -510 453 -553Q412 -596 338 -596Q265 -596 224 -553Q182 -510 182 -438V-262Q182 -190 224 -147Q265 -104 338 -104ZM384 180Q335 180 304 150Q274 119 274 68V0H402V48Q402 78 430 78H489V180Z" fill="currentColor"/></g><g><path transform="translate(942 0)" d="M259 8Q201 8 158 -18Q114 -45 90 -92Q66 -139 66 -200V-496H192V-210Q192 -154 220 -126Q247 -98 298 -98Q356 -98 388 -136Q420 -175 420 -244V-496H546V0H422V-65H404Q392 -40 359 -16Q326 8 259 8Z" fill="currentColor"/></g><g><path transform="translate(1523 0)" d="M224 14Q171 14 129 -4Q87 -23 62 -58Q38 -94 38 -145Q38 -196 62 -230Q87 -265 130 -282Q174 -300 230 -300H366V-328Q366 -363 344 -386Q322 -408 274 -408Q227 -408 204 -386Q181 -365 174 -331L58 -370Q70 -408 96 -440Q123 -471 168 -490Q212 -510 276 -510Q374 -510 431 -461Q488 -412 488 -319V-134Q488 -104 516 -104H556V0H472Q435 0 411 -18Q387 -36 387 -66V-67H368Q364 -55 350 -36Q336 -16 306 -1Q276 14 224 14ZM246 -88Q299 -88 332 -118Q366 -147 366 -196V-206H239Q204 -206 184 -191Q164 -176 164 -149Q164 -122 185 -105Q206 -88 246 -88Z" fill="currentColor"/></g><g><path transform="translate(2066 0)" d="M70 0V-496H194V-431H212Q224 -457 257 -480Q290 -504 357 -504Q415 -504 458 -478Q502 -451 526 -404Q550 -358 550 -296V0H424V-286Q424 -342 396 -370Q369 -398 318 -398Q260 -398 228 -360Q196 -321 196 -252V0Z" fill="currentColor"/></g><g><path transform="translate(2647 0)" d="M260 0Q211 0 180 -30Q150 -61 150 -112V-392H26V-496H150V-650H276V-496H412V-392H276V-134Q276 -104 304 -104H400V0Z" fill="currentColor"/></g><g><path transform="translate(3068 0)" d="M259 8Q201 8 158 -18Q114 -45 90 -92Q66 -139 66 -200V-496H192V-210Q192 -154 220 -126Q247 -98 298 -98Q356 -98 388 -136Q420 -175 420 -244V-496H546V0H422V-65H404Q392 -40 359 -16Q326 8 259 8Z" fill="currentColor"/></g><g><path transform="translate(3649 0)" d="M70 0V-496H194V-442H212Q225 -467 255 -486Q285 -504 334 -504Q387 -504 419 -484Q451 -463 468 -430H486Q503 -462 534 -483Q565 -504 622 -504Q668 -504 706 -484Q743 -465 766 -426Q788 -386 788 -326V0H662V-317Q662 -358 641 -378Q620 -399 582 -399Q539 -399 516 -372Q492 -344 492 -293V0H366V-317Q366 -358 345 -378Q324 -399 286 -399Q243 -399 220 -372Q196 -344 196 -293V0Z" fill="currentColor"/></g><g><path transform="translate(4468 0)" d="M150 14Q109 14 82 -13Q54 -39 54 -81Q54 -123 82 -150Q109 -176 150 -176Q190 -176 217 -149Q244 -123 244 -81Q244 -39 217 -12Q190 14 150 14Z" fill="#5eb3d6"/></g><g><path transform="translate(4731 0)" d="M224 14Q171 14 129 -4Q87 -23 62 -58Q38 -94 38 -145Q38 -196 62 -230Q87 -265 130 -282Q174 -300 230 -300H366V-328Q366 -363 344 -386Q322 -408 274 -408Q227 -408 204 -386Q181 -365 174 -331L58 -370Q70 -408 96 -440Q123 -471 168 -490Q212 -510 276 -510Q374 -510 431 -461Q488 -412 488 -319V-134Q488 -104 516 -104H556V0H472Q435 0 411 -18Q387 -36 387 -66V-67H368Q364 -55 350 -36Q336 -16 306 -1Q276 14 224 14ZM246 -88Q299 -88 332 -118Q366 -147 366 -196V-206H239Q204 -206 184 -191Q164 -176 164 -149Q164 -122 185 -105Q206 -88 246 -88Z" fill="#5eb3d6"/></g><g><path transform="translate(5274 0)" d="M70 0V-496H196V0ZM133 -554Q99 -554 76 -576Q52 -598 52 -634Q52 -670 76 -692Q99 -714 133 -714Q168 -714 191 -692Q214 -670 214 -634Q214 -598 191 -576Q168 -554 133 -554Z" fill="#5eb3d6"/></g><g><path transform="translate(0 0)" d="M338 14Q206 14 128 -58Q50 -131 50 -266V-434Q50 -569 128 -642Q206 -714 338 -714Q470 -714 548 -642Q626 -569 626 -434V-266Q626 -131 548 -58Q470 14 338 14ZM338 -104Q412 -104 453 -147Q494 -190 494 -262V-438Q494 -510 453 -553Q412 -596 338 -596Q265 -596 224 -553Q182 -510 182 -438V-262Q182 -190 224 -147Q265 -104 338 -104ZM384 180Q335 180 304 150Q274 119 274 68V0H402V48Q402 78 430 78H489V180Z" fill="none" stroke="#c9a75c" stroke-width="55" stroke-linejoin="round"/></g></svg>
        </a>
    </div>
</footer>

@verbatim
<script type="module">
import * as THREE from 'three';
import { RoomEnvironment } from 'three/addons/environments/RoomEnvironment.js';
import { RoundedBoxGeometry } from 'three/addons/geometries/RoundedBoxGeometry.js';
import { EffectComposer } from 'three/addons/postprocessing/EffectComposer.js';
import { RenderPass } from 'three/addons/postprocessing/RenderPass.js';
import { UnrealBloomPass } from 'three/addons/postprocessing/UnrealBloomPass.js';
import { OutputPass } from 'three/addons/postprocessing/OutputPass.js';

const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
const D = Math.PI / 180;
const clamp01 = x => x < 0 ? 0 : x > 1 ? 1 : x;
const span = (t, a, d) => clamp01((t - a) / d);
const eOut = t => 1 - Math.pow(1 - t, 3);
const eInOut = t => t < .5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
const eBack = t => { const c1 = 1.70158, c3 = c1 + 1; return 1 + c3 * Math.pow(t - 1, 3) + c1 * Math.pow(t - 1, 2); };
const bump = (t, d) => (t >= 0 && t <= d) ? Math.sin(Math.PI * eInOut(t / d)) : 0;
function rng(seed) { let s = seed; return () => { s = (s * 16807) % 2147483647; return (s - 1) / 2147483646; }; }
const inP = (x, y) => (x >= -0.78 && x <= -0.36 && y >= -1.2 && y <= 1.12) || (x >= -0.4 && (() => { const d = Math.hypot(x - 0.14, y - 0.44); return d >= 0.3 && d <= 0.68; })());

/* Per-concept, per-mode looks. */
const THEMES = {
  lattice: {
    dark:  { dark: true, bg: '#060A14', front: '#9CCBFF', back: '#5F8FD6', edge: '#86A8DA', edgeEm: '#1E3E78', thin: '#4D6A96', thinEm: '#14294F', pkt: '#4FD1FF', pktMul: 2.6, flash: '#FFFFFF', flashMul: 3, amb: '#8fb3ff', bloom: [.6, .45, .35] },
    light: { dark: false, bg: '#EEF2F8', front: '#14306E', back: '#6F8FC4', edge: '#2A4E95', edgeEm: '#000000', thin: '#9DB2D6', thinEm: '#000000', pkt: '#0E9BD6', pktMul: 1, flash: '#0E9BD6', flashMul: 1, amb: '#ffffff', bloom: null },
  },
  swarm: {
    dark:  { bg: '#0D0B12', warm: '#FFE8D2', hot: '#FF6A3D', additive: true, bloom: [.38, .4, .55] },
    light: { bg: '#F1ECE4', warm: '#2A2420', hot: '#E2552B', additive: false, bloom: null },
  },
  fold: {
    dark:  { bg: '#0F1320', a: '#3A62F0', b: '#DCE5F5', start: '#FF5B3A', shadow: .45, sky: '#c8d4ff', ground: '#0F1320', bloom: null },
    light: { bg: '#ECEFF4', a: '#2B4BD6', b: '#8FB0FF', start: '#FF5B3A', shadow: .2, sky: '#ffffff', ground: '#b9c2d3', bloom: null },
  },
  flip: {
    dark:  { bg: '#1E2126', panel: '#111317', on: '#FFC93C', onEm: '#3a2600', off: '#2A2D33', edge: '#A2A8B0', bloom: null },
    light: { bg: '#E3E5E9', panel: '#C4C8CF', on: '#16181D', onEm: '#000000', off: '#F1F2F4', edge: '#8A9099', bloom: null },
  },
  fibre: {
    dark:  { dark: true, bg: '#05070B', palette: ['#38D6FF', '#38D6FF', '#7FE6FF', '#BFEFFF', '#8C7BFF'], glow: '#BFEFFF', tip: '#BFEFFF', tipMul: 2.2, metal: '#6B737E', cap: '#9FEAFF', bloom: [.6, .28, .22] },
    light: { dark: false, bg: '#EDF1F6', palette: ['#0B5CAD', '#0B5CAD', '#0E7FC4', '#1B3F8F', '#5B4BD6'], glow: '#38D6FF', tip: '#0E9BD6', tipMul: 1, metal: '#9AA3AE', cap: '#38D6FF', bloom: null },
  },
};

function envMap(renderer) {
  const pmrem = new THREE.PMREMGenerator(renderer);
  const tex = pmrem.fromScene(new RoomEnvironment(renderer), 0.04).texture;
  pmrem.dispose();
  return tex;
}
function shadowStudio(s, groundY, opacity) {
  const r = s.renderer;
  r.shadowMap.enabled = true; r.shadowMap.type = THREE.PCFSoftShadowMap;
  const key = new THREE.DirectionalLight('#ffffff', 2.5); key.position.set(2.5, 5.5, 3.5); key.castShadow = true;
  key.shadow.mapSize.set(1024, 1024); Object.assign(key.shadow.camera, { left: -4, right: 4, top: 4, bottom: -4, near: 1, far: 16 }); key.shadow.radius = 6;
  s.scene.add(key);
  const ground = new THREE.Mesh(new THREE.PlaneGeometry(40, 40), new THREE.ShadowMaterial({ opacity }));
  ground.rotation.x = -Math.PI / 2; ground.position.y = groundY; ground.receiveShadow = true; s.scene.add(ground);
}

function mount(stage, build, th) {
  const hit = stage.querySelector('.hit');
  const canvas = hit.querySelector('canvas');
  let renderer;
  try { renderer = new THREE.WebGLRenderer({ canvas, antialias: true, powerPreference: 'high-performance' }); }
  catch (e) { stage.classList.add('no-webgl'); return; }
  renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
  renderer.outputColorSpace = THREE.SRGBColorSpace;
  renderer.toneMapping = THREE.ACESFilmicToneMapping;
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(32, 1, 0.1, 100);
  const s = { renderer, scene, camera, t: 0, dt: 0, start: null, hover: 0, hoverT: 0, px: 0, py: 0, sx: 0, sy: 0, clickAt: -99, ct: -1, visible: false };
  const api = build(s, th);
  const comp = new EffectComposer(renderer);
  comp.addPass(new RenderPass(scene, camera));
  if (th.bloom) comp.addPass(new UnrealBloomPass(new THREE.Vector2(256, 256), ...th.bloom));
  comp.addPass(new OutputPass());
  const size = () => {
    const r = hit.getBoundingClientRect();
    const w = Math.max(1, Math.round(r.width)), h = Math.max(1, Math.round(r.height));
    renderer.setSize(w, h, false);
    camera.aspect = w / h; camera.updateProjectionMatrix();
    comp.setPixelRatio(renderer.getPixelRatio()); comp.setSize(w, h);
  };
  new ResizeObserver(size).observe(hit); size();
  hit.addEventListener('pointermove', e => {
    const r = hit.getBoundingClientRect();
    s.px = ((e.clientX - r.left) / r.width) * 2 - 1;
    s.py = -(((e.clientY - r.top) / r.height) * 2 - 1);
    s.hoverT = 1;
  });
  hit.addEventListener('pointerleave', () => { s.hoverT = 0; s.px = 0; s.py = 0; });
  hit.addEventListener('focus', () => { s.hoverT = 1; });
  hit.addEventListener('blur', () => { s.hoverT = 0; });
  hit.addEventListener('click', () => { s.clickAt = s.t; });
  stage.querySelector('.replay').addEventListener('click', () => { s.start = performance.now(); s.clickAt = -99; });
  new IntersectionObserver(([e]) => {
    s.visible = e.isIntersecting;
    if (s.visible && s.start === null) s.start = performance.now();
  }, { threshold: 0.2 }).observe(stage);
  let last = performance.now();
  const frame = now => {
    requestAnimationFrame(frame);
    const dt = Math.min(0.05, (now - last) / 1000); last = now;
    if (!s.visible) return;
    s.t = reduce ? 14 : (now - (s.start ?? now)) / 1000;
    s.dt = reduce ? 0 : dt;
    s.hover += (s.hoverT - s.hover) * Math.min(1, dt * 6);
    s.sx += (s.px - s.sx) * Math.min(1, dt * 5);
    s.sy += (s.py - s.sy) * Math.min(1, dt * 5);
    s.ct = reduce ? -1 : s.t - s.clickAt;
    api.update(s);
    comp.render();
  };
  requestAnimationFrame(frame);
}

/* ---------- 01 Lattice ---------- */
function lattice(s, th) {
  const { scene, camera } = s;
  s.renderer.setClearColor(th.bg, 1);
  camera.position.set(0, 0.1, 8.2); camera.lookAt(0, -0.5, 0);
  const root = new THREE.Group(); scene.add(root);
  scene.add(new THREE.AmbientLight(th.amb, th.dark ? .7 : 1.1));
  const key = new THREE.DirectionalLight('#ffffff', 2.4); key.position.set(3, 4, 6); scene.add(key);
  if (th.dark) { const glow = new THREE.PointLight(th.pkt, 22, 0, 2); glow.position.set(1.4, 0.8, 2.2); scene.add(glow); }

  const P2 = [[-.6,-1.15],[-.6,-.62],[-.6,-.1],[-.6,.45],[-.6,1],[-.2,1],[.2,1],[.589,.839],[.75,.45],[.589,.061],[.2,-.1],[-.2,-.1]];
  const chain = [[0,1],[1,2],[2,3],[3,4],[4,5],[5,6],[6,7],[7,8],[8,9],[9,10],[10,11],[11,2]];
  const n = P2.length, Z = 0.34, SC = 1.18, OX = -0.08;
  const nodes = [];
  [[0, Z], [1, -Z]].forEach(([layer, z]) => P2.forEach(([x, y], k) => nodes.push({ p: new THREE.Vector3((x + OX) * SC, y * SC, z), k, layer })));
  const edges = [];
  chain.forEach(([a, b], j) => { edges.push({ a, b, t0: .25 + j * .09, kind: 0 }); edges.push({ a: a + n, b: b + n, t0: .32 + j * .09, kind: 0 }); });
  for (let i = 0; i < n; i++) edges.push({ a: i, b: i + n, t0: 1.25 + i * .04, kind: 1 });
  chain.forEach(([a, b], j) => edges.push({ a, b: b + n, t0: 1.45 + j * .04, kind: 1 }));
  const up = new THREE.Vector3(0, 1, 0);
  edges.forEach(e => {
    const A = nodes[e.a].p, B = nodes[e.b].p, d = new THREE.Vector3().subVectors(B, A);
    e.len = d.length(); e.dir = d.normalize(); e.q = new THREE.Quaternion().setFromUnitVectors(up, e.dir); e.A = A;
  });
  const nodeMesh = new THREE.InstancedMesh(new THREE.SphereGeometry(.072, 24, 16), new THREE.MeshBasicMaterial({ color: '#ffffff' }), nodes.length);
  const thickN = edges.filter(e => !e.kind).length;
  const thick = new THREE.InstancedMesh(new THREE.CylinderGeometry(.022, .022, 1, 12), new THREE.MeshStandardMaterial({ color: th.edge, emissive: th.edgeEm, emissiveIntensity: 1, metalness: .55, roughness: .3 }), thickN);
  const thin = new THREE.InstancedMesh(new THREE.CylinderGeometry(.009, .009, 1, 8), new THREE.MeshStandardMaterial({ color: th.thin, emissive: th.thinEm, emissiveIntensity: 1, metalness: .5, roughness: .45 }), edges.length - thickN);
  root.add(thick, thin, nodeMesh);
  const loopIdx = [2,3,4,5,6,7,8,9,10,11,2];
  const mkLoop = (offset, reverse) => {
    const pts = loopIdx.map(i => nodes[i + offset].p); if (reverse) pts.reverse();
    const cum = [0]; for (let i = 1; i < pts.length; i++) cum.push(cum[i - 1] + pts[i].distanceTo(pts[i - 1]));
    return { pts, cum, L: cum[cum.length - 1] };
  };
  const at = (loop, f, out) => {
    const d = f * loop.L; let i = 1; while (i < loop.cum.length - 1 && loop.cum[i] < d) i++;
    const u = (d - loop.cum[i - 1]) / (loop.cum[i] - loop.cum[i - 1] || 1);
    return out.lerpVectors(loop.pts[i - 1], loop.pts[i], u);
  };
  const front = mkLoop(0, false), back = mkLoop(n, true);
  const pktMat = new THREE.MeshBasicMaterial({ color: new THREE.Color(th.pkt).multiplyScalar(th.pktMul) });
  const packets = [[front, 0], [front, .34], [front, .67], [back, .17], [back, .6]].map(([loop, off]) => {
    const m = new THREE.Mesh(new THREE.SphereGeometry(.05, 16, 12), pktMat); root.add(m); return { loop, off, m };
  });
  const m4 = new THREE.Matrix4(), q0 = new THREE.Quaternion(), sc = new THREE.Vector3(), mid = new THREE.Vector3(), col = new THREE.Color();
  const base = nodes[0].p, cFront = new THREE.Color(th.front), cBack = new THREE.Color(th.back), cFlash = new THREE.Color(th.flash).multiplyScalar(th.flashMul);
  return {
    update(s) {
      const t = s.t, ct = s.ct;
      const intro = eOut(span(t, 0, 2.4));
      const spin = ct >= 0 && ct < 1.4 ? eInOut(span(ct, 0, 1.4)) * Math.PI * 2 : 0;
      root.rotation.y = (1 - intro) * -1.5 + Math.sin(t * .35) * .4 * intro + s.sx * .6 * s.hover + spin;
      root.rotation.x = .1 - s.sy * .35 * s.hover;
      const wave = ct >= 0 && ct < 2 ? ct * 3.4 : -9, fade = 1 - span(ct, 1.2, .8);
      nodes.forEach((nd, i) => {
        const pop = eBack(span(t, .1 + nd.k * .09 + nd.layer * .06, .4));
        const fl = wave > -1 ? Math.exp(-Math.pow(nd.p.distanceTo(base) - wave, 2) / .06) * fade : 0;
        const pulse = 1 + .08 * Math.sin(t * 2.2 + i * .7) * intro;
        const k = Math.max(.0001, pop * (pulse + fl * .8 + s.hover * .15));
        m4.compose(nd.p, q0, sc.set(k, k, k)); nodeMesh.setMatrixAt(i, m4);
        col.copy(nd.layer ? cBack : cFront);
        if (th.dark) col.multiplyScalar(1 + s.hover * .5);
        col.lerp(cFlash, Math.min(1, fl)); nodeMesh.setColorAt(i, col);
      });
      nodeMesh.instanceMatrix.needsUpdate = true; nodeMesh.instanceColor.needsUpdate = true;
      let ti = 0, hi = 0;
      for (const e of edges) {
        const g = Math.max(.0001, eOut(span(t, e.t0, e.kind ? .35 : .28)));
        mid.copy(e.A).addScaledVector(e.dir, e.len * g / 2);
        m4.compose(mid, e.q, sc.set(1, e.len * g, 1));
        if (e.kind) thin.setMatrixAt(hi++, m4); else thick.setMatrixAt(ti++, m4);
      }
      thick.instanceMatrix.needsUpdate = true; thin.instanceMatrix.needsUpdate = true;
      const on = span(t, 2.3, .6);
      packets.forEach(p => {
        at(p.loop, ((t * .15 + p.off) % 1 + 1) % 1, p.m.position);
        p.m.scale.setScalar(Math.max(.0001, on * (1 + .35 * s.hover)));
      });
    }
  };
}

/* ---------- 02 Swarm ---------- */
function swarm(s, th) {
  const { scene, camera } = s;
  s.renderer.setClearColor(th.bg, 1);
  camera.position.set(0, 0.05, 8); camera.lookAt(0, -0.5, 0);
  const root = new THREE.Group(); scene.add(root);
  const R = rng(17), N = 1200;
  const tgt = new Float32Array(N * 3), start = new Float32Array(N * 3), dir = new Float32Array(N * 3), meta = [];
  let c = 0;
  while (c < N) {
    const x = -0.8 + R() * 1.65, y = -1.22 + R() * 2.36;
    if (!inP(x, y)) continue;
    tgt[c * 3] = (x - 0.03) * 1.15; tgt[c * 3 + 1] = y * 1.15; tgt[c * 3 + 2] = (R() - .5) * .56;
    const a = R() * Math.PI * 2, r = 2.6 + R() * 2.6;
    start[c * 3] = Math.cos(a) * r; start[c * 3 + 1] = (R() - .5) * 4.4; start[c * 3 + 2] = Math.sin(a) * r * .9;
    const u = R() * 2 - 1, tt = R() * Math.PI * 2, sq = Math.sqrt(1 - u * u);
    dir[c * 3] = sq * Math.cos(tt); dir[c * 3 + 1] = u; dir[c * 3 + 2] = sq * Math.sin(tt);
    meta.push({ delay: R() * .9, f: .6 + R() * 1.4, ph: R() * 6.28, amp: .012 + R() * .022, push: .6 + R() * .8 });
    c++;
  }
  const pos = new Float32Array(N * 3), colr = new Float32Array(N * 3), size = new Float32Array(N);
  const warm = new THREE.Color(th.warm), hot = new THREE.Color(th.hot);
  for (let i = 0; i < N; i++) {
    const accent = R() < .12;
    const cc = accent ? hot.clone().multiplyScalar(th.additive ? 1.6 : 1) : warm.clone().multiplyScalar(th.additive ? .9 + R() * .3 : 1);
    colr[i * 3] = cc.r; colr[i * 3 + 1] = cc.g; colr[i * 3 + 2] = cc.b;
    size[i] = accent ? 1.6 + R() * .9 : 1 + R() * 1.2;
  }
  const geo = new THREE.BufferGeometry();
  geo.setAttribute('position', new THREE.BufferAttribute(pos, 3).setUsage(THREE.DynamicDrawUsage));
  geo.setAttribute('aColor', new THREE.BufferAttribute(colr, 3));
  geo.setAttribute('aSize', new THREE.BufferAttribute(size, 1));
  const mat = new THREE.ShaderMaterial({
    uniforms: { uPR: { value: s.renderer.getPixelRatio() } },
    vertexShader: `attribute vec3 aColor; attribute float aSize; uniform float uPR; varying vec3 vC;
      void main(){ vC = aColor; vec4 mv = modelViewMatrix * vec4(position, 1.0); gl_PointSize = aSize * uPR * (30.0 / -mv.z); gl_Position = projectionMatrix * mv; }`,
    fragmentShader: th.additive
      ? `varying vec3 vC; void main(){ float d = length(gl_PointCoord - .5); float a = smoothstep(.5, .06, d); if (a < .01) discard; gl_FragColor = vec4(vC * a, a); }`
      : `varying vec3 vC; void main(){ float d = length(gl_PointCoord - .5); float a = smoothstep(.5, .32, d); if (a < .01) discard; gl_FragColor = vec4(vC, a * .92); }`,
    transparent: true, depthWrite: false, blending: th.additive ? THREE.AdditiveBlending : THREE.NormalBlending
  });
  const pts = new THREE.Points(geo, mat); pts.frustumCulled = false; root.add(pts);
  const ray = new THREE.Raycaster(), plane = new THREE.Plane(new THREE.Vector3(0, 0, 1), 0), hitW = new THREE.Vector3(), hitL = new THREE.Vector3(), ndc = new THREE.Vector2();
  return {
    update(s) {
      const t = s.t, ct = s.ct;
      const intro = eOut(span(t, 0, 2.6));
      const spin = ct >= 0 && ct < 1.6 ? eInOut(span(ct, 0, 1.6)) * Math.PI * 2 : 0;
      root.rotation.y = (1 - intro) * .9 + Math.sin(t * .28) * .55 * intro + s.sx * .5 * s.hover + spin;
      root.rotation.x = .06 - s.sy * .25 * s.hover;
      root.updateMatrixWorld();
      let repel = false;
      if (s.hover > .02) {
        ndc.set(s.sx, s.sy); ray.setFromCamera(ndc, camera);
        if (ray.ray.intersectPlane(plane, hitW)) { hitL.copy(hitW); root.worldToLocal(hitL); repel = true; }
      }
      const ex = ct >= 0 ? bump(ct, 1.6) * 1.5 : 0;
      for (let i = 0; i < N; i++) {
        const m = meta[i], j = i * 3;
        const p = eInOut(span(t, .1 + m.delay, 2.0));
        const a = (1 - p) * 3.4, cs = Math.cos(a), sn = Math.sin(a);
        const sx0 = start[j] * cs - start[j + 2] * sn, sz0 = start[j] * sn + start[j + 2] * cs;
        let x = sx0 + (tgt[j] - sx0) * p, y = start[j + 1] + (tgt[j + 1] - start[j + 1]) * p, z = sz0 + (tgt[j + 2] - sz0) * p;
        const w = t * m.f + m.ph;
        x += Math.sin(w) * m.amp * p; y += Math.cos(w * 1.3) * m.amp * p; z += Math.sin(w * .7) * m.amp * p;
        if (ex) { x += dir[j] * ex * m.push; y += dir[j + 1] * ex * m.push; z += dir[j + 2] * ex * m.push; }
        if (repel) {
          const dx = x - hitL.x, dy = y - hitL.y, dz = z - hitL.z, d = Math.hypot(dx, dy, dz);
          if (d < .55 && d > 1e-4) { const k = (.55 - d) / .55 * .5 * s.hover / d; x += dx * k; y += dy * k; z += dz * k; }
        }
        pos[j] = x; pos[j + 1] = y; pos[j + 2] = z;
      }
      geo.attributes.position.needsUpdate = true;
    }
  };
}

/* ---------- 03 Fold: lacquered blocks that solve themselves into a P ---------- */
function fold(s, th) {
  const { scene, camera, renderer } = s;
  renderer.setClearColor(th.bg, 1);
  scene.environment = envMap(renderer);
  camera.position.set(0, .5, 9.6); camera.lookAt(0, -.55, 0);
  scene.add(new THREE.HemisphereLight(th.sky, th.ground, .6));
  shadowStudio(s, -1.85, th.shadow);
  const U = .34, N = 14;
  const X = new THREE.Vector3(1, 0, 0), Y = new THREE.Vector3(0, 1, 0), Z = new THREE.Vector3(0, 0, 1);
  const rq = (axis, deg) => new THREE.Quaternion().setFromAxisAngle(axis, deg * D);
  const I = new THREE.Quaternion();
  const finalQ = [rq(Z, 90)];
  for (let i = 1; i < N; i++) finalQ.push((i === 6 || i === 9 || i === 11) ? rq(Z, -90) : I.clone());
  const opts = [I, rq(Z, 90), rq(Z, -90), rq(Y, 90), rq(Y, -90), I];
  const valid = qs => {
    const f = qs[0].clone(), p = new THREE.Vector3(), seen = new Set(['0,0,0']);
    for (let i = 1; i < N; i++) {
      p.add(X.clone().applyQuaternion(f));
      const k = [p.x, p.y, p.z].map(v => Math.round(v)).join(',');
      if (seen.has(k) || Math.abs(p.x) > 4 || Math.abs(p.y) > 4 || Math.abs(p.z) > 3) return false;
      seen.add(k); f.multiply(qs[i]);
    }
    return true;
  };
  const scramble = R => {
    for (let n = 0; n < 600; n++) {
      const qs = [finalQ[0]];
      for (let i = 1; i < N; i++) qs.push(opts[Math.floor(R() * opts.length)]);
      if (valid(qs)) return qs;
    }
    return finalQ.slice();
  };
  const R = rng(29), intro = scramble(R);
  let clickId = null, clickScr = intro;
  const root = new THREE.Group(); scene.add(root);
  const holder = new THREE.Group(); holder.position.set(-1.5 * U, -3 * U - .1, 0); root.add(holder);
  const geo = new RoundedBoxGeometry(U * .94, U * .94, U * .94, 4, U * .14);
  const lacquer = c => new THREE.MeshPhysicalMaterial({ color: c, roughness: .32, metalness: 0, clearcoat: .8, clearcoatRoughness: .15, envMapIntensity: .8 });
  const ma = lacquer(th.a), mb = lacquer(th.b), mStart = lacquer(th.start);
  const nodes = [];
  let parent = holder;
  for (let i = 0; i < N; i++) {
    const n = new THREE.Group();
    if (i > 0) n.position.set(U, 0, 0);
    const m = new THREE.Mesh(geo, i === 0 ? mStart : (i % 2 ? ma : mb));
    m.castShadow = true; n.add(m); parent.add(n); nodes.push(n); parent = n;
  }
  return {
    update(s) {
      const t = s.t, ct = s.ct;
      const settle = eOut(span(t, 0, 3));
      root.rotation.y = -.4 + (1 - settle) * .9 + Math.sin(t * .4) * .22 * settle + s.sx * .5 * s.hover;
      root.rotation.x = .12 - s.sy * .3 * s.hover;
      if (ct >= 0 && ct < 2.6) {
        if (clickId !== s.clickAt) { clickId = s.clickAt; clickScr = scramble(R); }
        for (let i = 0; i < N; i++) {
          if (ct < .55) nodes[i].quaternion.slerpQuaternions(finalQ[i], clickScr[i], eInOut(ct / .55));
          else nodes[i].quaternion.slerpQuaternions(clickScr[i], finalQ[i], eInOut(span(ct, .65 + i * .09, .32)));
        }
      } else {
        for (let i = 0; i < N; i++) nodes[i].quaternion.slerpQuaternions(intro[i], finalQ[i], eInOut(span(t, .5 + i * .12, .4)));
      }
    }
  };
}

/* ---------- 04 Flip wall: Game of Life settling into a P ---------- */
function flipwall(s, th) {
  const { scene, camera, renderer } = s;
  renderer.setClearColor(th.bg, 1);
  scene.environment = envMap(renderer);
  camera.position.set(1.9, .5, 8.2); camera.lookAt(0, -.5, 0);
  scene.add(new THREE.HemisphereLight('#dfe6f0', '#20242a', .5));
  const key = new THREE.DirectionalLight('#ffffff', 2); key.position.set(-2.5, 4, 5); scene.add(key);
  const C = 9, Rw = 11, T = .21, G = .035, step = T + G;
  const bitmap = [".........", ".######..", ".#######.", ".##...##.", ".##...##.", ".#######.", ".######..", ".##......", ".##......", ".##......", "........."];
  const target = new Uint8Array(C * Rw);
  for (let r = 0; r < Rw; r++) for (let c = 0; c < C; c++) target[r * C + c] = bitmap[r][c] === '#' ? 1 : 0;
  const R = rng(41);
  const life = g => {
    const n = new Uint8Array(C * Rw);
    for (let r = 0; r < Rw; r++) for (let c = 0; c < C; c++) {
      let k = 0;
      for (let dr = -1; dr <= 1; dr++) for (let dc = -1; dc <= 1; dc++) if (dr || dc) k += g[((r + dr + Rw) % Rw) * C + (c + dc + C) % C];
      const on = g[r * C + c];
      n[r * C + c] = (on && (k === 2 || k === 3)) || (!on && k === 3) ? 1 : 0;
    }
    return n;
  };
  const frames = [];
  let g = new Uint8Array(C * Rw).map(() => R() < .4 ? 1 : 0);
  for (let k = 0; k < 6; k++) { frames.push(g); g = life(g); }
  frames.push(target);
  const F0 = .25, FD = .34;
  const root = new THREE.Group(); scene.add(root);
  const panel = new THREE.Mesh(new RoundedBoxGeometry(C * step + .14, Rw * step + .14, .08, 3, .03), new THREE.MeshStandardMaterial({ color: th.panel, roughness: .45, metalness: .6 }));
  panel.position.z = -.09; root.add(panel);
  const onM = new THREE.MeshStandardMaterial({ color: th.on, roughness: .32, metalness: .15, emissive: th.onEm, emissiveIntensity: .4 });
  const offM = new THREE.MeshStandardMaterial({ color: th.off, roughness: .55, metalness: .35 });
  const edgeM = new THREE.MeshStandardMaterial({ color: th.edge, roughness: .28, metalness: .95 });
  const tiles = new THREE.InstancedMesh(new THREE.BoxGeometry(T, T, .028), [edgeM, edgeM, edgeM, edgeM, onM, offM], C * Rw);
  root.add(tiles);
  const pos = [];
  for (let r = 0; r < Rw; r++) for (let c = 0; c < C; c++) pos.push({ x: (c - (C - 1) / 2) * step, y: ((Rw - 1) / 2 - r) * step, r, c });
  const m4 = new THREE.Matrix4(), q = new THREE.Quaternion(), e = new THREE.Euler(), v = new THREE.Vector3(), one = new THREE.Vector3(1, 1, 1);
  const ray = new THREE.Raycaster(), plane = new THREE.Plane(new THREE.Vector3(0, 0, 1), 0), hitW = new THREE.Vector3(), hitL = new THREE.Vector3(), ndc = new THREE.Vector2();
  const ang = on => on ? 0 : Math.PI;
  return {
    update(s) {
      const t = s.t, ct = s.ct;
      root.rotation.y = -.18 + Math.sin(t * .3) * .1 + s.sx * .18 * s.hover;
      root.rotation.x = .04 - s.sy * .1 * s.hover;
      root.updateMatrixWorld();
      let lean = false;
      if (s.hover > .02) {
        ndc.set(s.sx, s.sy); ray.setFromCamera(ndc, camera);
        if (ray.ray.intersectPlane(plane, hitW)) { hitL.copy(hitW); root.worldToLocal(hitL); lean = true; }
      }
      const k = Math.floor((t - F0) / FD);
      const wavePhase = ((t - 3.2) % 5 + 5) % 5 * 3.4 - 1;
      pos.forEach((p, i) => {
        let a;
        if (k < 0) a = Math.PI;
        else {
          const fk = Math.min(k, frames.length - 1);
          const prev = fk === 0 ? 0 : frames[fk - 1][i], cur = frames[fk][i];
          const pr = k >= frames.length ? 1 : eInOut(clamp01((t - (F0 + fk * FD) - p.c * .014) / .26));
          a = ang(prev) + (ang(cur) - ang(prev)) * pr;
        }
        const diag = (p.c + (Rw - 1 - p.r)) * .25;
        let rx = t > 3.2 ? .16 * Math.exp(-Math.pow(diag - wavePhase, 2) * 2) : 0, ry = 0;
        if (lean) {
          const dx = hitL.x - p.x, dy = hitL.y - p.y, d = Math.hypot(dx, dy);
          if (d < .9) { const w = (1 - d / .9) * s.hover; ry += dx * 1.1 * w; rx -= dy * 1.1 * w; }
        }
        const spin = ct >= 0 ? eInOut(span(ct, Math.hypot(p.x, p.y) * .45, .55)) * Math.PI * 2 : 0;
        e.set(rx, a + ry + spin, 0);
        m4.compose(v.set(p.x, p.y, 0), q.setFromEuler(e), one);
        tiles.setMatrixAt(i, m4);
      });
      tiles.instanceMatrix.needsUpdate = true;
    }
  };
}

/* ---------- 05 Fibre: a braided bundle from a connector, looping into a P ---------- */
function fibre(s, th) {
  const { scene, camera, renderer } = s;
  renderer.setClearColor(th.bg, 1);
  scene.environment = envMap(renderer);
  camera.position.set(0, .05, 8.4); camera.lookAt(0, -.5, 0);
  scene.add(new THREE.AmbientLight('#ffffff', th.dark ? .2 : .8));
  const key = new THREE.DirectionalLight('#ffffff', 2); key.position.set(2.5, 3, 5); scene.add(key);
  const root = new THREE.Group(); scene.add(root);

  // Centre line: up the stem, round the bowl, back towards the stem.
  const cl = [];
  for (let y = -1.12; y <= .75; y += .05) cl.push([-.6, y]);
  for (let a = 170; a >= 90; a -= 10) cl.push([-.35 + .25 * Math.cos(a * D), .75 + .25 * Math.sin(a * D)]);
  for (let x = -.3; x <= .1; x += .05) cl.push([x, 1]);
  for (let a = 84; a >= -90; a -= 6) cl.push([.15 + .55 * Math.cos(a * D), .45 + .55 * Math.sin(a * D)]);
  for (let x = .1; x >= -.44; x -= .05) cl.push([x, -.1]);
  const nrm = cl.map((p, i) => {
    const a = cl[Math.max(0, i - 1)], b = cl[Math.min(cl.length - 1, i + 1)];
    const dx = b[0] - a[0], dy = b[1] - a[1], m = Math.hypot(dx, dy) || 1;
    return [-dy / m, dx / m];
  });
  const cum = [0];
  for (let i = 1; i < cl.length; i++) cum.push(cum[i - 1] + Math.hypot(cl[i][0] - cl[i - 1][0], cl[i][1] - cl[i - 1][1]));
  const L = cum[cum.length - 1];

  const R = rng(53), F = 30, twist = 6 * Math.PI * 2;
  const fibres = [];
  for (let f = 0; f < F; f++) {
    const a0 = f / F * Math.PI * 2 + R() * .2, rr = .03 + Math.sqrt(R()) * .075;
    const pts = cl.map(([x, y], i) => {
      const u = cum[i] / L;
      const fan = u > .88 ? 1 + Math.pow((u - .88) / .12, 2) * 3.4 : 1;
      const a = a0 + u * twist;
      return new THREE.Vector3(x + nrm[i][0] * Math.cos(a) * rr * fan, y + nrm[i][1] * Math.cos(a) * rr * fan, Math.sin(a) * rr * fan);
    });
    const curve = new THREE.CatmullRomCurve3(pts);
    const mat = new THREE.ShaderMaterial({
      uniforms: { uT: { value: 0 }, uReveal: { value: 0 }, uPhase: { value: R() }, uBurst: { value: -1 }, uColor: { value: new THREE.Color(th.palette[Math.floor(R() * th.palette.length)]) }, uGlow: { value: new THREE.Color(th.glow) }, uDark: { value: th.dark ? 1 : 0 } },
      vertexShader: `varying float vX; void main(){ vX = uv.x; gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0); }`,
      fragmentShader: `uniform float uT, uReveal, uPhase, uBurst, uDark; uniform vec3 uColor, uGlow; varying float vX;
        void main(){
          if (vX > uReveal) discard;
          float p = fract(vX * 2.6 - uT + uPhase);
          float pulse = exp(-pow((p - .5) * 16.0, 2.0));
          float lead = uReveal < .999 ? exp(-pow((vX - uReveal) * 60.0, 2.0)) : 0.0;
          float burst = uBurst >= 0.0 ? exp(-pow((vX - uBurst) * 22.0, 2.0)) : 0.0;
          vec3 c = uDark > .5 ? uColor * (.14 + pulse * 1.4 + lead * 2.5 + burst * 3.5) : mix(uColor, uGlow, clamp(pulse * .9 + lead + burst, 0.0, 1.0));
          gl_FragColor = vec4(c, 1.0);
        }`,
      transparent: th.dark, depthWrite: !th.dark, blending: th.dark ? THREE.AdditiveBlending : THREE.NormalBlending
    });
    root.add(new THREE.Mesh(new THREE.TubeGeometry(curve, 300, .0105, 6, false), mat));
    fibres.push({ mat, end: curve.getPoint(1), delay: R() * .45 });
  }
  const tips = new THREE.InstancedMesh(new THREE.SphereGeometry(.02, 12, 8), new THREE.MeshBasicMaterial({ color: new THREE.Color(th.tip).multiplyScalar(th.tipMul) }), F);
  root.add(tips);

  // The connector the bundle runs out of: a metal ferrule with a tapered boot.
  const metal = new THREE.MeshPhysicalMaterial({ color: th.metal, metalness: 1, roughness: .28, clearcoat: .4 });
  const plug = new THREE.Group(); plug.position.set(-.6, -1.15, 0); root.add(plug);
  const body = new THREE.Mesh(new THREE.CylinderGeometry(.15, .15, .42, 48), metal); body.position.y = -.21; plug.add(body);
  const boot = new THREE.Mesh(new THREE.CylinderGeometry(.118, .15, .17, 48), metal); boot.position.y = .085; plug.add(boot);
  const grip = new THREE.InstancedMesh(new THREE.TorusGeometry(.152, .012, 8, 48), metal, 4);
  const m4 = new THREE.Matrix4(), q = new THREE.Quaternion().setFromAxisAngle(new THREE.Vector3(1, 0, 0), Math.PI / 2), sc = new THREE.Vector3(), v = new THREE.Vector3();
  for (let i = 0; i < 4; i++) { m4.compose(v.set(0, -.3 + i * .05, 0), q, sc.set(1, 1, 1)); grip.setMatrixAt(i, m4); }
  plug.add(grip);
  const cap = new THREE.Mesh(new THREE.CircleGeometry(.12, 40), new THREE.MeshBasicMaterial({ color: new THREE.Color(th.cap).multiplyScalar(th.dark ? 2 : 1) }));
  cap.rotation.x = Math.PI / 2; cap.position.y = -.425; plug.add(cap);
  const q0 = new THREE.Quaternion();
  let flow = 0;
  return {
    update(s) {
      const t = s.t, ct = s.ct;
      flow += s.dt * (.32 + s.hover * .9);
      const intro = eOut(span(t, 0, 2.4));
      root.rotation.y = (1 - intro) * -.9 + Math.sin(t * .3) * .32 * intro + s.sx * .5 * s.hover;
      root.rotation.x = .05 - s.sy * .25 * s.hover;
      plug.scale.setScalar(Math.max(.001, eBack(span(t, 0, .5))));
      const burst = ct >= 0 && ct < 1.3 ? eInOut(ct / 1.3) : -1;
      fibres.forEach((f, i) => {
        f.mat.uniforms.uT.value = flow;
        f.mat.uniforms.uReveal.value = eOut(span(t, .35 + f.delay, 1.8));
        f.mat.uniforms.uBurst.value = burst;
        const on = span(t, 2.1 + f.delay, .3);
        const flare = burst > .9 ? 1 + (1 - Math.abs(burst - .97) * 12) * 1.5 : 1;
        const k = Math.max(.0001, on * Math.max(1, flare));
        m4.compose(f.end, q0, sc.set(k, k, k)); tips.setMatrixAt(i, m4);
      });
      tips.instanceMatrix.needsUpdate = true;
    }
  };
}

const BUILD = { lattice, swarm, fold, flip: flipwall, fibre };
document.querySelectorAll('.stage[data-concept]').forEach(stage => {
  const id = stage.dataset.concept;
  mount(stage, BUILD[id], THEMES[id][stage.dataset.mode]);
});
</script>
@endverbatim
</body>
</html>
