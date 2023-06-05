<?php

namespace Database\Seeders;

use App\Models\payment;
use App\Models\Userb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userbs = Userb::factory(20)->create();

        foreach($userbs as $userb)
        {
            $userb->payment()->attach( Userb::all()->random()->id,[
                'payment_id'=>payment::all()->random()->payment_id
            ]);
        }
    }
}
