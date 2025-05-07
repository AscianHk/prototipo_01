<?php


use Illuminate\Database\Seeder;
use App\Models\Credentials;
use Faker\Factory as Faker;

use function PHPUnit\Framework\isInt;

class CredentialsSeeder extends Seeder
{     
    public function run()
    {
        $faker = Faker::create();


        for ($i = 0; $i < 19; $i++) {
            Credentials::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'Fecha_Nacimiento' => $faker->date,
                'SIP' => $faker->unique()->numerify('#########A'),  //
            ]);
        }

 
        Credentials::create([
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
            'Fecha_Nacimiento' => $faker->date,
            'SIP' => '20958706W',
        ]);
    }
}