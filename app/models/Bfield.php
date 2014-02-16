<?php

class Bfield extends Eloquent {

	public function scopeDisplay ($query) {
		return $query->whereDisplay(1);
	}
	protected $guarded = array();

	public static $rules = array();
}
