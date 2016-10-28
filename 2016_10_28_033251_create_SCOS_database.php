<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScosDatabase extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
         public function up()
         {
            
	    /**
	     * Table: password_resets
	     */
	    Schema::create('password_resets', function($table) {
                $table->string('email', 255);
                $table->string('token', 255);
                $table->timestamp('created_at')->nullable();
                $table->index('password_resets_email_index');
                $table->index('password_resets_token_index');
            });


	    /**
	     * Table: permission_role
	     */
	    Schema::create('permission_role', function($table) {
                $table->increments('permission_id')->unsigned();
                $table->increments('role_id')->unsigned();
                $table->index('permission_role_role_id_foreign');
            });


	    /**
	     * Table: permissions
	     */
	    Schema::create('permissions', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('label', 255)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });


	    /**
	     * Table: proficiency_levels
	     */
	    Schema::create('proficiency_levels', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('short_name', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });


	    /**
	     * Table: role_user
	     */
	    Schema::create('role_user', function($table) {
                $table->increments('role_id')->unsigned();
                $table->increments('user_id')->unsigned();
                $table->index('role_user_user_id_foreign');
            });


	    /**
	     * Table: roles
	     */
	    Schema::create('roles', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('label', 255)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });


	    /**
	     * Table: skill_cards
	     */
	    Schema::create('skill_cards', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });


	    /**
	     * Table: skills
	     */
	    Schema::create('skills', function($table) {
                $table->increments('id')->unsigned();
                $table->integer('skill_card_id')->unsigned();
                $table->string('name', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->index('skills_skill_card_id_foreign');
            });


	    /**
	     * Table: swimmers
	     */
	    Schema::create('swimmers', function($table) {
                $table->increments('id')->unsigned();
                $table->string('first_name', 255);
                $table->string('last_name', 255);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });


	    /**
	     * Table: users
	     */
	    Schema::create('users', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('email', 255);
                $table->string('password', 255);
                $table->string('remember_token', 100)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->index('users_email_unique');
            });


         }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
         public function down()
         {
            
	            Schema::drop('password_resets');
	            Schema::drop('permission_role');
	            Schema::drop('permissions');
	            Schema::drop('proficiency_levels');
	            Schema::drop('role_user');
	            Schema::drop('roles');
	            Schema::drop('skill_cards');
	            Schema::drop('skills');
	            Schema::drop('swimmers');
	            Schema::drop('users');
         }

}