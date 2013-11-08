<?php

class ChartsController extends BaseController {
	public function getIndex() {
		return View::make('index')
		->with('title','Home page');
	}

	public function getChapters() {
		$chapter=Chapter::orderBy('id')->get();
		return View::make('charts.chapters')
		->with('chapter',$chapter)
		->with('title','Chapters');
	}

	public function getData() {
		return View::make('charts.data')
		->with('title','Manage data');
	}

	public function getChart() {
		return View::make('charts.base2')
		->with('title','Charts from XML');
	}




	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('charts.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('charts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('charts.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('charts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
