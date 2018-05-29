<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('betitems', function ($table) {
            $table->increments('id');
            $table->integer('amounts');
            $table->unsignedInteger('teamid');
            $table->unsignedInteger('betid');
            $table->foreign('betid')->references('id')->on('bets');
            $table->foreign('teamid')->references('id')->on('teams');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
