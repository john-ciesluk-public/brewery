<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BeerTypesTableSeeder::class);
        $this->call(BeersTableSeeder::class);
        $this->call(BeerHopsTableSeeder::class);
        $this->call(BeerHopsLinksTableSeeder::class);
        $this->call(BeerMaltsTableSeeder::class);
        $this->call(BeerMaltsLinksTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(MailingListsTableSeeder::class);
        $this->call(AboutTableSeeder::class);
        $this->call(EmploymentTableSeeder::class);
        $this->call(HomeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
