<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Userb;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Userb>
 */
class UserbFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'Nom'=> fake()->lastName(),
            'Prenom'=> fake()->firstName($gender ='male'|'female'),
            'Ville'=> fake()->city(),
            'Province'=> fake()->state(),
            'CodePostal'=> fake()->postcode(),
            'Telephone'=> fake()->tollFreePhoneNumber(),
            'Courriel'=> fake()->email(),
            'Adresse'=> fake()->streetAddress(),
            'Langue'=> fake()->randomElement($array = array('Esp' ,'Eng', 'Fre')),
            'EtatMatrimonial'=>fake()->randomElement($array = array('single','married')),
            'StatutCanada'=>fake()->randomElement($array = array('student','refugee','resident')),
            'DateNaiss'=>fake()->date($format = 'Y-m-d', $max = '2000-12-31'),
            'Pays'=>fake()->country(),
            'Genre'=>fake()->randomElement($array = array('M','F','O')),
            'Menage'=>fake()->word(),
            'status'=>fake()->randomElement($array = array(1,2)),
            'Revenu' =>fake()->numberBetween($min = 1000, $max = 9000), // 8567
            'Type_logement' =>fake()->word(),
            'Q1'=>fake()->randomElement($array = array('OUI','NO')),
            'Q2'=>fake()->randomElement($array = array('OUI','NO')),
            'Q3'=>fake()->randomElement($array = array('OUI','NO')),
            'Q4'=>fake()->randomElement($array = array('OUI','NO')),
            'Q5'=>fake()->randomElement($array = array('OUI','NO'))
        ];
    }
}
