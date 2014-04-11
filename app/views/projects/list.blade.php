<DOCTYPE !html>
<html>
	<head>
		<title>
			Projects
		</title>

		<link rel="stylesheet" href="/css/main.css"/>
	</head>
	<body>
		<ul>
			@foreach ( $projects as $project )
				<li>
					<a href="{{ url('/projects/' . $project['id']) }}/tasks">
						{{ $project['name'] }}
					</a>
				</li>
			@endforeach
		</ul>
	</body>
</html>