<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('traveldate');
            $table->integer('cargo_id')->unsigned();
            $table->string('docs');
            $table->string('trucking');
            $table->string('platenumber')->nullable();
            $table->string('client_partial')->nullable();
            $table->decimal('client_partial_amount')->nullable();
            $table->date('client_partial_date')->nullable();
            $table->string('client_full')->nullable();
            $table->decimal('client_full_amount')->nullable();
            $table->date('client_full_date')->nullable();
            $table->decimal('client_rate')->nullable();
            $table->decimal('client_balance')->nullable();
            $table->string('subcon_partial')->nullable();
            $table->decimal('subcon_partial_amount')->nullable();
            $table->date('subcon_partial_date')->nullable();
            $table->string('subcon_full')->nullable();
            $table->decimal('subcon_full_amount')->nullable();
            $table->date('subcon_full_date')->nullable();
            $table->decimal('subcon_balance')->nullable();
            $table->decimal('subcon_rate');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
