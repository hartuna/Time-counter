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
				<div class="status"><?php if(isset($_SESSION['phpTime']) && $_SESSION['phpTime'] != '0.00'){ echo '0'; }else{ echo '2'; } ?></div>
				<div class="miliseconds">0</div>
				<div class="pause"><?php if(isset($_SESSION['phpTime'])){ echo $_SESSION['phpTime']; }else{ echo '0'; } ?></div>
			</div>
			<div class="time"><?php if(isset($_SESSION['phpTime'])){ echo $_SESSION['phpTime']; }else{ echo '0.00'; } ?> min</div>
			<button class="start">Start</button>
			<button class="zero">Zeruj</button>
		</div>
		<div class="skills">
			<div class="diode"></div>
			<h3>JavaScript</h3>
			<div class="hidden">
				<div class="status"><?php if(isset($_SESSION['javascriptTime']) && $_SESSION['javascriptTime'] != '0.00'){ echo '0'; }else{ echo '2'; } ?></div>
				<div class="miliseconds">0</div>
				<div class="pause"><?php if(isset($_SESSION['javascriptTime'])){ echo $_SESSION['javascriptTime']; }else{ echo '0'; } ?></div>
			</div>
			<div class="time"><?php if(isset($_SESSION['javascriptTime'])){ echo $_SESSION['javascriptTime']; }else{ echo '0.00'; } ?> min</div>
			<button class="start">Start</button>
			<button class="zero">Zeruj</button>
		</div>
		<div class="skills">
			<div class="diode"></div>
			<h3>SQL</h3>
			<div class="hidden">
				<div class="status"><?php if(isset($_SESSION['sqlTime']) && $_SESSION['sqlTime'] != '0.00'){ echo '0'; }else{ echo '2'; } ?></div>
				<div class="miliseconds">0</div>
				<div class="pause"><?php if(isset($_SESSION['sqlTime'])){ echo $_SESSION['sqlTime']; }else{ echo '0'; } ?></div>
			</div>
			<div class="time"><?php if(isset($_SESSION['sqlTime'])){ echo $_SESSION['sqlTime']; }else{ echo '0.00'; } ?> min</div>
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
				<div id="close"></div>
			</form>
			<div id="statement">
			<?php
			if(isset($_SESSION['statement'])){
				echo '<p id="result">' . $_SESSION['statement'] . '</p>';
				unset($_SESSION['statement']);	
			}
			else if(isset($_SESSION['error'])){
				echo '<p id="result">' . $_SESSION['error'] . '</p>';
				unset($_SESSION['error']);
			}
			?>		
			</div>
		</div>
	</div>
</body>
</html>