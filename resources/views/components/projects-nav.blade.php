<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{route('home')}}">Portfolio</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
		        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav bg-light">
				<li class="nav-item">
					<a class="nav-link @if(request()->is('projects')) active @endif" aria-current="page"
					   href="{{route('projects.index')}}">Overzicht
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @if(request()->is('projects/create')) active @endif" href="{{route('projects.create')}}">
						Nieuw project +
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
