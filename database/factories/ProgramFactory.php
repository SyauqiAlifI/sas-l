<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'slug' => fake()->slug(),
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'category_id' => \App\Models\Category::inRandomOrder()->first()?->id ?? \App\Models\Category::factory(),
            'description' => fake()->paragraph(),
            'duration' => fake()->numberBetween(1, 6) . ' months',
            'type' => fake()->randomElement(['online', 'offline', 'hybrid']),
            'programStart' => fake()->date(),
            'registerDate' => fake()->date(),
            'closedDate' => fake()->date(),
            'is_open' => fake()->boolean(),
            'user_joined' => fake()->numberBetween(0, 1000),
            'rating' => fake()->randomElement(['poor', 'bad', 'neutral', 'good', 'best']),
            'thumbnail' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'country_code' => fake()->countryCode(),
            'discount' => fake()->optional()->numberBetween(10, 50),
            'price' => (string)fake()->numberBetween(1000000, 10000000), // Prices in IDR
        ];
    }
}
