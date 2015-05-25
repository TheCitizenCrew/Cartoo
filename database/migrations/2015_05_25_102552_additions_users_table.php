<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('first_name');
			$table->string('last_name');
			$table->string('profile_image');			
			$table->string('locale');
			$table->string('gender');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->removeColumn('first_name');
			$table->removeColumn('last_name');
			$table->removeColumn('profile_image');			
			$table->removeColumn('locale');
			$table->removeColumn('gender');
		});
	}

}
