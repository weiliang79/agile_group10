<?php

namespace Database\Factories;

use App\Models\Parcel;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcel>
 */
class ParcelFactory extends Factory
{
    protected $model = Parcel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tracking_number' => "P00000000",
            'weight' => $this->faker->numerify('##'),
            'sender_id' => 3,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->postcode(),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->postcode(),
            'recipient_phone' => $this->faker->phoneNumber(),
            'status' => Parcel::STATUS_NOT_PICK_UP,
        ];
    }
}
