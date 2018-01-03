<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $faker = Faker::create();
        $date = Carbon::create(2017,5,28,0,0,0);

        for ($i=0;$i<5;$i++) {

            $title = $faker->sentence(1);
            $date->format('Y-m-d');

            DB::table('events')->insert([
                'title' => $title,
                'description' => $faker->sentence(3),
                'event_date' => $date->addWeeks(rand(1,52))->format('Y-m-d'),
                'slug' => str_slug($title,'_'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted' => '0'
            ]);
        }
    }
}
