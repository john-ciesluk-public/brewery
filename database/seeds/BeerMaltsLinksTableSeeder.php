<?php

use Illuminate\Database\Seeder;

class BeerMaltsLinksTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        for ($i=0;$i<5;$i++) {

            DB::table('beer_malts_links')->insert([
                'beers_id' => rand(1,5),
                'beer_malts_id' => rand(1,5)
            ]);
        }
    }
}
