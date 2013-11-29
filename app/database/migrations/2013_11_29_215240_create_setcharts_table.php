<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSetchartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('setcharts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('mscol');
			$table->string('axislocation');
			$table->string('descriptcol');
			$table->string('charttype');
			$table->string('leftaxisdesc');
			$table->string('rightaxisdesc');
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
		Schema::drop('setcharts');
	}

}
