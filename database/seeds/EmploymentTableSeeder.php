<?php

use Illuminate\Database\Seeder;

class EmploymentTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        DB::table('employment')->insert([
            'description' => '<p class="lead" align="justify">We may not always be hiring, but we are always willing to meet you.  Stop in to find out about future employment.</p>'
        ]);
    }
}
