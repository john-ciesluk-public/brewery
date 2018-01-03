<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('config')->insert([
            'email' => 'deer.house@example.com',
            'company' => 'The Deer House',
            'address_title' => 'The Deer House LLC',
            'address_line1' => '123 Example Ave',
            'address_line2' => '',
            'address_city' => 'San Francisco',
            'address_state' => 'CA',
            'address_zipcode' => '12345',
            'address_phone' => '(123) 456-7890',
            'enable_registration' => 1,
        ]);
    }
}
