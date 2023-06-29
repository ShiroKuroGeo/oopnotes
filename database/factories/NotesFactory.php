<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\note>
 */
class NotesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['Read', 'Unread'];
        $ids = [1, 10];
        return [
            'title' => $this->faker->title(),
            'subject' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement($status),
        ];
    }
}
