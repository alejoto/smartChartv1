<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingregistersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buildingregisters', function(Blueprint $table) {
			$table->increments('id');
			$table->date('datereading');
			$table->time('timereading');
			$table->integer('dataset_id');
			$table->tinyinteger('a01OM');
			$table->decimal('a02OAT',4,1);
			$table->decimal('a03ZT',4,1);
			$table->string('a04ZONE');
			$table->decimal('a05ConskWH',3,0);
			$table->decimal('b01ZRVS',3,0);
			$table->decimal('b02DAT',4,1);
			$table->decimal('b03DATSP',4,1);
			$table->decimal('b04DSP',3,1);
			$table->decimal('b05DSPSP',3,1);
			$table->decimal('b06MAT',4,1);
			$table->decimal('b07OADPS',3,0);
			$table->decimal('b08OAF',3,0);
			$table->decimal('b09RAT',4,1);
			$table->decimal('b10SFSpd',4,0);
			$table->tinyinteger('b11SFS');
			$table->decimal('b12VAVDPSP',3,0);
			$table->decimal('b13ZDPS',3,0);
			$table->decimal('c01HCVS',3,0);
			$table->decimal('c02HWLDP',3,1);
			$table->decimal('c03HWLDPSP',3,1);
			$table->decimal('c04HWRT',4,1);
			$table->decimal('c05HWST',4,1);
			$table->decimal('c06HWSTSP',4,1);
			$table->decimal('d01ChWLDP',3,1);
			$table->decimal('d02ChWLDSP',3,1);
			$table->decimal('d03ChWRT',4,1);
			$table->decimal('d04ChWST',4,1);
			$table->decimal('d05ChWSTSP',4,1);
			$table->decimal('d06CCV',3,0);
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
		Schema::drop('buildingregisters');
	}

}
