<?php

class Dataset extends Eloquent {
	public function temporaluser () {
		return $this->belongsTo('Temporaluser','user_id');
	}

	public function scopeLogged ($query,$user) {
		return $query->where('user_id','=',$user);
	}
	protected $guarded = array();

	public static $rules = array();
}
