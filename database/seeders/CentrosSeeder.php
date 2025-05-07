<?php

namespace Database\Seeders;

use App\Models\centros;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('citas')->insert([
            'Centro' => $faker->city(),
            'CP' => $faker->postcode,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
