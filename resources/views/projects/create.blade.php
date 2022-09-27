@extends('projects.base')

@section('content')
	<div class="container">
		<h1>Nieuw project</h1>

		<form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
			@csrf
			<div class="form-group mb-3">

				<label for="title" class="form-label">Titel</label>
				<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
				@error('title')
					<span class="invalid-feedback" role="alert">
                        {{ $message }}
	                </span>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="description" class="form-label">Beschrijving</label>
				<textarea name="description" id="description" cols="30" rows="4" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
				@error('description')
				<span class="invalid-feedback" role="alert">
                        {{ $message }}
	                </span>
				@enderror
			</div>

			<div class="form-check form-switch mb-3">
				<input type="checkbox" name="highlight" id="highlight" class="form-check-input" role="switch" value="{{old('highlight')}}">
				<label for="highlight" class="form-check-label">Highlight project?</label>
			</div>

			<div class="form-group mb-3">
				<label for="images" class="form-label">Afbeelding van project</label>
				<input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" multiple>
				<div id="image" class="dropzone"></div>
				@error('images')
				<span class="invalid-feedback" role="alert">
                        {{ $message }}
	                </span>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="tags" class="form-label">Tags</label>
				<select name="tags[]" id="tags" class="form-control select2-tags" multiple></select>
			</div>

			<input type="submit" value="Aanmaken" class="btn btn-primary">
		</form>
	</div>
	
	<script type="module">
		let oldInput = {!! json_encode(old('tags') ?? []) !!};
		
		$(".select2-tags").select2({
			tags: false,
			tokenSeparators: [',', ' '],
			data: {!! json_encode($tags) !!}
		}).val(oldInput).trigger('change');
	</script>

@endsection
