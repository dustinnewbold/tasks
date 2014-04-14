<!DOCTYPE html>
<html>
	<head>
		<title>
			Test
		</title>

		<link rel="stylesheet" href="/css/main.css"/>
	</head>
	<body>
		<header role="banner">
			<h1>
				<a href="/">
					Tasks
				</a>
			</h1>
			<nav role="navigation">
				Welcome, {{ Auth::user()['full_name'] }}
			</nav>
		</header>

		<div class="container">
			<div class="sections">
				<section class="projects">
					<h2>
						Projects
					</h2>
					<form class="project-new">
						<input type="text" placeholder="Add New Project...">
					</form>
					<ul class="project-list list">
						@foreach ( $projects as $project )
							<li>
								<a href="/projects/{{ $project['id'] }}/tasks">
									{{ $project['name'] }}
								</a>
							</li>
						@endforeach
					</ul>
				</section>
				<section class="tasks">
					@yield('tasks')
				</section>
				<section class="info">
					@yield('info')
				</section>
			</div>
		</div>
	</body>
</html>