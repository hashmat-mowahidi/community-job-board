<?php

/** @var Tests\TestCase $this */

use App\Models\Listing;

test('users can search for listings by title', function () {

    Listing::factory()->create(['title' => 'Laravel Developer']);
    Listing::factory()->create(['title' => 'React Consultant']);
    $response = $this->get('/?search=laravel');

    $response->assertOk();
    $response->assertSee('Laravel Developer');
    $response->assertDontSee('React Consultant');
});

test('searching for non-existent job returns a "no result" message', function () {

    $this->get('/?search=Astronaut')
        ->assertOk()
        ->assertSee('No jobs found');
});
