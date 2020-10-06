<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelperRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helper_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('payroll_id')->unsigned();
            $table->string('trip');
            $table->string('cargo');
            $table->integer('rate');
            $table->integer('cashadvance')->nullable();
            $table->date('datetrip');
            $table->date('datecashadvance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('helper_rates');
    }
}
