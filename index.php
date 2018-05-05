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
		<form action="/time-counter/import.php" method="post">
			<input type="hidden" value="0.00" name="php">
			<input type="hidden" value="0.00" name="javascript">
			<input type="hidden" value="0.00" name="sql">
			<input type="password" name="password">
			<input type="submit" value="Import" name="send">
			<?php
			if(isset($_SESSION['statement'])){
			?>
			<p><?php echo $_SESSION['statement']; ?></p>
			<?php
			unset($_SESSION['statement']);	
			}
			else if(isset($_SESSION['error'])){
			?>
			<p><?php echo $_SESSION['error']; ?></p>
			<?php	
			unset($_SESSION['error']);
			}
			?>
		</form>
	</div>
</body>
</html>