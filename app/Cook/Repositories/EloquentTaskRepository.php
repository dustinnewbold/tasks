<?php namespace Cook\Repositories;

use Cook\Repositories\Interfaces\TaskRepositoryInterface;
use Task;
use Project;

class EloquentTaskRepository implements TaskRepositoryInterface {
	/**
	 * Get all tasks by project
	 *
	 * @param int $project_id
	 */
	public function all()
	{
		$projects = Project::all();
		foreach ( $projects as &$project ) {
			// Get parent tasks
			$tasks = Task::with('comments', 'comments.user')->where('project_id', '=', $project['id'])->whereNull('task_id')->get()->toArray();

			foreach ( $tasks as &$task ) {
				$task['tasks'] = $this->get_sub_tasks($task['id']);
				unset($task['task_id']);
			}
			
			$project['tasks'] = $tasks;
		}
		return $projects;

	}

	/**
	 * Get all subtasks for a single task
	 *
	 * @param int $id Task ID
	 */
	private function get_sub_tasks($id) {
		$subtasks = Task::with('comments', 'comments.user')->where('task_id', '=', $id)->get()->toArray();

		foreach ( $subtasks as &$subtask ) {
			$subtask['tasks'] = $this->get_sub_tasks($subtask['id']);
			unset($subtask['task_id']);
		}

		return $subtasks;
	}

	/**
	 * Provides a flat list of tasks, rather than hierarchical
	 *
	 * @param int $project_id
	 */
	public function tasks_flat() {
		$tasks = Task::all()->toArray();

		return $tasks;
	}
}