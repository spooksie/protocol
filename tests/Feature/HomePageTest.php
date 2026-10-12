<?php

it('renders the landing page with the domain facts and contact details', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Protocol.com is an <em>elite-level</em> .com domain.', false)
        ->assertSee('It is owned by Coherence.com and may be in development.')
        ->assertSee('mailto:team@coherence.com?subject=Domain%20name:%20protocol.com', false)
        ->assertSee('Contact us:')
        ->assertSee('team@coherence.com');
});

it('is indexable and carries structured data for search engines and LLMs', function () {
    $html = $this->get('/')->getContent();

    expect($html)
        ->toContain('<meta name="robots" content="index, follow')
        ->toContain('<link rel="canonical" href="https://protocol.com/">')
        ->toContain('<link rel="alternate" type="text/plain" href="/llms.txt"')
        ->toContain('"@type":"FAQPage"')
        ->toContain('"legalName":"Booth.com Ltd"')
        ->toContain('"publisher":{"@id":"https://coherence.com/#organization"}')
        ->not->toContain('noindex')
        ->not->toContain('"@type":"Product"');

    expect(substr_count($html, '<h1'))->toBe(1);
});

it('navigates as a traceroute through the five hops of the route', function () {
    $this->get('/')
        ->assertSeeInOrder(['href="#handshake"', 'href="#word"', 'href="#routes"', 'href="#questions"', 'href="#delivered"'], false)
        ->assertSee('<b>$</b> traceroute protocol.com', false)
        ->assertSee('aria-controls="trace"', false)
        ->assertSee('<nav aria-label="Route">', false);
});

it('sends the facts as a handshake and sets the word out as a 32-bit header', function () {
    $this->get('/')
        ->assertSeeInOrder(['[SYN]', '[SYN-ACK]', '[ACK]', '[PSH]', '[PSH]', '[FIN]'])
        ->assertSeeInOrder(['bits 0–11', 'Origin', 'bits 12–21', 'Diplomacy', 'bits 22–31', 'Treaties', 'bits 32–49', 'Science &amp; medicine', 'bits 50–63', 'Computing', 'bits 64–95', 'Everyday use'], false);
});

it('routes to twelve industries and answers six questions that drive the FAQ schema', function () {
    $html = $this->get('/')->getContent();

    expect(substr_count($html, '<th scope="row">'))->toBe(12)
        ->and(substr_count($html, '<details'))->toBe(6)
        ->and(substr_count($html, '"@type":"Question"'))->toBe(6)
        ->and($html)->toContain('Healthcare &amp; clinical research')
        ->and($html)->toContain('Is protocol.com one word?');
});

it('renders every logo from one drawing with the same intro and click', function () {
    $html = $this->get('/')->getContent();

    expect(substr_count($html, 'class="mk '))->toBe(3)
        ->and(substr_count($html, 'class="mk-svg"'))->toBe(3)
        ->and($html)->toContain("m.classList.add(n % 2 ? 'ca' : 'cb')")
        ->and($html)->toContain(".mk.play .e{animation:mk-draw")
        ->and($html)->toContain("emit('broadcast', { from: 'logo' })");
});

it('opens in dark mode and switches with the handshake zipper', function () {
    $html = $this->get('/')->getContent();

    expect($html)
        ->toContain("d.dataset.theme = t === 'light' ? 'light' : 'dark';")
        ->toContain('<meta name="theme-color" content="#060A14">')
        ->toContain('data-theme-toggle aria-pressed="true" aria-label="Dark mode"')
        ->toContain("pseudoElement: '::view-transition-new(root)'")
        ->toContain('prefers-reduced-motion:reduce');
});

it('draws the page over one 3D network canvas from a pinned three.js', function () {
    $html = $this->get('/')->getContent();

    expect($html)
        ->toContain('<canvas class="net" id="net" aria-hidden="true"></canvas>')
        ->toContain('https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js')
        ->toContain("html.classList.add('gl-on')");
});

it('keeps the private brand review out of public discovery files', function () {
    foreach (['robots.txt', 'sitemap.xml', 'llms.txt'] as $file) {
        expect(file_get_contents(public_path($file)))->not->toContain('brand-review');
    }

    expect(file_get_contents(public_path('robots.txt')))->toContain('Sitemap: https://protocol.com/sitemap.xml')
        ->and(file_get_contents(public_path('sitemap.xml')))->toContain('<loc>https://protocol.com/</loc>');
});

it('shows the Booth.com Ltd footer with the Coherence and QQuantum credits', function () {
    $this->get('/')
        ->assertSee('Booth.com Ltd. All Rights Reserved.', false)
        ->assertSee('https://qquantum.ai/creative-design', false)
        ->assertSee('Designed &amp; built by', false)
        ->assertSee('https://coherence.com', false)
        ->assertSee('title="Coherence — ethical, human-centred AI across sound, education and consciousness"', false);
});

it('has a 1200x630 social sharing image for link previews', function () {
    $html = $this->get('/')->getContent();

    expect($html)
        ->toContain('<meta property="og:image" content="https://protocol.com/og-image.png">')
        ->toContain('<meta property="og:image:width" content="1200">')
        ->toContain('<meta property="og:image:height" content="630">')
        ->toContain('<meta name="twitter:card" content="summary_large_image">')
        ->toContain('<meta name="twitter:image" content="https://protocol.com/og-image.png">')
        ->toContain('"primaryImageOfPage":{"@type":"ImageObject","url":"https://protocol.com/og-image.png"');

    [$w, $h] = getimagesize(public_path('og-image.png'));
    expect([$w, $h])->toBe([1200, 630]);
});

it('ships the brand icons and replaces the starter page', function () {
    [$w, $h] = getimagesize(public_path('apple-touch-icon.png'));

    expect([$w, $h])->toBe([180, 180])
        ->and(file_get_contents(public_path('favicon.svg')))->toContain('prefers-color-scheme:dark')
        ->and(file_exists(resource_path('views/welcome.blade.php')))->toBeFalse();
});
