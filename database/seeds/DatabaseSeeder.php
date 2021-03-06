<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AllyTableSeeder::class);
        // $this->call(AllySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ProyectSeeder::class);
        $this->call(MemberSeeder::class);
    }
}
