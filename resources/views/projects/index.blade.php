@extends('projects.base')

@section('content')
	<div class="container">
		@include('components.flash-message')

		@foreach($projects as $project)
			<div class="card-grid p-4 text-dark">
				<div class="row gx-5">
					<div class="col-sm-3 mb-5">
						<div class="card">
							<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

								<div class="carousel-indicators">
									@for($i = 0; $i < count($project->images); $i++)
										@if($i == 0)
											<button type="button" data-bs-target="#carouselExampleIndicators"
											        data-bs-slide-to="{{$i}}" class="active" aria-current="true"
											        aria-label="Slide {{$i}}"></button>
										@else

											<button type="button" data-bs-target="#carouselExampleIndicators"
											        data-bs-slide-to="{{$i}}" aria-label="Slide {{$i}}"></button>
										@endif
									@endfor
								</div>
								<div class="carousel-inner">
									@for($i = 0; $i < count($project->images); $i++)
										@if($i == 0)
											<div class="carousel-item active">
												<img src="{{$project->images[$i]->path}}" class="d-block w-100"
												     alt="...">
											</div>
										@else
											<div class="carousel-item">
												<img src="{{$project->images[$i]->path}}" class="d-block w-100"
												     alt="...">
											</div>
										@endif
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
							<div class="card-body">
								<h5 class="card-title">{{$project->title}}</h5>
								<p class="card-text">
									{{$project->description}}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		@endforeach

	</div>

@endsection
