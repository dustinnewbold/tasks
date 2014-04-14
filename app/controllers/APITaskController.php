<?php

use Cook\Repositories\Interfaces\TaskRepositoryInterface;

class APITaskController extends \BaseController {

	private $tasks;

	public function __construct(TaskRepositoryInterface $tasks) {
		$this->tasks = $tasks;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( Input::get('flat') === '' ) {
			return $this->tasks->tasks_flat();
		}

		return $this->tasks->all();
	}

	// Get all sub tasks
	private function get_sub_tasks($id) {
		$subtasks = Task::with('comments', 'comments.user')->where('task_id', '=', $id)->get()->toArray();

		foreach ( $subtasks as &$subtask ) {
			$subtask['subtasks'] = $this->get_sub_tasks($subtask['id']);
			unset($subtask['task_id']);
		}

		return $subtasks;
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
		return Task::with('project', 'parent_task', 'comments', 'comments.user')->where('project_id', '=', $project_id)->where('id', '=', $id)->get();
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
