<!DOCTYPE html>
<html>
<head>
	<title>Licznik czasu</title>
	<meta charset="utf-8" />
	<script src="script.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
	<div id="container">
		<div class="skills">
			<div class="diode"></div>
			<h3>PHP</h3>
			<div class="hidden">
				<div class="status">2</div>
				<div class="miliseconds">0</div>
				<div class="pause">0</div>
			</div>
			<div class="time">0.00 min</div>
			<button class="start">Start</button>
			<button class="zero">Zeruj</button>
		</div>
		<div class="skills">
			<div class="diode"></div>
			<h3>JavaScript</h3>
			<div class="hidden">
				<div class="status">2</div>
				<div class="miliseconds">0</div>
				<div class="pause">0</div>
			</div>
			<div class="time">0.00 min</div>
			<button class="start">Start</button>
			<button class="zero">Zeruj</button>
		</div>
		<div class="skills">
			<div class="diode"></div>
			<h3>SQL</h3>
			<div class="hidden">
				<div class="status">2</div>
				<div class="miliseconds">0</div>
				<div class="pause">0</div>
			</div>
			<div class="time">0.00 min</div>
			<button class="start">Start</button>
			<button class="zero">Zeruj</button>
		</div>
		<p id="info">Przycisk "Zeruj" jest dostępny po zatrzymaniu licznika</p>
	</div>
</body>
</html>