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
        
       
        // Usamos Faker para generar datos falsos
        // $faker = Faker::create();
        DB::table('credentials')->insert([
            'name' => 'Juan',
            'surname' => 'Perez',
            'user_id' => 1,
            'Fecha_Nacimiento' => '1999-12-12',
        ]);
        
        DB::table('users')->insert([
            'SIP' => '123456',
        ]);

        // Insert 10 entries into the 'citas' table
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('citas')->insert([
            'user_id' => User::inRandomOrder()->first()->id,
            'Centro' => $faker->company,
            'Dia' => $faker->date,
            'Hora' => $faker->time,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }    
}
   

