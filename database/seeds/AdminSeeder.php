<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "JMROSEL",
            'email' => 'jmrosel@admin.com',
            'password' => bcrypt('admin1234'),
            'pin_code' => 1234,
            'rates_id' => 1,
            'permissions' => 'admin',
            'created_at' => '2020-10-06 23:20:25',
            ]);
    }
}
