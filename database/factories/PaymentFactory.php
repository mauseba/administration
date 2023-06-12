<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_id'=>Str::random(10),
            'amount'=>fake()->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'statup'=>fake()->randomElement($array = array(1,2)),
            'date'=>fake()->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
