<?php

it('renders round two with the five 3D directions', function () {
    $this->get('/brand-review/round-2')
        ->assertOk()
        ->assertSee('Five directions for the Protocol mark, built in 3D.')
        ->assertSeeInOrder(['Lattice', 'Swarm', 'Fold', 'Flip wall', 'Fibre'])
        ->assertSee('https://qquantum.ai', false);
});

it('keeps round two out of search engines', function () {
    $response = $this->get('/brand-review/round-2');

    expect($response->headers->get('X-Robots-Tag'))->toContain('noindex')
        ->and($response->getContent())->toContain('<meta name="robots" content="noindex');
});

it('gives every direction a live light and dark stage on a pinned three.js', function () {
    $html = $this->get('/brand-review/round-2')->getContent();

    foreach (['lattice', 'swarm', 'fold', 'flip', 'fibre'] as $id) {
        expect($html)->toContain('data-concept="'.$id.'" data-mode="light"')
            ->and($html)->toContain('data-concept="'.$id.'" data-mode="dark"');
    }

    expect(substr_count($html, '<button type="button" class="hit"'))->toBe(10)
        ->and($html)->toContain('three@0.160.0/build/three.module.js');
});

it('drops brown from the Fold palette', function () {
    $html = $this->get('/brand-review/round-2')->getContent();

    expect($html)->not->toContain('#6E4527')->not->toContain('#E2BF88');
});
