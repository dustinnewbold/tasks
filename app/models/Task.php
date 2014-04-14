<?php

class Task extends Eloquent {
	// protected $hidden = array('project_id');

	public function tasks() {
		return $this->hasMany('Task', 'task_id');
	}

	public function comments() {
		return $this->hasMany('Comment');
	}

	public function project() {
		return $this->belongsTo('Project');
	}

	public function getCompletedAttribute($completed) {
		return (bool) $completed;
	}

	public function getStarredAttribute($completed) {
		return (bool) $completed;
	}
}