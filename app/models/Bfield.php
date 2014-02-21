<?php

class Bfield extends Eloquent {

	public function chart () {
		return $this->belongsToMany('Chart');
		
	}

	public function scopeDisplay ($query) {
		return $query->whereDisplay(1);
	}

	
	protected $guarded = array();

	public static $rules = array();
}
