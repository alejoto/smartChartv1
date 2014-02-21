<?php

class Chart extends Eloquent {

	public function chapter () {
		return $this->belongsTo('Chapter');
	}

	public function bfield () {
		return $this->belongsToMany('Bfield');
		;
	}

	protected $guarded = array();

	public static $rules = array();
}
