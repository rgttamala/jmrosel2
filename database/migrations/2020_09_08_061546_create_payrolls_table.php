<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->date('dateissued')->nullable();
            $table->date('payperiodstart')->nullable();
            $table->date('payperiodend')->nullable();
            $table->string('workedhours')->nullable();
            $table->integer('cashadvance')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('sss')->nullable();
            $table->integer('philhealth')->nullable();
            $table->integer('deductions')->nullable();
            $table->string('deductionremarks');
            $table->integer('subtotal')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
