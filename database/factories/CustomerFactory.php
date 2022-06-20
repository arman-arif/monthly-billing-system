<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = new Generator();
        return [
            'name' => $faker->name(),
            'username' $faker->userName(),
            'description',
            'package_id',
            'connection_date'
        ];
    }
}
