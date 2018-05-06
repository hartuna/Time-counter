<?php
session_start();
?>
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
		<div id="form">
			<div id="import">
				<p>Importuj czas do bazy</p>
				<button id="importTime"></button>
			</div>
			<form action="/time-counter/import.php" method="post">
				<input type="hidden" value="0.00" name="php">
				<input type="hidden" value="0.00" name="javascript">
				<input type="hidden" value="0.00" name="sql">
				<label for="password">Wprowadź hasło i zatwierdź</label>
				<input id="password" type="password" name="password">
				<input id="send" type="submit" value="" name="send">
				<button id="close"></button>
			</form>
			<div id="statement">
				<p id="result">
				<?php
				if(isset($_SESSION['statement'])){
					echo $_SESSION['statement'];
					unset($_SESSION['statement']);	
				}
				else if(isset($_SESSION['error'])){
					echo $_SESSION['error'];
					unset($_SESSION['error']);
				}
				else{
					echo '';
				}
				?>	
				</p>
			</div>
		</div>
	</div>
</body>
</html>