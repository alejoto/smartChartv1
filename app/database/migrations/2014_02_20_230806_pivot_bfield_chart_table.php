<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotBfieldChartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bfield_chart', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('bfield_id')->unsigned()->index();
			$table->integer('chart_id')->unsigned()->index();
			$table->foreign('bfield_id')->references('id')->on('bfields')->onDelete('cascade');
			$table->foreign('chart_id')->references('id')->on('charts')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bfield_chart');
	}

}
