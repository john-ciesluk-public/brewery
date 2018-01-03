<?php

use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('home')->insert([
            'description' => '<div class="header-text"><p align="justify">What makes us passionate?  The pursuit of perfection with a touch of overachievement. We taste every beer at every step of the brewery process to ensure that they are consistently up to our standards.  If something tastes a little off we toss it and start over, because in the end, you deserve a consistently good beer.</p><p align="justify">When you walk in the door of our brewery you will be greeted by a professional brewmaster who is available for all of your questions.  Not only do we provide an excellent line of craft brews, but we also provide you with excellent service.</p><p align="justify">Our brewhouse has been designed for your enjoyment.  From the messages on the walls to the chairs by the bar, we want every step of your journey to be etched in your memory. We have regular events for your entertainment and an occasional eccentric moment that earns you a freebie to keep you on your toes.  We hope that not only is your first visit enjoyable but every visit is.</p><p align="justify">Our goal is to make every beer perfect, or just beyond. -- <i>The Deer House</i></p></div>'
        ]);
    }
}
