@extends('projects.base')

@section('content')
	<div class="container">
		@include('components.flash-message')

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
								<h5 class="card-title">
									<a href="{{route('projects.edit', $project->id)}}">{{$project->title}}</a>
								</h5>
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

@endsection
