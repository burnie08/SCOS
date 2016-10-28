<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_card_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('skill_card_id')
                ->references('id')
                ->on('skill_cards')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skills');
    }
}
