<?php

class Dataset extends Eloquent {
	public function temporaluser () {
		return $this->belongsTo('Temporaluser','user_id');
	}

	public function buildingregister () {
		return $this->hasMany('Buildingregister');
	}

	public function scopeLogged ($query,$user) {
		return $query->whereUser_id($user);
	}

	public function scopeRepeated ($query,$user,$ds) {
		return $query	->whereUser_id($user)
						->whereName($ds)
		;
	}
	
	protected $guarded = array();

	public static $rules = array();
}
