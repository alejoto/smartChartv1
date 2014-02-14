<?php

class Temporaluser extends Eloquent {

	public function dataset () {
		return $this->hasMany('Dataset','user_id')
		;
	}
	protected $guarded = array();

	public static $rules = array();
}
