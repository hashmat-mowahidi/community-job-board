<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucfirst(fake()->words(rand(6, 10), true));
        $min = fake()->numberBetween(30, 200);
        $max = $min + fake()->numberBetween(5, 25);
        return [
            'title' => $title,
            'company_name' => fake()->company(),
            'location' => fake()->city() . ', ' .  fake()->stateAbbr(),
            'salary' => $min . 'k - ' . $max . 'k',
            'slug' => str()->slug($title) . '-' . rand(1000, 9999),
            'logo' => null,
            'website' => fake()->url(),
            'email' => fake()->safeEmail(),
            'description' => fake()->paragraphs(3, true),
            'created_at' => fake()->dateTimeBetween('-4 months', now()),
            'updated_at' => function (array $attributes) {
                return $attributes['created_at'];
            },
        ];
    }
}
