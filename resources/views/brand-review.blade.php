{{--
    Protocol.com — private identity review page for the client.
    Self-contained: no Vite build, no external JS. Fonts come from Google Fonts.
    Kept out of search: robots meta below + X-Robots-Tag header on the route.
--}}
@php
    // The First Leaf scroll: an Archimedean coil from its inner end out to the stem joint.
    $coil = 'M110 86 C110.1 85.5 110.6 84.2 110.6 83.2 C110.7 82.2 110.6 81.1 110.4 80 C110.2 78.9 109.8 77.8 109.2 76.8 C108.6 75.8 107.9 74.8 107 73.9 C106.1 73 105 72.2 103.9 71.5 C102.7 70.9 101.4 70.3 100 70 C98.6 69.7 97.1 69.5 95.6 69.6 C94.1 69.6 92.5 69.9 91 70.4 C89.5 70.9 88 71.6 86.6 72.6 C85.2 73.5 83.8 74.7 82.7 76 C81.5 77.3 80.5 78.9 79.7 80.6 C78.9 82.2 78.3 84.1 78 86 C77.7 87.9 77.6 90 77.8 92 C78 94 78.5 96 79.2 98 C80 100 81 101.9 82.3 103.7 C83.6 105.4 85.2 107.1 87 108.5 C88.8 109.9 90.8 111.2 93 112.1 C95.2 113 97.6 113.7 100 114 C102.4 114.3 105 114.3 107.5 114 C110 113.7 112.6 113 115 112 C117.4 111 119.8 109.6 121.9 107.9 C124 106.3 126.1 104.2 127.7 102 C129.4 99.8 130.8 97.2 131.9 94.5 C132.9 91.9 133.7 88.9 134 86 C134.3 83.1 134.3 79.9 133.8 76.9 C133.3 73.9 132.5 70.9 131.2 68 C129.9 65.1 128.2 62.3 126.2 59.8 C124.1 57.4 121.7 55 119 53.1 C116.3 51.2 113.3 49.5 110.1 48.3 C106.9 47.1 103.5 46.3 100 46 C96.5 45.7 92.9 45.8 89.4 46.4 C85.9 47 82.3 48.1 79 49.6 C75.7 51.2 72.4 53.2 69.6 55.6 C66.7 58 64.1 60.9 61.9 64 C59.7 67.1 57.8 70.7 56.5 74.4 C55.2 78 54.4 84.1 54 86';

    // The solid P used by Stack (and, scaled, by Interference).
    $p = 'M6 6 H74 A44 44 0 0 1 74 94 H42 V150 H6 Z M42 36 H70 A14 14 0 0 1 70 64 H42 Z';

    // Static marks used for favicons and app icons. Colours come from CSS
    // custom properties on the wrapper (--i-ink, --i-acc, --i-b1…), so one
    // drawing serves light, dark and brand tiles. $id keeps pattern/clip ids unique.
    $mark = [
        'stack' => fn (string $id) => '<svg viewBox="0 0 200 200" aria-hidden="true"><path transform="translate(50 12)" fill-rule="evenodd" d="'.$p.'" style="fill:var(--i-b1)"></path><path transform="translate(38 22)" fill-rule="evenodd" d="'.$p.'" style="fill:var(--i-b2)"></path><path transform="translate(26 32)" fill-rule="evenodd" d="'.$p.'" style="fill:var(--i-acc)"></path></svg>',
        'leaf' => fn (string $id) => '<svg viewBox="4 32 180 180" aria-hidden="true"><g fill="none" stroke-width="17" style="stroke:var(--i-ink)"><path d="M54 86 V206"></path><path d="'.$coil.'" stroke-linecap="round"></path></g><rect x="40" y="164" width="28" height="10" rx="2" style="fill:var(--i-acc)"></rect></svg>',
        'interference' => fn (string $id) => '<svg viewBox="0 0 200 200" aria-hidden="true"><defs><pattern id="'.$id.'p" patternUnits="userSpaceOnUse" width="16" height="16" patternTransform="rotate(45)"><rect width="8" height="16" style="fill:var(--i-acc)"></rect></pattern></defs><circle cx="100" cy="100" r="88" fill="url(#'.$id.'p)"></circle><circle cx="100" cy="100" r="92" fill="none" stroke-width="8" style="stroke:var(--i-acc)"></circle><path transform="translate(47.3 33.7) scale(.85)" fill-rule="evenodd" d="'.$p.'" style="fill:var(--i-ink)"></path></svg>',
        'merge' => fn (string $id) => '<svg viewBox="49 42 220 220" aria-hidden="true"><rect x="74" y="56" width="46" height="196" rx="23" style="fill:var(--i-acc)"></rect><circle cx="146" cy="120" r="52" fill="none" stroke-width="40" style="stroke:var(--i-acc)"></circle><circle cx="232.6" cy="186" r="13" style="fill:var(--i-acc)"></circle></svg>',
        'combination' => fn (string $id) => '<svg viewBox="0 0 200 200" aria-hidden="true"><rect x="22" y="22" width="156" height="156" rx="34" style="fill:var(--i-b1)"></rect><rect x="62" y="34" width="76" height="132" rx="14" style="fill:var(--i-b2)"></rect><text x="100" y="102" text-anchor="middle" dominant-baseline="central" font-family="\'Chivo Mono\', ui-monospace, monospace" font-weight="700" font-size="84" style="fill:var(--i-ink)">P</text><polygon points="36,88 52,100 36,112" style="fill:var(--i-acc)"></polygon><polygon points="164,88 148,100 164,112" style="fill:var(--i-acc)"></polygon></svg>',
    ];

    $vars = fn (array $c) => collect($c)->except('bg')->map(fn ($v, $k) => "--i-{$k}: {$v}")->push('--i-bg: '.($c['bg'] ?? 'transparent'))->implode('; ');

    $concepts = [
        [
            'id' => 'stack', 'num' => '01', 'name' => 'Stack',
            'idea' => 'Seven P-shaped layers, one for each layer of the OSI network model, the protocol stack every connection passes through. Hover pulls the layers apart; a click sends a flip through them.',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings', 'family' => 'Syne', 'css' => "'Syne', system-ui, sans-serif", 'weight' => 800, 'tracking' => '0.02em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Hanken Grotesk', 'css' => "'Hanken Grotesk', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Ink Violet', '#0D0C14', 'Dark background', '#ECEAF5'],
                ['Ultraviolet', '#8E6CFF', 'Accent on dark', '#0D0C14'],
                ['Deep Violet', '#6A4BE0', 'Accent on light', '#FFFFFF'],
                ['Lilac Mist', '#F1EFF8', 'Light background', '#16141F'],
                ['Dusk', '#8E8AA3', 'Secondary text on dark', '#0D0C14'],
                ['Slate Violet', '#5D5970', 'Secondary text on light', '#FFFFFF'],
            ],
            'icons' => [
                'light' => ['bg' => '#F1EFF8', 'acc' => '#6A4BE0', 'b1' => '#C2B6F0', 'b2' => '#9984E8'],
                'dark' => ['bg' => '#0D0C14', 'acc' => '#8E6CFF', 'b1' => '#3A2E66', 'b2' => '#614AAD'],
                'brand' => ['bg' => '#8E6CFF', 'acc' => '#FFFFFF', 'b1' => 'rgba(13,12,20,.4)', 'b2' => 'rgba(255,255,255,.5)'],
            ],
        ],
        [
            'id' => 'leaf', 'num' => '02', 'name' => 'First Leaf',
            'idea' => '“Protocol” comes from the Greek prōtokollon, the first sheet glued onto a papyrus roll. The P is that scroll: the stem is the sheet, the bowl is the curl, with a gold band where the glue would be.',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings', 'family' => 'EB Garamond', 'css' => "'EB Garamond', Garamond, Georgia, serif", 'weight' => 500, 'tracking' => '-0.005em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Instrument Sans', 'css' => "'Instrument Sans', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Papyrus', '#F3EEE3', 'Light background', '#231D16'],
                ['Lamp Black', '#231D16', 'Primary — mark & text', '#F3EEE3'],
                ['Gold Leaf', '#B07D1E', 'Accent', '#231D16'],
                ['Umber', '#6B6152', 'Secondary text', '#FFFFFF'],
                ['Night Vellum', '#1A1612', 'Dark background', '#F1E9DA'],
                ['Gilt', '#D4A64B', 'Accent on dark', '#1A1612'],
            ],
            'icons' => [
                'light' => ['bg' => '#F3EEE3', 'ink' => '#231D16', 'acc' => '#B07D1E'],
                'dark' => ['bg' => '#1A1612', 'ink' => '#F1E9DA', 'acc' => '#D4A64B'],
                'brand' => ['bg' => '#231D16', 'ink' => '#F3EEE3', 'acc' => '#D4A64B'],
            ],
        ],
        [
            'id' => 'interference', 'num' => '03', 'name' => 'Interference',
            'idea' => 'A P hidden in a field of fine lines, revealed only when a matching key lines up over it — two sides agreeing on the same pattern. Hover flips the P to its negative; a click spins the key.',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings (set wide)', 'family' => 'Michroma', 'css' => "'Michroma', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0.08em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Red Hat Text', 'css' => "'Red Hat Text', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Void', '#0A0B0F', 'Dark background', '#ECE7DA'],
                ['Signal Lime', '#C6FF3D', 'Accent on dark', '#0A0B0F'],
                ['Bone', '#ECE7DA', 'Lines & text on dark', '#0A0B0F'],
                ['Paper', '#EEECE5', 'Light background', '#17181D'],
                ['Moss', '#4E6B00', 'Accent on light', '#FFFFFF'],
                ['Graphite', '#5D5F66', 'Secondary text', '#FFFFFF'],
            ],
            'icons' => [
                'light' => ['bg' => '#EEECE5', 'ink' => '#17181D', 'acc' => '#4E6B00'],
                'dark' => ['bg' => '#0A0B0F', 'ink' => '#ECE7DA', 'acc' => '#C6FF3D'],
                'brand' => ['bg' => '#C6FF3D', 'ink' => '#0A0B0F', 'acc' => '#0A0B0F'],
            ],
        ],
        [
            'id' => 'merge', 'num' => '04', 'name' => 'Merge',
            'idea' => 'A liquid P whose drops orbit the bowl, join it and pull away again — separate parts becoming one shape. Hover draws the drops in; a click tears the bowl off the stem and lets it snap back.',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark, headings', 'family' => 'Bricolage Grotesque', 'css' => "'Bricolage Grotesque', system-ui, sans-serif", 'weight' => 800, 'tracking' => '-0.035em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Albert Sans', 'css' => "'Albert Sans', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Ultramarine', '#3022FF', 'Primary — mark', '#FFFFFF'],
                ['Midnight Ink', '#0F1030', 'Text', '#E9EAEE'],
                ['Cloud', '#E9EAEE', 'Light background', '#0F1030'],
                ['Night', '#0C0D1E', 'Dark background', '#ECECF6'],
                ['Periwinkle', '#7468FF', 'Mark on dark', '#0C0D1E'],
                ['Steel', '#575A6E', 'Secondary text', '#FFFFFF'],
            ],
            'icons' => [
                'light' => ['bg' => '#E9EAEE', 'acc' => '#3022FF'],
                'dark' => ['bg' => '#0C0D1E', 'acc' => '#7468FF'],
                'brand' => ['bg' => '#3022FF', 'acc' => '#FFFFFF'],
            ],
        ],
        [
            'id' => 'combination', 'num' => '05', 'name' => 'Combination',
            'idea' => 'The wordmark is a word lock: eight lettered wheels that spin and click into P-R-O-T-O-C-O-L one by one, then the reading frame lights up. Hover nudges the wheels; a click spins them again.',
            'fonts' => [
                ['role' => 'Primary', 'use' => 'Wordmark wheels, headings', 'family' => 'Chivo Mono', 'css' => "'Chivo Mono', ui-monospace, monospace", 'weight' => 700, 'tracking' => '0.02em'],
                ['role' => 'Secondary', 'use' => 'Body copy, interface', 'family' => 'Chivo', 'css' => "'Chivo', system-ui, sans-serif", 'weight' => 400, 'tracking' => '0'],
            ],
            'palette' => [
                ['Gunmetal', '#121417', 'Dark background', '#EEE8DA'],
                ['Brass', '#D4A853', 'Accent on dark', '#121417'],
                ['Wheel', '#272B31', 'Wheel faces', '#EEE8DA'],
                ['Bone', '#EEE8DA', 'Letters on dark', '#121417'],
                ['Aged Brass', '#8E6B1F', 'Accent on light', '#FFFFFF'],
                ['Putty', '#ECEAE4', 'Light background', '#1B1C1F'],
            ],
            'icons' => [
                'light' => ['bg' => '#ECEAE4', 'ink' => '#1B1C1F', 'acc' => '#8E6B1F', 'b1' => '#D8D5CC', 'b2' => '#F8F6F1'],
                'dark' => ['bg' => '#121417', 'ink' => '#EEE8DA', 'acc' => '#D4A853', 'b1' => '#1B1E23', 'b2' => '#272B31'],
                'brand' => ['bg' => '#D4A853', 'ink' => '#EEE8DA', 'acc' => '#121417', 'b1' => 'rgba(18,20,23,.18)', 'b2' => '#121417'],
            ],
        ],
    ];

    $alphabet = range('A', 'Z');
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
<title>Protocol identity review — private</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@400;500&amp;family=Bricolage+Grotesque:opsz,wght@12..96,500..800&amp;family=Chivo+Mono:wght@500;700&amp;family=Chivo:wght@400;500&amp;family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;family=Geist+Mono:wght@400;500&amp;family=Geist:wght@400;500;600&amp;family=Hanken+Grotesk:wght@400;500&amp;family=Instrument+Sans:wght@400;500&amp;family=Michroma&amp;family=Red+Hat+Text:wght@400;500&amp;family=Syne:wght@600;800&amp;display=swap">
<script>document.documentElement.classList.add('js')</script>
@verbatim
<style>
:root{--page:#F4F3EF;--text:#151515;--muted:#5E5D58;--line:#E2E0D9;--card:#FFFFFF}
*{box-sizing:border-box}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{margin:0;background:var(--page);color:var(--text);font:400 16px/1.55 'Geist',system-ui,sans-serif}
a{color:inherit}
.wrap{max-width:1200px;margin:0 auto;padding:0 16px}
@media (min-width:760px){.wrap{padding:0 32px}}

/* Top bar */
.top{position:sticky;top:0;z-index:10;background:rgba(244,243,239,.88);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid var(--line)}
.top .wrap{display:flex;align-items:center;justify-content:space-between;gap:16px;min-height:60px;flex-wrap:wrap;padding-top:8px;padding-bottom:8px}
.brand{display:flex;align-items:baseline;gap:12px;font-weight:600;letter-spacing:-.01em}
.brand small{font-weight:400;font-size:13px;color:var(--muted)}
.nav{display:flex;gap:4px;flex-wrap:wrap}
.nav a{display:inline-flex;align-items:center;gap:6px;min-height:44px;padding:0 12px;border-radius:999px;text-decoration:none;font-size:14px;color:var(--muted)}
.nav a:hover{background:#E9E7E1;color:var(--text)}
.nav a span{font-family:'Geist Mono',monospace;font-size:12px}

/* Intro */
.hero{padding-top:72px;padding-bottom:40px}
.eyebrow{font:500 12px/1 'Geist Mono',monospace;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin:0 0 20px}
.hero h1{font-size:clamp(36px,6vw,64px);line-height:1.02;letter-spacing:-.035em;font-weight:600;margin:0;max-width:14ch;text-wrap:balance}
.hero p{max-width:60ch;color:var(--muted);font-size:18px;margin:24px 0 0;text-wrap:pretty}
.how{display:flex;gap:8px;flex-wrap:wrap;margin-top:28px}
.how span{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border:1px solid var(--line);border-radius:999px;font-size:14px;background:var(--card)}
.how b{font:500 11px/1 'Geist Mono',monospace;letter-spacing:.08em;text-transform:uppercase;color:var(--muted)}

/* Concept sections */
.concept{padding:56px 0;border-top:1px solid var(--line);scroll-margin-top:72px}
.c-head{display:grid;gap:12px 40px;margin-bottom:28px}
@media (min-width:900px){.c-head{grid-template-columns:minmax(0,1fr) minmax(0,1.3fr);align-items:end}}
.c-head h2{margin:0;font-size:clamp(32px,4.4vw,48px);letter-spacing:-.03em;line-height:1;font-weight:600;display:flex;align-items:baseline;gap:16px}
.c-head h2 span{font:500 14px/1 'Geist Mono',monospace;color:var(--muted);letter-spacing:.04em}
.c-head p{margin:0;color:var(--muted);max-width:58ch;text-wrap:pretty}

.stages{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
@media (max-width:760px){.stages{grid-template-columns:minmax(0,1fr)}}
.stage{position:relative;height:clamp(380px,38vw,460px);border-radius:24px;overflow:hidden;display:flex;align-items:center;justify-content:center;background:var(--bg);color:var(--ink);container-type:inline-size}
.stage .mode{position:absolute;top:18px;left:20px;font:500 11px/1 'Geist Mono',monospace;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);z-index:1}
.replay{position:absolute;right:14px;bottom:14px;z-index:1;height:44px;padding:0 16px 0 12px;display:flex;align-items:center;gap:8px;border-radius:999px;border:1px solid color-mix(in srgb,var(--ink) 24%,transparent);background:color-mix(in srgb,var(--bg) 70%,transparent);color:var(--ink);font:500 13px/1 'Geist',system-ui,sans-serif;cursor:pointer;transition:background-color .2s,border-color .2s}
.replay:hover{background:color-mix(in srgb,var(--ink) 7%,var(--bg));border-color:color-mix(in srgb,var(--ink) 45%,transparent)}
.replay:focus-visible{outline:2px solid var(--ink);outline-offset:3px}

.details{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px;margin-top:16px}
@media (max-width:760px){.details{grid-template-columns:minmax(0,1fr)}}
.card{background:var(--card);border:1px solid var(--line);border-radius:24px;padding:24px;min-width:0}
.card h3{margin:0 0 20px;font:500 12px/1 'Geist Mono',monospace;letter-spacing:.12em;text-transform:uppercase;color:var(--muted)}

/* Favicon */
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

/* App icons */
.apps{display:flex;gap:20px;flex-wrap:wrap}
.app-item{display:flex;flex-direction:column;align-items:center;gap:10px;font-size:13px;color:var(--muted)}
.app{width:96px;height:96px;border-radius:22.5%;background:var(--i-bg);padding:18px;box-shadow:0 1px 2px rgba(0,0,0,.08),0 8px 24px -8px rgba(0,0,0,.25),inset 0 0 0 1px rgba(0,0,0,.06)}
.app.sm{width:60px;height:60px;padding:11px}
.apps-row{display:flex;align-items:flex-end;gap:14px;margin-top:22px;padding-top:20px;border-top:1px solid var(--line);flex-wrap:wrap}

/* Type */
.fonts{display:grid;gap:20px}
.font{display:grid;grid-template-columns:auto minmax(0,1fr);gap:4px 20px;align-items:center}
.font .aa{font-size:64px;line-height:1;grid-row:span 3}
.font .role{font:500 11px/1.4 'Geist Mono',monospace;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
.font .fam{font-size:20px;font-weight:600;letter-spacing:-.01em}
.font .use{font-size:13px;color:var(--muted)}
.sample{margin:4px 0 0;padding-top:16px;border-top:1px solid var(--line);display:grid;gap:10px}
.sample .h{font-size:clamp(22px,2.8vw,28px);line-height:1.15;margin:0;text-wrap:balance}
.sample .b{font-size:16px;line-height:1.6;margin:0;color:#3D3C38}

/* Palette */
.swatches{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}
@media (max-width:480px){.swatches{grid-template-columns:repeat(2,minmax(0,1fr))}}
.sw{border-radius:16px;padding:14px;min-height:112px;display:flex;flex-direction:column;justify-content:space-between;gap:10px;box-shadow:inset 0 0 0 1px rgba(0,0,0,.07)}
.sw b{font-size:15px;font-weight:600}
.sw span{display:block;font:400 12px/1.35 'Geist Mono',monospace}

/* Closing + footer */
.closing{padding:64px 0;border-top:1px solid var(--line)}
.closing h2{font-size:clamp(28px,4vw,40px);letter-spacing:-.03em;line-height:1.05;margin:0;font-weight:600}
.closing p{color:var(--muted);max-width:60ch;margin:16px 0 0}
.foot{border-top:1px solid var(--line);padding:28px 0 40px}
.foot .wrap{display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;font-size:13px;color:var(--muted)}
.credit{display:inline-flex;align-items:center;gap:12px;text-decoration:none;color:#151515;min-height:44px}
.credit svg{height:20px;width:auto;display:block}
.credit:hover svg{opacity:.8}

/* ---------- Logos: shared ---------- */
.logo{appearance:none;background:none;border:0;margin:0;padding:24px 32px;font:inherit;color:inherit;cursor:pointer;-webkit-tap-highlight-color:transparent;border-radius:24px}
.logo:focus-visible{outline:2px solid var(--acc);outline-offset:6px}
.logo svg{display:block;overflow:visible}
.logo svg g{transform-box:fill-box;transform-origin:center}
.ltr{display:inline-block}
.js .logo:not(.play),.js .logo:not(.play) *{animation-play-state:paused!important}
@media (max-width:480px){.logo{padding:16px}}

/* ---------- 01 Stack ---------- */
.c-stack .light{--bg:#F1EFF8;--ink:#16141F;--acc:#6A4BE0;--muted:#5D5970;--edge:rgba(22,20,31,.16)}
.c-stack .dark{--bg:#0D0C14;--ink:#ECEAF5;--acc:#8E6CFF;--muted:#8E8AA3;--edge:rgba(242,240,250,.22)}
.sk-logo{display:flex;flex-direction:column;align-items:center;gap:14px}
.sk-scene{width:240px;height:228px;display:flex;align-items:center;justify-content:center;perspective:1400px}
.sk-rot{display:block;position:relative;width:120px;height:156px;transform-style:preserve-3d;transform:rotateX(-14deg) rotateY(-38deg);transition:transform .7s cubic-bezier(.3,1.3,.5,1)}
.logo:hover .sk-rot{transform:rotateX(-20deg) rotateY(-52deg)}
.sk-l,.sk-c,.sk-h,.sk-in,.sk-id{position:absolute;left:0;top:0;width:120px;height:156px;transform-style:preserve-3d}
.sk-l{transform:translateZ(calc((3 - var(--i))*11px))}
.sk-fill{fill:color-mix(in srgb,var(--acc) var(--m),var(--bg));stroke:var(--edge);stroke-width:1.2px}
.sk-glow{fill:#FFFFFF;opacity:0;animation:sk-pass 4.2s ease-in-out calc(2.1s + var(--i)*.13s) infinite}
@keyframes sk-pass{0%,16%,100%{opacity:0}7%{opacity:.32}}
.sk-in{animation:sk-drop .75s cubic-bezier(.2,1.25,.4,1) calc(.2s + (6 - var(--i))*.1s) backwards}
@keyframes sk-drop{from{transform:translateY(-150px);opacity:0}}
.sk-h{transition:transform .6s cubic-bezier(.3,1.3,.5,1)}
.logo:hover .sk-h{transform:translateZ(calc((3 - var(--i))*13px))}
.ca .sk-c{animation:sk-twist-a 1s cubic-bezier(.6,0,.3,1) calc(var(--i)*.07s)}
.cb .sk-c{animation:sk-twist-b 1s cubic-bezier(.6,0,.3,1) calc(var(--i)*.07s)}
@keyframes sk-twist-a{from{transform:rotateY(0deg)}to{transform:rotateY(360deg)}}
@keyframes sk-twist-b{from{transform:rotateY(0deg)}to{transform:rotateY(360deg)}}
.sk-word{display:flex;font:800 clamp(34px,4vw,44px)/1 'Syne',system-ui,sans-serif;letter-spacing:.06em;padding-left:.06em;color:var(--ink);transition:letter-spacing .6s cubic-bezier(.3,1.3,.5,1),padding-left .6s cubic-bezier(.3,1.3,.5,1)}
.logo:hover .sk-word{letter-spacing:.13em;padding-left:.13em}
.sk-word .ltr{animation:sk-ldrop .6s cubic-bezier(.2,1.3,.4,1) calc(1.05s + var(--i)*.05s) backwards}
@keyframes sk-ldrop{from{opacity:0;transform:translateY(-26px)}}
.ca .sk-word .ltr{animation:sk-lhop-a .6s cubic-bezier(.3,0,.3,1) calc(.3s + var(--i)*.05s)}
.cb .sk-word .ltr{animation:sk-lhop-b .6s cubic-bezier(.3,0,.3,1) calc(.3s + var(--i)*.05s)}
@keyframes sk-lhop-a{0%,100%{transform:none}40%{transform:translateY(-10px)}}
@keyframes sk-lhop-b{0%,100%{transform:none}40%{transform:translateY(-10px)}}

/* ---------- 02 First Leaf ---------- */
.c-leaf .light{--bg:#F3EEE3;--ink:#231D16;--acc:#B07D1E;--muted:#6B6152}
.c-leaf .dark{--bg:#1A1612;--ink:#F1E9DA;--acc:#D4A64B;--muted:#A79C8A}
.lf-logo{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;gap:8px 22px}
.lf-svg{width:clamp(120px,14vw,170px);height:auto}
.lf-coil{fill:none;stroke:var(--ink);stroke-width:15px;stroke-linecap:round;stroke-dasharray:1 1.2;animation:lf-draw .85s cubic-bezier(.55,0,.3,1) .2s backwards}
.lf-stem{fill:none;stroke:var(--ink);stroke-width:15px;stroke-linecap:butt;stroke-dasharray:1 1.2;animation:lf-draw .5s cubic-bezier(.4,0,.2,1) .98s backwards}
@keyframes lf-draw{from{stroke-dashoffset:1.1}}
.lf-glint{fill:none;stroke:var(--acc);stroke-width:4.5px;stroke-linecap:round;stroke-dasharray:.07 1.2;stroke-dashoffset:.08;animation:lf-glint 3.8s ease-in-out 2.2s infinite}
@keyframes lf-glint{0%{stroke-dashoffset:.08}55%,100%{stroke-dashoffset:-1.05}}
.lf-band{fill:var(--acc)}
.lf-band-in{animation:lf-band-in .45s cubic-bezier(.3,1.5,.5,1) 1.45s backwards}
@keyframes lf-band-in{from{transform:scaleX(0)}}
.logo svg .lf-coil-h{transform-box:view-box;transform-origin:54px 86px;transition:transform .55s cubic-bezier(.3,1.5,.5,1)}
.logo:hover .lf-coil-h{transform:rotate(-9deg)}
.ca .lf-stem{animation:lf-stem-a 1.4s ease-in-out}
.cb .lf-stem{animation:lf-stem-b 1.4s ease-in-out}
@keyframes lf-stem-a{0%,100%{stroke-dashoffset:0}30%,70%{stroke-dashoffset:1.1}}
@keyframes lf-stem-b{0%,100%{stroke-dashoffset:0}30%,70%{stroke-dashoffset:1.1}}
.ca .lf-coil{animation:lf-coil-a 1.4s ease-in-out}
.cb .lf-coil{animation:lf-coil-b 1.4s ease-in-out}
@keyframes lf-coil-a{0%,25%,75%,100%{stroke-dashoffset:0}45%,55%{stroke-dashoffset:.7}}
@keyframes lf-coil-b{0%,25%,75%,100%{stroke-dashoffset:0}45%,55%{stroke-dashoffset:.7}}
.ca .lf-band-c{animation:lf-band-a 1.4s ease-in-out}
.cb .lf-band-c{animation:lf-band-b 1.4s ease-in-out}
@keyframes lf-band-a{0%,100%{opacity:1;transform:none}22%,78%{opacity:0;transform:scaleX(0)}}
@keyframes lf-band-b{0%,100%{opacity:1;transform:none}22%,78%{opacity:0;transform:scaleX(0)}}
.lf-word{display:flex;font:500 clamp(52px,6.4vw,80px)/1 'EB Garamond',Garamond,Georgia,serif;letter-spacing:-.005em;color:var(--ink)}
.lf-word .rub{transition:color .4s ease}
.logo:hover .lf-word .rub{color:color-mix(in srgb,var(--acc) 78%,var(--ink))}
.lf-word .ltr{animation:lf-rise .7s cubic-bezier(.2,.8,.2,1) calc(1.15s + var(--i)*.05s) backwards}
@keyframes lf-rise{from{opacity:0;transform:translateY(12px)}}
.ca .lf-word .ltr{animation:lf-wave-a .6s ease-out calc(.95s + var(--i)*.04s)}
.cb .lf-word .ltr{animation:lf-wave-b .6s ease-out calc(.95s + var(--i)*.04s)}
@keyframes lf-wave-a{0%,100%{transform:none}40%{transform:translateY(-7px)}}
@keyframes lf-wave-b{0%,100%{transform:none}40%{transform:translateY(-7px)}}

/* ---------- 03 Interference ---------- */
.c-interference .light{--bg:#EEECE5;--ink:#17181D;--acc:#4E6B00;--muted:#5D5F66}
.c-interference .dark{--bg:#0A0B0F;--ink:#ECE7DA;--acc:#C6FF3D;--muted:#8C8F98}
.if-logo{display:flex;flex-direction:column;align-items:center;gap:14px;padding:16px}
.if-svg{width:min(360px,calc(100cqw - 40px));height:auto}
.if-fline{fill:var(--ink)}
.if-lline{fill:var(--acc)}
.if-ring{fill:none;stroke:var(--acc);stroke-width:2px}
.if-in{animation:if-slide 1.7s cubic-bezier(.2,.7,.15,1) .25s backwards}
@keyframes if-slide{from{transform:translate(-330px,30px) rotate(-48deg)}}
.if-id{animation:if-wobble 6s ease-in-out 3.2s infinite}
@keyframes if-wobble{0%,68%,100%{transform:rotate(0deg)}76%{transform:rotate(2.4deg)}85%{transform:rotate(-1.3deg)}93%{transform:rotate(.4deg)}}
.if-h{transition:transform .55s cubic-bezier(.4,0,.2,1)}
.logo:hover .if-h{transform:translate(2.83px,2.83px)}
.ca .if-c{animation:if-spin-a 1.8s cubic-bezier(.55,0,.2,1)}
.cb .if-c{animation:if-spin-b 1.8s cubic-bezier(.55,0,.2,1)}
@keyframes if-spin-a{0%{transform:none}50%{transform:rotate(180deg) scale(1.05)}100%{transform:rotate(360deg)}}
@keyframes if-spin-b{0%{transform:none}50%{transform:rotate(180deg) scale(1.05)}100%{transform:rotate(360deg)}}
.if-pulse{fill:none;stroke:var(--acc);stroke-width:2px;opacity:0;animation:if-lock .8s ease-out 1.85s}
@keyframes if-lock{from{opacity:1;transform:scale(1)}to{opacity:0;transform:scale(1.4)}}
.ca .if-pulse{animation:if-lock-a .8s ease-out 1.7s}
.cb .if-pulse{animation:if-lock-b .8s ease-out 1.7s}
@keyframes if-lock-a{from{opacity:1;transform:scale(1)}to{opacity:0;transform:scale(1.4)}}
@keyframes if-lock-b{from{opacity:1;transform:scale(1)}to{opacity:0;transform:scale(1.4)}}
.if-word{display:flex;font:400 clamp(17px,2vw,23px)/1 'Michroma',system-ui,sans-serif;letter-spacing:.42em;padding-left:.42em;color:var(--ink);transition:letter-spacing .6s cubic-bezier(.3,1.2,.5,1),padding-left .6s cubic-bezier(.3,1.2,.5,1)}
.logo:hover .if-word{letter-spacing:.3em;padding-left:.3em}
.if-word .ltr{animation:if-letter .6s cubic-bezier(.2,.8,.2,1) calc(1.95s + var(--i)*.05s) backwards}
@keyframes if-letter{from{opacity:0;transform:translateY(10px)}}
.ca .if-word .ltr{animation:if-flick-a .5s steps(4,end) calc(1.5s + var(--i)*.04s)}
.cb .if-word .ltr{animation:if-flick-b .5s steps(4,end) calc(1.5s + var(--i)*.04s)}
@keyframes if-flick-a{0%{opacity:1}25%{opacity:.2}50%{opacity:1}75%{opacity:.4}100%{opacity:1}}
@keyframes if-flick-b{0%{opacity:1}25%{opacity:.2}50%{opacity:1}75%{opacity:.4}100%{opacity:1}}

/* ---------- 04 Merge ---------- */
.c-merge .light{--bg:#E9EAEE;--ink:#0F1030;--acc:#3022FF;--muted:#575A6E}
.c-merge .dark{--bg:#0C0D1E;--ink:#ECECF6;--acc:#7468FF;--muted:#9496AE}
.mg-logo{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;gap:0 4px}
.mg-svg{width:clamp(180px,21vw,260px);height:auto}
.mg-fill{fill:var(--acc)}
.mg-ring{fill:none;stroke:var(--acc);stroke-width:40px}
.logo svg .mg-stem-in{transform-origin:50% 100%;animation:mg-rise .9s cubic-bezier(.3,1.5,.5,1) .2s backwards}
@keyframes mg-rise{from{transform:scaleY(0)}}
.logo svg .mg-stem-c{transform-origin:50% 100%}
.ca .mg-stem-c{animation:mg-squash-a 1.3s ease-in-out}
.cb .mg-stem-c{animation:mg-squash-b 1.3s ease-in-out}
@keyframes mg-squash-a{0%,100%{transform:none}30%{transform:scale(1.04,.93)}70%{transform:scale(.98,1.03)}}
@keyframes mg-squash-b{0%,100%{transform:none}30%{transform:scale(1.04,.93)}70%{transform:scale(.98,1.03)}}
.mg-ring-in{animation:mg-grow .85s cubic-bezier(.3,1.6,.5,1) .55s backwards}
@keyframes mg-grow{from{transform:scale(0)}}
.ca .mg-ring-c{animation:mg-split-a 1.4s cubic-bezier(.4,0,.3,1)}
.cb .mg-ring-c{animation:mg-split-b 1.4s cubic-bezier(.4,0,.3,1)}
@keyframes mg-split-a{0%,100%{transform:none}28%{transform:translate(48px,-42px) scale(.9)}46%{transform:translate(48px,-42px) scale(.92)}70%{transform:translate(-6px,5px) scale(1.04)}85%{transform:translate(2px,-2px)}}
@keyframes mg-split-b{0%,100%{transform:none}28%{transform:translate(48px,-42px) scale(.9)}46%{transform:translate(48px,-42px) scale(.92)}70%{transform:translate(-6px,5px) scale(1.04)}85%{transform:translate(2px,-2px)}}
.logo svg .mg-orb{transform-box:view-box;transform-origin:146px 120px;animation:mg-orbit 9s linear infinite}
@keyframes mg-orbit{to{transform:rotate(360deg)}}
.mg-drop-in{animation:mg-fling .9s cubic-bezier(.2,1.2,.4,1) calc(1.05s + var(--k)*.09s) backwards}
@keyframes mg-fling{from{transform:translate(calc(var(--ix)*100px),calc(var(--iy)*100px)) scale(.4)}}
.mg-pull{transition:transform .7s cubic-bezier(.3,1.5,.5,1)}
.logo:hover .mg-pull{transform:translate(calc(var(--ix)*30px),calc(var(--iy)*30px))}
.mg-bob{animation:mg-bob var(--p) ease-in-out 2s infinite}
@keyframes mg-bob{0%,100%{transform:translate(0,0)}50%{transform:translate(calc(var(--ix)*22px),calc(var(--iy)*22px))}}
.ca .mg-burst{animation:mg-burst-a 1.4s cubic-bezier(.3,0,.3,1)}
.cb .mg-burst{animation:mg-burst-b 1.4s cubic-bezier(.3,0,.3,1)}
@keyframes mg-burst-a{0%,100%{transform:none}30%{transform:translate(calc(var(--ix)*-46px),calc(var(--iy)*-46px))}70%{transform:translate(calc(var(--ix)*8px),calc(var(--iy)*8px))}}
@keyframes mg-burst-b{0%,100%{transform:none}30%{transform:translate(calc(var(--ix)*-46px),calc(var(--iy)*-46px))}70%{transform:translate(calc(var(--ix)*8px),calc(var(--iy)*8px))}}
.mg-drip{opacity:0;animation:mg-drip 4.6s cubic-bezier(.5,0,.6,1) 2.6s infinite}
@keyframes mg-drip{0%{transform:translateY(0) scale(.6);opacity:0}8%{transform:translateY(0) scale(1);opacity:1}60%{transform:translateY(168px)}80%{transform:translateY(214px) scale(.86);opacity:1}94%,100%{transform:translateY(262px) scale(.45);opacity:0}}
.mg-word{display:flex;font:800 clamp(52px,6.2vw,76px)/1 'Bricolage Grotesque',system-ui,sans-serif;font-variation-settings:'opsz' 96;letter-spacing:-.035em;color:var(--ink)}
.mg-word .o{color:var(--acc);transition:transform .5s cubic-bezier(.3,1.8,.5,1)}
.logo:hover .mg-word .o{transform:translateY(-8px)}
.mg-word .ltr{animation:mg-drop .75s cubic-bezier(.3,1.6,.5,1) calc(1.25s + var(--i)*.05s) backwards}
@keyframes mg-drop{from{opacity:0;transform:translateY(-30px) scaleY(1.25)}}
.ca .mg-word .ltr{animation:mg-wave-a .7s cubic-bezier(.3,1.6,.5,1) calc(.3s + var(--i)*.04s)}
.cb .mg-word .ltr{animation:mg-wave-b .7s cubic-bezier(.3,1.6,.5,1) calc(.3s + var(--i)*.04s)}
@keyframes mg-wave-a{0%,100%{transform:none}40%{transform:translateY(-9px) scaleY(1.06)}}
@keyframes mg-wave-b{0%,100%{transform:none}40%{transform:translateY(-9px) scaleY(1.06)}}

/* ---------- 05 Combination ---------- */
.c-combination .light{--bg:#ECEAE4;--ink:#1B1C1F;--acc:#8E6B1F;--muted:#5F5E5A;--house:#D8D5CC;--win:#BDB9AE;--face:#F8F6F1;--fb1:rgba(255,255,255,.8);--fb2:rgba(0,0,0,.14);--sh:rgba(189,185,174,.96);--sh2:rgba(189,185,174,.45);--hs:rgba(70,60,40,.25)}
.c-combination .dark{--bg:#121417;--ink:#EEE8DA;--acc:#D4A853;--muted:#8D9097;--house:#1B1E23;--win:#0C0D10;--face:#272B31;--fb1:rgba(255,255,255,.08);--fb2:rgba(0,0,0,.55);--sh:rgba(12,13,16,.95);--sh2:rgba(12,13,16,.45);--hs:rgba(0,0,0,.5)}
.cb-logo{padding:16px}
.cb-stage{perspective:1200px}
@container (max-width:620px){.cb-stage{zoom:.84}}
@container (max-width:520px){.cb-stage{zoom:.7}}
@container (max-width:440px){.cb-stage{zoom:.6}}
@container (max-width:380px){.cb-stage{zoom:.54}}
.cb-row{position:relative;display:flex;gap:8px;padding:16px 22px;border-radius:20px;background:var(--house);box-shadow:inset 0 1px 0 rgba(255,255,255,.07),inset 0 -1px 0 rgba(0,0,0,.25),0 24px 50px var(--hs);transform-style:preserve-3d;transition:transform .8s cubic-bezier(.3,1.3,.5,1)}
.logo:hover .cb-row{transform:rotateX(14deg) rotateY(-9deg)}
.cb-win{position:relative;width:56px;height:150px;border-radius:10px;overflow:hidden;perspective:1000px;background:var(--win)}
.cb-c,.cb-h,.cb-in,.cb-id{position:absolute;left:0;top:0;width:56px;height:150px;transform-style:preserve-3d}
.cb-face{position:absolute;left:3px;top:48px;width:50px;height:54px;display:flex;align-items:center;justify-content:center;font:700 40px/1 'Chivo Mono',ui-monospace,monospace;color:var(--ink);background:var(--face);border-top:1px solid var(--fb1);border-bottom:1px solid var(--fb2);backface-visibility:hidden;-webkit-backface-visibility:hidden;transform:rotateX(calc(var(--f)*-36deg)) translateZ(83px)}
.cb-shade{position:absolute;left:0;top:0;width:56px;height:150px;pointer-events:none;background:linear-gradient(180deg,var(--sh) 0%,var(--sh2) 26%,transparent 40%,transparent 60%,var(--sh2) 74%,var(--sh) 100%)}
.cb-in{animation:cb-spin calc(1.4s + var(--i)*.14s) cubic-bezier(.15,.75,.25,1.06) .3s backwards}
@keyframes cb-spin{from{transform:rotateX(calc(var(--s)*1deg))}}
.cb-id{animation:cb-jig 7s ease-in-out calc(3.4s + var(--i)*.12s) infinite}
@keyframes cb-jig{0%,9%,100%{transform:rotateX(0deg)}3%{transform:rotateX(-22deg)}6%{transform:rotateX(7deg)}}
.cb-h{transition:transform .6s cubic-bezier(.3,1.5,.5,1)}
.logo:hover .cb-h{transform:rotateX(calc(var(--hv)*.65deg))}
.ca .cb-c{animation:cb-respin-a calc(1.2s + var(--i)*.1s) cubic-bezier(.15,.75,.25,1.06)}
.cb .cb-c{animation:cb-respin-b calc(1.2s + var(--i)*.1s) cubic-bezier(.15,.75,.25,1.06)}
@keyframes cb-respin-a{from{transform:rotateX(calc(var(--s)*-1deg))}}
@keyframes cb-respin-b{from{transform:rotateX(calc(var(--s)*-1deg))}}
.cb-tick{position:absolute;left:25px;bottom:9px;width:6px;height:6px;border-radius:50%;background:var(--acc);opacity:.3;animation:cb-tick .7s ease-out calc(.3s + (1.4s + var(--i)*.14s)*.8) backwards}
@keyframes cb-tick{0%{opacity:.3;transform:none}12%{opacity:1;transform:scale(1.9)}100%{opacity:.3;transform:none}}
.ca .cb-tick{animation:cb-tick-a .7s ease-out calc((1.2s + var(--i)*.1s)*.8) backwards}
.cb .cb-tick{animation:cb-tick-b .7s ease-out calc((1.2s + var(--i)*.1s)*.8) backwards}
@keyframes cb-tick-a{0%{opacity:.3;transform:none}12%{opacity:1;transform:scale(1.9)}100%{opacity:.3;transform:none}}
@keyframes cb-tick-b{0%{opacity:.3;transform:none}12%{opacity:1;transform:scale(1.9)}100%{opacity:.3;transform:none}}
.cb-frame{position:absolute;left:10px;right:10px;top:64px;height:54px;border-top:1.5px solid var(--acc);border-bottom:1.5px solid var(--acc);opacity:.55;pointer-events:none;transform:translateZ(1px);animation:cb-unlock 1s ease-out 2.75s backwards}
@keyframes cb-unlock{0%{opacity:.15}25%{opacity:1}100%{opacity:.55}}
.ca .cb-frame{animation:cb-unlock-a 1s ease-out 1.7s backwards}
.cb .cb-frame{animation:cb-unlock-b 1s ease-out 1.7s backwards}
@keyframes cb-unlock-a{0%{opacity:.15}25%{opacity:1}100%{opacity:.55}}
@keyframes cb-unlock-b{0%{opacity:.15}25%{opacity:1}100%{opacity:.55}}
.cb-rail{position:absolute;top:84px;width:0;height:0;border-top:7px solid transparent;border-bottom:7px solid transparent;transform:translateZ(1px)}
.cb-rail-l{left:6px;border-left:8px solid var(--acc)}
.cb-rail-r{right:6px;border-right:8px solid var(--acc)}

@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  .logo,.logo *{animation-duration:1ms!important;animation-delay:0s!important;animation-iteration-count:1!important;transition-duration:1ms!important}
}
</style>
@endverbatim
</head>
<body>

<header class="top">
    <div class="wrap">
        <div class="brand">Protocol.com <small>Identity review · private preview</small></div>
        <nav class="nav" aria-label="Directions">
            @foreach ($concepts as $c)
                <a href="#{{ $c['id'] }}"><span>{{ $c['num'] }}</span>{{ $c['name'] }}</a>
            @endforeach
        </nav>
    </div>
</header>

<main>
    <section class="hero wrap">
        <p class="eyebrow">Protocol.com · Brand identity</p>
        <h1>Five directions for the Protocol identity.</h1>
        <p>Each direction is shown as it would live on the site — animated, in light and dark mode — alongside its favicon, app icon, type pairing and colour palette.</p>
        <div class="how">
            <span><b>Hover</b> Point at a logo</span>
            <span><b>Click</b> Tap a logo</span>
            <span><b>Replay</b> Watch the intro again</span>
        </div>
    </section>

    @foreach ($concepts as $c)
        <section class="concept c-{{ $c['id'] }}" id="{{ $c['id'] }}" aria-labelledby="{{ $c['id'] }}-title">
            <div class="wrap">
                <div class="c-head">
                    <h2 id="{{ $c['id'] }}-title"><span>{{ $c['num'] }}</span>{{ $c['name'] }}</h2>
                    <p>{{ $c['idea'] }}</p>
                </div>

                <div class="stages">
                    @foreach (['light', 'dark'] as $m)
                        <div class="stage {{ $m }}">
                            <span class="mode">{{ ucfirst($m) }} mode</span>

                            @switch($c['id'])
                                @case('stack')
                                    <button type="button" class="logo sk-logo" aria-label="Play the Stack logo animation, {{ $m }} mode">
                                        <span class="sk-scene" aria-hidden="true">
                                            <span class="sk-rot">
                                                @foreach ([[6, 29], [5, 36], [4, 44], [3, 54], [2, 66], [1, 80], [0, 100]] as [$i, $pct])
                                                    <span class="sk-l" style="--i: {{ $i }}; --m: {{ $pct }}%"><span class="sk-c"><span class="sk-h"><span class="sk-in"><span class="sk-id"><svg width="120" height="156" viewBox="0 0 120 156"><path class="sk-fill" fill-rule="evenodd" d="{{ $p }}"></path><path class="sk-glow" fill-rule="evenodd" d="{{ $p }}"></path></svg></span></span></span></span></span>
                                                @endforeach
                                            </span>
                                        </span>
                                        <span class="sk-word">@foreach (str_split('PROTOCOL') as $i => $l)<span class="ltr" style="--i: {{ $i }}">{{ $l }}</span>@endforeach</span>
                                    </button>
                                    @break

                                @case('leaf')
                                    <button type="button" class="logo lf-logo" aria-label="Play the First Leaf logo animation, {{ $m }} mode">
                                        <svg class="lf-svg" width="170" height="187" viewBox="0 0 200 220" aria-hidden="true">
                                            <path class="lf-stem" pathLength="1" d="M54 86 V206"></path>
                                            <g class="lf-band-c"><g class="lf-band-in"><rect class="lf-band" x="42" y="166" width="24" height="8" rx="1.5"></rect></g></g>
                                            <g class="lf-coil-h">
                                                <path class="lf-coil" pathLength="1" d="{{ $coil }}"></path>
                                                <path class="lf-glint" pathLength="1" d="{{ $coil }}"></path>
                                            </g>
                                        </svg>
                                        <span class="lf-word">@foreach (str_split('Protocol') as $i => $l)<span class="ltr{{ $i === 0 ? ' rub' : '' }}" style="--i: {{ $i }}">{{ $l }}</span>@endforeach</span>
                                    </button>
                                    @break

                                @case('interference')
                                    <button type="button" class="logo if-logo" aria-label="Play the Interference logo animation, {{ $m }} mode">
                                        <svg class="if-svg" width="360" height="300" viewBox="0 0 360 300" aria-hidden="true">
                                            <defs>
                                                <pattern id="if-fa-{{ $m }}" patternUnits="userSpaceOnUse" width="8" height="8" patternTransform="rotate(45)"><rect class="if-fline" x="0" y="0" width="4" height="8"></rect></pattern>
                                                <pattern id="if-fb-{{ $m }}" patternUnits="userSpaceOnUse" width="8" height="8" patternTransform="rotate(45)"><rect class="if-fline" x="4" y="0" width="4" height="8"></rect></pattern>
                                                <pattern id="if-la-{{ $m }}" patternUnits="userSpaceOnUse" width="8" height="8" patternTransform="rotate(45)"><rect class="if-lline" x="0" y="0" width="4" height="8"></rect></pattern>
                                                <radialGradient id="if-fade-{{ $m }}" gradientUnits="userSpaceOnUse" cx="180" cy="150" r="200"><stop offset="0" stop-color="#FFFFFF" stop-opacity="0.92"></stop><stop offset="0.6" stop-color="#FFFFFF" stop-opacity="0.32"></stop><stop offset="1" stop-color="#FFFFFF" stop-opacity="0"></stop></radialGradient>
                                                <mask id="if-mask-{{ $m }}"><rect x="0" y="0" width="360" height="300" fill="url(#if-fade-{{ $m }})"></rect></mask>
                                            </defs>
                                            <g mask="url(#if-mask-{{ $m }})">
                                                <path fill="url(#if-fa-{{ $m }})" fill-rule="evenodd" d="M0 0 H360 V300 H0 Z M124 78 H192 A44 44 0 0 1 192 166 H160 V222 H124 Z M160 108 H188 A14 14 0 0 1 188 136 H160 Z"></path>
                                                <path fill="url(#if-fb-{{ $m }})" fill-rule="evenodd" d="M124 78 H192 A44 44 0 0 1 192 166 H160 V222 H124 Z M160 108 H188 A14 14 0 0 1 188 136 H160 Z"></path>
                                            </g>
                                            <g class="if-c"><g class="if-h"><g class="if-in"><g class="if-id">
                                                <circle cx="180" cy="150" r="110" fill="url(#if-la-{{ $m }})"></circle>
                                                <circle class="if-ring" cx="180" cy="150" r="110"></circle>
                                            </g></g></g></g>
                                            <g><circle class="if-pulse" cx="180" cy="150" r="110"></circle></g>
                                        </svg>
                                        <span class="if-word">@foreach (str_split('PROTOCOL') as $i => $l)<span class="ltr" style="--i: {{ $i }}">{{ $l }}</span>@endforeach</span>
                                    </button>
                                    @break

                                @case('merge')
                                    <button type="button" class="logo mg-logo" aria-label="Play the Merge logo animation, {{ $m }} mode">
                                        <svg class="mg-svg" width="260" height="260" viewBox="0 0 300 300" aria-hidden="true">
                                            <defs>
                                                <filter id="mg-goo-{{ $m }}" filterUnits="userSpaceOnUse" x="-60" y="-60" width="420" height="440" color-interpolation-filters="sRGB">
                                                    <feGaussianBlur in="SourceGraphic" stdDeviation="9" result="b"></feGaussianBlur>
                                                    <feColorMatrix in="b" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 24 -10"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g filter="url(#mg-goo-{{ $m }})">
                                                <g class="mg-stem-c"><g class="mg-stem-in"><rect class="mg-fill" x="74" y="56" width="46" height="196" rx="23"></rect></g></g>
                                                <g class="mg-drip"><circle class="mg-fill" cx="97" cy="72" r="11"></circle></g>
                                                <g class="mg-ring-c"><g class="mg-ring-in"><circle class="mg-ring" cx="146" cy="120" r="52"></circle></g></g>
                                                <g class="mg-orb">
                                                    @foreach ([[0, 1, 146, 20, 13, '3s'], [-0.866, -0.5, 232.6, 170, 12, '3.4s'], [0.866, -0.5, 59.4, 170, 11, '3.8s']] as $k => [$ix, $iy, $cx, $cy, $r, $period])
                                                        <g class="mg-drop-in" style="--ix: {{ $ix }}; --iy: {{ $iy }}; --k: {{ $k }}"><g class="mg-burst"><g class="mg-pull"><g class="mg-bob" style="--p: {{ $period }}"><circle class="mg-fill" cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $r }}"></circle></g></g></g></g>
                                                    @endforeach
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="mg-word">@foreach (str_split('protocol') as $i => $l)<span class="ltr{{ $l === 'o' ? ' o' : '' }}" style="--i: {{ $i }}">{{ $l }}</span>@endforeach</span>
                                    </button>
                                    @break

                                @case('combination')
                                    <button type="button" class="logo cb-logo" aria-label="Play the Combination logo animation, {{ $m }} mode">
                                        <span class="cb-stage" aria-hidden="true" style="display: block">
                                            <span class="cb-row">
                                                @foreach (str_split('PROTOCOL') as $i => $l)
                                                    <span class="cb-win" style="--i: {{ $i }}; --s: {{ -(720 + $i * 144) }}; --hv: {{ [14, -12, 16, -10, 13, -15, 11, -13][$i] }}"><span class="cb-c"><span class="cb-h"><span class="cb-in"><span class="cb-id">@for ($f = 0; $f < 10; $f++)<span class="cb-face" style="--f: {{ $f }}">{{ $alphabet[(array_search($l, $alphabet) + ($f <= 4 ? $f : $f - 10) + 26) % 26] }}</span>@endfor</span></span></span></span><span class="cb-shade"></span><span class="cb-tick"></span></span>
                                                @endforeach
                                                <span class="cb-frame"></span>
                                                <span class="cb-rail cb-rail-l"></span>
                                                <span class="cb-rail cb-rail-r"></span>
                                            </span>
                                        </span>
                                    </button>
                                    @break
                            @endswitch

                            <button type="button" class="replay">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 3-6.7"></path><path d="M3 4v5h5"></path></svg>
                                <span>Replay intro</span>
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="details">
                    <div class="card">
                        <h3>Favicon</h3>
                        <div class="tabbar light">
                            <div class="tab"><span class="fav" style="{{ $vars($c['icons']['light']) }}">{!! $mark[$c['id']]($c['id'].'-tl') !!}</span><span class="t">Protocol.com</span><span class="x" aria-hidden="true">×</span></div>
                        </div>
                        <div class="tabbar dark">
                            <div class="tab"><span class="fav" style="{{ $vars($c['icons']['dark']) }}">{!! $mark[$c['id']]($c['id'].'-td') !!}</span><span class="t">Protocol.com</span><span class="x" aria-hidden="true">×</span></div>
                        </div>
                        <div class="sizes">
                            @foreach (['light', 'dark'] as $m)
                                <div class="grp {{ $m }}" style="{{ $vars($c['icons'][$m]) }}">
                                    @foreach ([16, 32, 48] as $s)
                                        <div class="sz"><span style="width: {{ $s }}px; height: {{ $s }}px; display: block">{!! $mark[$c['id']]($c['id'].'-s'.$m.$s) !!}</span>{{ $s }}px</div>
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
                                    <div class="app" style="{{ $vars($c['icons'][$k]) }}">{!! $mark[$c['id']]($c['id'].'-a'.$k) !!}</div>
                                    {{ $label }}
                                </div>
                            @endforeach
                        </div>
                        <div class="apps-row" aria-label="Smaller sizes">
                            @foreach (['light', 'dark', 'brand'] as $k)
                                <div class="app sm" style="{{ $vars($c['icons'][$k]) }}">{!! $mark[$c['id']]($c['id'].'-m'.$k) !!}</div>
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
            <p>Let us know the number of the direction you prefer. Elements can be combined — one direction’s mark with another’s motion, type or colour — before the identity is finalised.</p>
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
<script>
(function () {
  function bindLogo(logo) {
    var n = 0;
    logo.addEventListener('click', function () {
      n++;
      logo.classList.remove('ca', 'cb');
      logo.classList.add(n % 2 ? 'ca' : 'cb');
    });
  }

  // Intros wait until the logo is on screen, so lower sections aren't finished before they're seen.
  var io = 'IntersectionObserver' in window ? new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) { e.target.classList.add('play'); io.unobserve(e.target); }
    });
  }, { threshold: 0.35 }) : null;

  function watch(logo) { io ? io.observe(logo) : logo.classList.add('play'); }

  document.querySelectorAll('.logo').forEach(function (logo) { bindLogo(logo); watch(logo); });

  // Replay: swapping in a fresh clone restarts every CSS animation from zero.
  document.querySelectorAll('.replay').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var old = btn.closest('.stage').querySelector('.logo');
      var fresh = old.cloneNode(true);
      fresh.classList.remove('ca', 'cb');
      fresh.classList.add('play');
      old.replaceWith(fresh);
      bindLogo(fresh);
    });
  });
})();
</script>
@endverbatim
</body>
</html>
