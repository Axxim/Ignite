<?php

use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Create Languages
        Schema::create('languages', function($table) {
                $table->increments('id');

                $table->string('short');
                $table->string('full');
                $table->string('endpoint');

                $table->timestamps();
            });

        // Insert Languages
        Language::create(array('short' => 'php', 'full' => 'PHP', 'endpoint' => 'http://hades.run.ignite.io/run.php'));

        // Create Users
        Schema::create('users', function($table) {
                $table->increments('id');

                $table->string('username')->unique();
                $table->string('password');
                $table->string('email')->unique();
                $table->string('api_key', 255);
                $table->integer('group');

                $table->timestamps();
            });

        // Create Documents
        Schema::create('documents', function ($table) {
                $table->string('id')->primary();
                $table->string('name')->nullable();
                $table->text('description')->nullable();
                $table->text('code');

                $table->integer('language_id')->unsigned()->nullable();
                $table->foreign('language_id')->references('id')->on('languages');

                $table->integer('creator_id')->unsigned()->nullable();
                $table->foreign('creator_id')->references('id')->on('users');

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
        Schema::drop('languages');
        Schema::drop('users');
        Schema::drop('documents');
	}

}
