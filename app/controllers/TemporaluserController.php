<?php

class TemporaluserController extends BaseController {

	public function getIndex () {
		$title='Temporal user page';
		$userlink='';
		$user='';
		return View::make('temporaluser.base',compact('title','userlink','user'));
	}

}
