<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'slug' => '8 Hours',
            'time_in' => '08:00:00',
            'time_out' => '17:00:00',
            ]);
    }
}
