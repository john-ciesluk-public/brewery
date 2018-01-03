<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AboutTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('about')->insert([
            'description' => '<p class="header-text" align="justify">We are thinkers.  Many years have passed while we\'ve come up with good ideas and bad ideas.
            With these ideas and the work surrounding them we\'ve gathered all of the necessary experience to create a great idea together.  All it
            took was a week of thinking about a brewery to realize this is the culmination of our life experiences in one perfect dream.</p>
            <p class="header-text" align="justify">The Deer House is born.  We\'ve spent countless hours reading about brewing water, hops, malt, yeast; learning recipes,
            drinking beer, and figuring out all the tiny details you would never know existed and didn\'t want to know.  We\'ve toured breweries and sampled
            beers.  We discovered what makes beer good and bad and what to avoid and what to do every time.  We\'ve cleaned vents and growlers, tubes and pipes,
            and everything in between.  We\'ve arranged chairs and tables, put posters up and taken them down, just looking for a way to get everything just right.</p>
            <p class="header-text" align="justify">And in the end, we\'ve put together a few good beers with the knowledge to make many more.  From our tap to your glass.
            -- The Deer House</p>'
        ]);
    }
}
