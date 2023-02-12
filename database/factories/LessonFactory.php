<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            // 'url' => 'https://youtu.be/3G6zwzLYPko',
            // 'time' => $this->faker->randomDigitNotNull(),
            // 'key' => '78701544',
            // 'platform_id' => 1
        ];
    }
}
