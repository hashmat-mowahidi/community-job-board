<?php

use App\Models\Listing;
use App\Models\Tag;

test('user can filter listings by tag', function () {

    $frontendTag = Tag::factory()->create(['name' => 'Frontend', 'slug' => 'frontend']);
    $backendTag = Tag::factory()->create(['name' => 'Backend', 'slug' => 'backend']);

    $frontendJob = Listing::factory()->create(['title' => 'Vue.js job']);
    $backendJob = Listing::factory()->create(['title' => 'PHP job']);

    $frontendJob->tags()->attach($frontendTag);
    $backendJob->tags()->attach($backendTag);

    $response = $this->get('/?' . http_build_query(['tag' => [$frontendTag->slug]]));

    $response->assertOk();
    $response->assertSee($frontendJob->title);
    $response->assertDontSee($backendJob->title);
});
