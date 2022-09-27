@extends('projects.base')

@section('content')
	<div class="container">
		@include('components.flash-message')

		@foreach($projects as $project)
			@foreach($project->images as $image)
				<div class="card-grid p-4 text-dark">
					<div class="row gx-5">
						<div class="col-sm-3 mb-5">
							<div class="card">
								<img src="" alt="">
								<div class="card-body">
									<h5 class="card-title">Project</h5>
									<p class="card-text">
										Hi
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<img src="{{asset($image->path)}}" alt="">

			@endforeach
		@endforeach

	</div>

@endsection
