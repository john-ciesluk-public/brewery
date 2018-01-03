<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BeerHopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $faker = Faker::create();

       for ($i=0;$i<5;$i++) {
          DB::table('beer_hops')->insert([
            'hop' => $faker->sentence(1),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ]);
        }
     }
}
