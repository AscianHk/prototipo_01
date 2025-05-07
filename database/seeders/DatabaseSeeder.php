<?php

namespace Database\Seeders;

use App\Models\User;
use CredentialsSeeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
    
        DB::table('credentials')->insert([
            'name' => 'Juan',
            'surname' => 'Perez',
            'user_id' => 1,
            'Puesto' => 'Personal',
            'Fecha_Nacimiento' => '1999-12-12',
        ]);


        DB::table('credentials')->insert([
            'name' => 'Jose',
            'surname' => 'Mendez',
            'user_id' => 2,
            'Puesto' => 'Ciudadano',
            'Fecha_Nacimiento' => '1999-12-12',
        ]);
        
        DB::table('users')->insert([
            'SIP' => '123456',
        ]);
        DB::table('users')->insert([
            'SIP' => '654321',
        ]);

        // Insert 10 entries into the 'citas' table
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('citas')->insert([
            'user_id' => User::inRandomOrder()->first()->id,
            'centros_id' => User::inRandomOrder()->first()->id,
            'Dia' => $faker->date,
            'Hora' => $faker->time,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('centros')->insert([
            'Centro' => $faker->city(),
            'CP' => $faker->postcode,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }    
}
   

