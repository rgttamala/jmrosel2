<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalaryFrequencyToRatesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->integer('salary')->after('philhealth');
            $table->string('frequency')->after('philhealth');
        }); 
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rates_tbl', function (Blueprint $table) {
            //
        });
    }
}
