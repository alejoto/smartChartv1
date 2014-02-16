<?php

class Buildingregister extends Eloquent {
	public function dataset () {
		return $this->belongsTo('Dataset');
	}

	public function scopeActiveds ($query,$ds) {
		return $query->whereDataset_id($ds)
				->orderBy('datereading')
				->orderBy('timereading')
		;
	}

	public function scopeExistent ($query,$date,$time,$dataset) {
		return $query	->where('datereading','=',$date)
						->where('timereading','=',$time)
						->where('dataset_id','=',$dataset)
		;
	}
	protected $guarded = array();

	public static $rules = array();
}
