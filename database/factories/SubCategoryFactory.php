<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->unique()->sentence(1),
            'name_ar' => $this->faker->unique()->sentence(1),
            'status' => 1,
        ];
    }
}
