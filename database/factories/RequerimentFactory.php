<?php

namespace Database\Factories;

use App\Models\Requeriment;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequerimentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Requeriment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence()
        ];
    }
}
