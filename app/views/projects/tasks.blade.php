@extends('master')

@section('tasks')
	<h2>
		{{ $project['name'] }}
	</h2>

	@if ( $project['note'] )
		<p>
			{{ $project['note'] }}
		</p>
	@endif

	<form class="task-new">
		<input type="text" placeholder="Add New Task...">
	</form>
	<ul class="task-list list">
		@foreach ( $tasks as $task )
			<li>
				<a href="#">
					{{ $task['name'] }}
				</a>
			</li>
		@endforeach
	</ul>
@endsection