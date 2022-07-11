<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->colorName,
            "bandwidth" => $this->faker->randomNumber(4),
            "user_price" => $this->faker->randomNumber(3),
            "reseller_price" => $this->faker->randomNumber(3),
        ];
    }
}
