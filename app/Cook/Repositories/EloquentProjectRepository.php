<?php namespace Cook\Repositories;

use Cook\Repositories\Interfaces\ProjectRepositoryInterface;
use \Project;

class EloquentProjectRepository implements ProjectRepositoryInterface {
	/**
	 * Returns all projects
	 */
	public function all() {
		return Project::all()->toArray();
	}

	/**
	 * Find project by ID
	 */
	public function find($id) {
		return Project::find($id)->toArray();
	}
}