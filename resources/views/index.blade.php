<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

	<!-- Vite Assets -->
	@vite(['resources/css/main.css', 'resources/css/fullview.css', 'resources/js/main.js', 'resources/js/fullview.js'])
</head>
<body class="antialiased">
	<div id="fullview">
		<div id="section1" class="active" data-tooltip="Section 1 Title">
			<div class="glass welcome parallax">
				<h1>Sam's Brandende Portfolio</h1>

				<div class="parallax-inner social-icons">
					<a href="https://github.com/MoosMas" target="_blank">
						<i class="bi bi-github inner"></i>
					</a>
					<a href="https://www.linkedin.com/in/sambrands/" target="_blank">
						<i class="bi bi-linkedin"></i>
					</a>
					<a href="javascript:function(e){e.preventDefault();}">
						<i class="bi bi-envelope-fill"></i>
					</a>
				</div>

			</div>
			<a class="icon-scroll" id="down"></a>
		</div>
		<div id="section2" data-tooltip="Section 2 Title">

		<div id="section2" class="active" data-tooltip="Section 2 Title">
			<div class="container-lg">
				<h2 class="mb-3">Projecten</h2>
				<div class="card-grid p-4 text-dark">
					<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-4">

						@foreach($projects as $project)
							<div class="col">
								<div class="card h-100" style="width: 18rem;">
									@if(count($project->images) > 1)
										<div id="carouselExampleIndicators" class="carousel slide card-img-top"
										     data-bs-ride="true">

											<div class="carousel-indicators">
												@for($i = 0; $i < count($project->images); $i++)
													<button type="button" data-bs-target="#carouselExampleIndicators"
													        data-bs-slide-to="{{$i}}" @if($i == 0) class="active"
													        aria-current="true" @endif
													        aria-label="Slide {{$i}}"></button>
												@endfor
											</div>
											<div class="carousel-inner">
												@for($i = 0; $i < count($project->images); $i++)
													<div class="carousel-item @if($i == 0) active @endif">
														<img src="{{$project->images[$i]->path}}" class="d-block w-100"
														     alt="...">
													</div>
												@endfor
											</div>

											<button class="carousel-control-prev" type="button"
											        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button"
											        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
										</div>

									@else

										<div class="slide">
											<img src="{{$project->images[0]->path}}" alt=""
											     class="card-img-top">
										</div>

									@endif
									<div class="card-body">
										<h5 class="card-title">{{$project->title}}</h5>
										<p class="card-text">
											{{$project->description}}
										</p>
									</div>
								</div>
							</div>

						@endforeach
					</div>
				</div>
			</div>
		</div>
		
		<div id="section3" data-tooltip="Section 3 Title">
			<h2>Section 3</h2>
		</div>
		
		<div id="section4" data-tooltip="Section 4 Title">
			<h2>Section 4</h2>
		</div>
	</div>


</body>
</html>
