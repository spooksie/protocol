<?php

it('renders the brand review page with the five directions', function () {
    $this->get('/brand-review')
        ->assertOk()
        ->assertSee('Five directions for the Protocol identity.')
        ->assertSeeInOrder(['Stack', 'First Leaf', 'Interference', 'Merge', 'Combination'])
        ->assertSee('https://qquantum.ai', false);
});

it('keeps the brand review page out of search engines', function () {
    $response = $this->get('/brand-review');

    expect($response->headers->get('X-Robots-Tag'))->toContain('noindex')
        ->and($response->getContent())->toContain('<meta name="robots" content="noindex');
});

it('wires every logo for hover, click and replay', function () {
    $html = $this->get('/brand-review')->getContent();

    // Two stages (light + dark) per direction, each with a clickable logo and a replay button.
    expect(substr_count($html, '<button type="button" class="logo '))->toBe(10)
        ->and(substr_count($html, '<button type="button" class="replay">'))->toBe(10)
        ->and($html)->toContain("logo.classList.add(n % 2 ? 'ca' : 'cb')")
        ->and($html)->toContain("e.target.classList.add('play')");
});

it('gives each mode its own pattern and filter ids', function () {
    $html = $this->get('/brand-review')->getContent();

    foreach (['if-la-light', 'if-la-dark', 'mg-goo-light', 'mg-goo-dark'] as $id) {
        expect(substr_count($html, 'id="'.$id.'"'))->toBe(1);
    }
});
