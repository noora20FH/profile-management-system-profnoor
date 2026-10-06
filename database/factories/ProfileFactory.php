<?php

namespace Database\Factories;

use App\Domains\Profile\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "title" => fake()->jobTitle(),
            "email" => fake()->unique()->safeEmail(),
            "institution" => fake()->company(),
            "biography" => fake()->paragraphs(3, true),
            "is_active" => true,
        ];
    }
}
