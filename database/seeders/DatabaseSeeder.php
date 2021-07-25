<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Auguste',
            'email' => 'abagdzeviciute@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Barsukas',
            'email' => 'barsukas@gmail.com',
            'password' => Hash::make('123'),
        ]);

        foreach(range(1, 20) as $_) {

            DB::table('mechanics')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
            ]);
        }

        $maker = ['Volvo', 'Audi', 'Toyota', 'Peugot'];
        foreach(range(1, 200) as $_) {

            DB::table('trucks')->insert([
                'maker' => $maker[rand(0, count($maker) -1)],
                'plate' => rand(2, 9),
                'make_year' => rand(2, 9),
                'mechanic_notices' => $faker->realText(300, 5),
                'mechanic_id' => rand(1, 20), 
            ]);
        }
    }
}