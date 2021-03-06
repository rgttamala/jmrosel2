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
        $this->call([AdminSeeder::class]);
        $this->call([RoleSeeder::class]);
        $this->call([RoleUserSeeder::class]);
        $this->call([ScheduleSeeder::class]);
        $this->call([RateSeeder::class]);
    }
}
