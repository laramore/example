<?php

namespace Database\Factories;

use App\Models\User;
use Laramore\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return null
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
