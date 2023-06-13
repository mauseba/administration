<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Userb;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fam>
 */
class FamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NomCom'=>fake()->name($gender = 'male'|'female'),
            'LienP'=>fake()->randomElement($array = array('husband','wife','son','daughter')),
            'Sex'=>fake()->randomElement($array = array('M','F','O')),
            'Age'=>fake()->numberBetween($min = 0, $max = 100),
            'user_id'=>Userb::all()->random()->id
        ];
    }
}
