<?php

use Cook\Repositories\Interfaces\TaskRepositoryInterface;
use Cook\Repositories\Interfaces\ProjectRepositoryInterface;

class TaskController extends \BaseController {

	private $projects;
	private $tasks;

	public function __construct(ProjectRepositoryInterface $projects, TaskRepositoryInterface $tasks) {
		$this->projects = $projects;
		$this->tasks = $tasks;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($project_id)
	{
		$project = $this->projects->find($project_id);
		$tasks = $this->tasks->all($project_id);
		return View::make('projects.tasks', compact('project', 'tasks'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
	public function show($project_id, $id)
	{
		return Task::where('project_id', '=', $project_id)->where('id', '=', $id)->get();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
