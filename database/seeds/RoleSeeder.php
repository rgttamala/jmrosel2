<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            array(
                'slug' => "admin",
                'name' => "Administrator",
                'permissions' => "", 
            ),
            array(
                'slug' => "emp",
                'name' => "Employee",
                'permissions' => "", 
            )
            ));
    }
}

