<?php

use Illuminate\Database\Seeder;

class BeerHopsLinksTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        for ($i=0;$i<5;$i++) {

            DB::table('beer_hops_links')->insert([
                'beers_id' => rand(1,5),
                'beer_hops_id' => rand(1,5)
            ]);
        }
    }
}
