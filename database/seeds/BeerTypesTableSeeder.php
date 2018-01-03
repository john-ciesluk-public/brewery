<?php

use Illuminate\Database\Seeder;

class BeerTypesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $types = ['seasonal','signature','experimental'];

        for ($i=0;$i<3;$i++) {

            DB::table('beer_types')->insert([
                'type' => $types[$i]
            ]);
        }
    }
}
