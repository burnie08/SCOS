<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
       
        Schema::table('evals', function ($table) {
            $table->foreign('lesson_id')
                ->references('id')
                ->on('lessons')
                ->onDelete('cascade');
        });
        
        Schema::table('lessons', function ($table) {
            $table->foreign('swimmer_id')
                ->references('id')
                ->on('swimmers')
                ->onDelete('cascade');
        });
        
        Schema::table('lessons', function ($table) {
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
        //
    }
}
