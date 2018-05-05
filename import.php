<?php
include_once('connect.php');
session_start();
if(!isset($_POST['send'])){
	header('Location: /time-counter/');
	exit;
}
$php = str_replace(' min', '', $_POST['php']);
$javascript = str_replace(' min', '', $_POST['javascript']);
$sql = str_replace(' min', '', $_POST['sql']);
$password = $_POST['password'];
if($password == $import){
	$connect = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);
	if(!$connect){
		$_SESSION['error'] = 'Błąd połączenia z bazą';
		header('Location: /time-counter/');
		exit;
	}
	else{
		$connect->query('set names "utf8" collate "utf8_polish_ci"');
		if($php != '0.00' || $javascript != '0.00' || $sql != '0.00'){
			if($php != '0.00'){
				$query = 'INSERT INTO timeCounter (name, dateImport, studyTime) VALUES ("php", "' . date('Y.m.d') . '", "' . $php . '")';
				$connect->query($query);	
			}
			if($javascript != '0.00'){
				$query = 'INSERT INTO timeCounter (name, dateImport, studyTime) VALUES ("javascript", "' . date('Y.m.d') . '", "' . $javascript . '")';
				$connect->query($query);
			}
			if($sql != '0.00'){
				$query = 'INSERT INTO timeCounter (name, dateImport, studyTime) VALUES ("sql", "' . date('Y.m.d') . '", "' . $sql . '")';
				$connect->query($query);	
			}
			$_SESSION['statement'] = 'Dane zostały przesłane';
		}
		else{
			$_SESSION['error'] = 'Brak danych do przesłania';
			header('Location: /time-counter/');
			exit;
		}
	}
	$connect->close();	
}
else{
	$_SESSION['error'] = 'Błędne hasło';
}
header('Location: /time-counter/');
?>