<?php

class Comment extends Eloquent {
	protected $hidden = array('task_id', 'user_id');

	public function user() {
		return $this->belongsTo('User');
	}
}