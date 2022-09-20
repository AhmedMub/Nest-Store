<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->unique()->company(),
            'name_ar' => $this->faker->company(),
            'status' => 1,
            'address' => $this->faker->address(),
            'phone' => $this->faker->numerify('########'),
            'start_date' => $this->faker->date('Y-m-d'),
            'description_en' => $this->faker->paragraph(3),
            'description_ar' => $this->faker->paragraph(3),
            'facebook' => $this->faker->word(),
            'instagram' => $this->faker->word(),
            'twitter' => $this->faker->word(),
        ];
    }
}
