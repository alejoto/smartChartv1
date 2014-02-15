<?php

class Buildingregister extends Eloquent {
	public function dataset () {
		return $this->belongsTo('Dataset');
	}
	protected $guarded = array();

	public static $rules = array();
}
