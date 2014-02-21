<?php

class Buildingregister extends Eloquent {
	public function dataset () {
		return $this->belongsTo('Dataset');
	}

	public function scopeActiveds ($query,$ds) {
		return $query	->whereDataset_id($ds)
						->orderBy('datereading')
						->orderBy('timereading')
		;
	}

	public function scopeExistent ($query,$date,$time,$dataset) {
		return $query	->whereDatereading($date)
						->whereTimereading($time)
						->whereDataset_id($dataset)
						->orderBy('datereading')
						->orderBy('timereading')
		;
	}

	public function scopeMindate ($query,$ds) {
		return $query	->whereDataset_id($ds)
						->min('datereading')
		;
	}

	public function scopeMaxdate ($query,$ds) {
		return $query	->whereDataset_id($ds)
						->max('datereading')
		;
	}
	
	


	protected $guarded = array();

	public static $rules = array();
}
