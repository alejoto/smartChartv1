<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddA06kWdemandToBuildingregistersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('buildingregisters', function(Blueprint $table) {
			$table->integer('a06kWdemand');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('buildingregisters', function(Blueprint $table) {
			$table->dropColumn('a06kWdemand');
		});
	}

}
