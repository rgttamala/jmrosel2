<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('helpers', function (Blueprint $table) {
            $table->string('helpername')->after('id');
            $table->string('sss')->after('helpername');
            $table->string('philhealth')->after('sss');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('helpers', function (Blueprint $table) {
            //
        });
    }
}