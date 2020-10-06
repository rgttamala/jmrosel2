<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            'jobdescription' => 'Administrator',
            'sss' => '0',
            'philhealth' => '0',
            'frequency' => 'Monthly',
            'salary' => '0',
            ]);
    }
    
}
