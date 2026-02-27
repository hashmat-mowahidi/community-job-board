<?php

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;

test('user can update their own Listings', function () {

    $user = User::factory()->create();
    $tag = Tag::factory()->create();
    $listing = Listing::factory()->create(['user_id' => $user->id, 'title' => 'Old Data']);
    $listing->tags()->attach($tag);

    $this->actingAs($user)
        ->put("/listings/{$listing->slug}", [
            'title' => 'New title',
            'company_name' => 'New company name',
            'description' => 'New description',
            'location' => 'remote',
            'salary' => '10k',
            'website' => 'http://www.google.com',
            'email' => 'exampl@gmail.com',
            'tags' => 'php, laravel'
        ])->assertRedirect("/listings/{$listing->slug}");

    expect($listing->fresh()->title)->toBe('New title');
});


test('users cannot update listings they do not own', function () {
    $owner = User::factory()->create();
    $stranger = User::factory()->create();
    $listing = Listing::factory()->create(['user_id' => $owner->id]);

    // 2. Act: Log in as the STRANGER and try to update the OWNER'S listing
    $response = $this->actingAs($stranger)
        ->put("/listings/{$listing->slug}", [
            'title' => 'I am a stranger',
            'company_name' => 'New company name',
            'description' => 'New description',
            'location' => 'remote',
            'salary' => '10k',
            'website' => 'http://www.google.com',
            'email' => 'exampl@gmail.com',
            'tags' => 'php, laravel'
        ]);

    $response->assertForbidden();

    expect($listing->fresh()->title)->not->toBe('I am a stranger');
});
