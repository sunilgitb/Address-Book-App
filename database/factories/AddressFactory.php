<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'title' => $this->faker->name(),
            'contact_name' => $this->faker->name(),
            'contact_number' => $this->faker->phoneNumber(),
            'address_line_1' => $this->faker->address(),
            'address_line_2' => $this->faker->secondaryAddress(),
            'address_line_3' => $this->faker->streetName(),
            'pincode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'is_default_from' => $this->faker->boolean(),
            'is_default_to' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
