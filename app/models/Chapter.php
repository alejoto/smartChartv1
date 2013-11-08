<?php

class Chapter extends Eloquent {

	public function chart () {
		return $this->hasMany('Chart');
	}

	protected $guarded = array();

	public static $rules = array();
}
