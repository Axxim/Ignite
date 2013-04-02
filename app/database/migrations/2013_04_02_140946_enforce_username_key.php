<?php

use Illuminate\Database\Migrations\Migration;

class EnforceUsernameKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
            {
                $table->unique('username');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users', function($table)
            {
                $table->dropUnique('username');
            });
	}

}
