<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BeersTableSeeder extends Seeder
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

            $title = substr($faker->sentence(2), 0, -1);

            DB::table('beers')->insert([
                'title' => $title,
                'beer_types_id' => rand(1,3),
                'description' => $faker->paragraph,
                'image' => $faker->image,
                'ibu' => rand(1,100),
                'og' => '1.040',
                'abv' => rand(1,10).'%',
                'available' => '1',
                'deleted' => '0',
                'calories' => rand(100,400),
                'slug' => str_slug($title,'_'),
                'pints_sold' => rand(1,1000),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'price' => '5'
            ]);
        }
    }
}
