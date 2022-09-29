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
		<div id="section1" class="active" data-tooltip="Home">
			<div class="glass welcome parallax">
				<h1>Sam's Brandende Portfolio</h1>

				<div class="parallax-inner social-icons">
					<a href="https://github.com/MoosMas" target="_blank" class="link-dark">
						<i class="bi bi-github inner"></i>
					</a>
					<a href="https://www.linkedin.com/in/sambrands/" target="_blank" class="link-dark">
						<i class="bi bi-linkedin"></i>
					</a>
					<a href="javascript:function(e){e.preventDefault();}" class="link-dark">
						<i class="bi bi-envelope-fill"></i>
					</a>
				</div>

			</div>
			<a class="icon-scroll" id="down"></a>
		</div>

		<div id="section2" data-tooltip="Projecten">
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

									<div class="card-footer row row-cols-auto gx-2">
										@foreach($project->tags as $tag)

											<div class="col">
												<small class="rounded p-1 col"
												       style="background-color: {{$tag->background_color}}; color: {{$tag->text_color}}">
													{{$tag->tag}}
												</small></div>

										@endforeach
									</div>
								</div>
							</div>

						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div id="section3" data-tooltip="Over mij">
			<div class="container-lg h-100">
				<h2 class="mb-3">Over mij</h2>

				<div class="container h-75 p-5 rounded shadow">
					<div class="px-5">
						<p>
							Mijn naam is Sam Brands en ik zit nu in het derde jaar van de MBO 4 opleiding software
							development bij Curio in Breda.
						</p>
						<p>
							Voor mijn opleiding leer en gebruik ik verschillende talen en technieken. Zo heb ik onder
							anderen in HTML, CSS, JavaScript en PHP gewerkt, maar ook in andere talen zoals Python en
							C#.
						</p>
						<p>
							Voor het derde jaar heb ik de specialisatie WEB gekozen, wat inhoudt dat ik me voornamelijk
							ga
							richten op het bouwen van websites en webapps... Hierbij maak ik voornamelijk gebruik van
							het
							PHP-framework Laravel, samen met HTML, CSS en JavaScript.
						</p>
						<div class="d-flex justify-content-center">
							<a href="https://github.com/MoosMas" target="_blank">
								<img src="https://github-readme-stats.vercel.app/api/top-langs/?username=MoosMas&layout=compact&hide=typescript,shell&langs_count=6&bg_color=ececec"
								     alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="section4" data-tooltip="Contact">
			<div class="container-lg h-100">
				<h2 class="mb-3">Contact</h2>

				<div class="container p-5 rounded shadow d-flex justify-content-between">
					<form action="{{route('contacts.store')}}" method="POST" id="contact-form">
						@csrf
						<div class="form-group mb-2">
							<label for="name" class="form-label">Naam</label>
							<input type="text" name="name" id="name"
							       class="form-control @error('name') is-invalid @enderror">
							@error('name')
							<span class="invalid-feedback" role="alert">
                                    {{ $message }}
                            </span>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" id="name"
							       class="form-control @error('email') is-invalid @enderror">
							@error('email')
							<span class="invalid-feedback" role="alert">
                                    {{ $message }}
                            </span>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label for="subject" class="form-label">Onderwerp</label>
							<input type="text" name="subject" id="subject"
							       class="form-control @error('subject') is-invalid @enderror">
							@error('subject')
							<span class="invalid-feedback" role="alert">
                                    {{ $message }}
                            </span>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label for="message" class="form-label">Bericht</label>
							<textarea name="message" id="message" cols="30" rows="4"
							          class="form-control @error('message') is-invalid @enderror"></textarea>
							@error('message')
							<span class="invalid-feedback" role="alert">
                                    {{ $message }}
                            </span>
							@enderror
						</div>

						<input type="submit" value="Versturen" class="btn btn-primary">

					</form>
					<div class="w-50">
						<p>
							Neem gerust contact op bij vragen of als je een idee hebt voor een project. Dat kan door het
							formulier hiernaast in te vullen of contact op te nemen via een van de platforms hieronder.
						</p>
						<div class="parallax-inner social-icons">
							<a href="https://github.com/MoosMas" target="_blank" class="link-light">
								<i class="bi bi-github inner"></i>
							</a>
							<a href="https://www.linkedin.com/in/sambrands/" target="_blank" class="link-light">
								<i class="bi bi-linkedin"></i>
							</a>
							<a href="javascript:e.preventDefault();" class="link-light">
								<i class="bi bi-envelope-fill"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
	        crossorigin="anonymous"></script>
</body>
</html>
