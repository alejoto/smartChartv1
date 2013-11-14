<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeasurementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('measurements', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('data_id');
			$table->integer('user_id');
			$table->timestamp('entered_at');
			$table->timestamp('changed_at');
			$table->date('DATE_READING');
			$table->time('TIME_READING');
			$table->float('ChWLDP');
			$table->float('ChWLDSP');
			$table->float('ChWRT');
			$table->float('ChWST');
			$table->float('ChWSTSP');
			$table->float('CCV');
			$table->float('ConskWH');
			$table->float('DAT');
			$table->float('DATSP');
			$table->float('DSP');
			$table->float('DSPSP');
			$table->float('HCVS');
			$table->float('HWLDP');
			$table->float('HWLDPSP');
			$table->float('HWRT');
			$table->float('HWST');
			$table->float('HWSTSP');
			$table->float('MAT');
			$table->tinyinteger('OM');
			$table->float('OADPS');
			$table->float('OAF');
			$table->float('OAT');
			$table->float('RAT');
			$table->float('SFSpd');
			$table->tinyinteger('SFS');
			$table->float('VAVDPSP');
			$table->float('ZDPS');
			$table->tinyinteger('ZOM');
			$table->float('ZRVS');
			$table->float('ZT');
			$table->string('ZONE');
			$table->string('DAMPER');
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
		Schema::drop('measurements');
	}

}
