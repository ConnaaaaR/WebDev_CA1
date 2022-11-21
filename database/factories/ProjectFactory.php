<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'title' => $this->faker->sentence(),
            'text' => $this->faker->paragraph(5),
            'uuid' => $this->faker->uuid(),
            'tags' => 'tag1,tag2,tag3',
            'user_id' => rand(1, 5)

        ];
    }
}
