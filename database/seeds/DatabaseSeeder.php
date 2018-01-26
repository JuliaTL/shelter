<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Kind_of_animals_Seeder::class);
         $this->call(AnimalsSeeder::class);
    }
}
