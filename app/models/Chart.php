<?php

class Chart extends Eloquent {

	public function chapter () {
		return $this->belongsTo('Chapter');
	}
	protected $guarded = array();

	public static $rules = array();
}
