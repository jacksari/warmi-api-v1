<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Level;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['BORRADOR', 'REVISION', 'PUBLICADO']),
            'slug' => Str::slug($title),
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'video' => 'TM1vPMJ2LR4',
            'image' => 'https://elcomercio.pe/resizer/AB93Kg1JoITGLMLkCgLBnVzg_7g=/980x528/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/37OWRM2CLBAE7BP5SXKLVMNHZE.jpg'
        ];
    }
}
