<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

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
			<div class="container">
				<h2>Projecten</h2>
				
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
