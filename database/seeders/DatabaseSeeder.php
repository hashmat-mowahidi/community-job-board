<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tags = Tag::factory(20)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'password' => bcrypt(env('SEEDER_PASSWORD', 'password')),
        ]);

        Listing::factory(10)->create(
            ['user_id' => $user->id]
        )->each(function ($listing) use ($tags) {
            $listing->tags()->attach(
                $tags->random(rand(2, 4))->pluck('id')->toArray()
            );
        });

        $employers = User::factory(5)->create();
        Listing::factory(20)->create(
            ['user_id' => $employers->random()->id]
        )->each(function ($listing) use ($tags) {
            $listing->tags()->attach(
                $tags->random(rand(2, 4))->pluck('id')->toArray()
            );
        });
    }
}
