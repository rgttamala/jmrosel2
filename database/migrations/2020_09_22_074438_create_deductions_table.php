<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_payroll', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('sss');
            $table->decimal('philhealth');
            $table->date('dateissued');
            $table->date('payperiodstart');
            $table->date('payperiodend');
            $table->integer('deduction');
            $table->string('deductionremarks');
            $table->decimal('totalcashadvance');
            $table->decimal('totalrates');
            $table->decimal('subtotal');
            $table->decimal('totalpayroll');
            $table->integer('driver_id')->unsigned();
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
        Schema::dropIfExists('driver_payroll');
    }
}
