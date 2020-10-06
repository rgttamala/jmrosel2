<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::create('checks', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('workedhours')->unsigned();
            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('checks');
    }
}
