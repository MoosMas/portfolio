<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

	<!-- Vite Assets -->
	@vite(['resources/css/app.css', 'resources/css/fullview.css', 'resources/js/fullview.js'])
</head>
<body class="antialiased">
	<div id="fullview">
		<div id="section1" class="active" data-tooltip="Section 1 Title">
			<h2>Section 1</h2>
			<button title="Down" id="down"><span>Click Here</span></button>
		</div>
		<div id="section2" data-tooltip="Section 2 Title">
			<h2>Section 2</h2>
			<div class="form">
				<form>
					<label for="select">Choose Section To Scroll</label>
					<select name="section" id="select">
						<option value="0">Section: 1</option>
						<option value="1">Section: 2</option>
						<option value="2">Section: 3</option>
						<option value="3">Section: 4</option>
					</select>
				</form>
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