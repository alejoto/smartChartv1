<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddA07kWusageToBuildingregistersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('buildingregisters', function(Blueprint $table) {
			$table->integer('a07kWusage');
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
			$table->dropColumn('a07kWusage');
		});
	}

}
