<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="width=device-width, initial-scale=1" http-equiv="content-type" charset="utf-8">
	<title>Argazki kopurua</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
</head>
</html>
<?php

	session_start();
	$niremysql = new mysqli("localhost","root","","album");
	//$niremysql = new mysqli("mysql.hostinger.es","u980005360_tol","joantol","u980005360_quiz");
	
	if ($niremysql->connect_error) {
		printf("Konexio errorea: " . $niremysql->connect_error);
	}
	
	$eposta=$_SESSION['username'];
					
	$argazkiakDB = $niremysql -> query ("SELECT * FROM argazkiak");
	$rows=mysqli_num_rows($argazkiakDB);
	
	$argazkiakErab = $niremysql -> query ("SELECT * FROM argazkiak WHERE eposta='$eposta'");
	$rows2=mysqli_num_rows($argazkiakErab);
	
	echo $eposta.' erabiltzailearen argazki-kopurua / Datu-basean dauden argazki-kopurua: '.$rows2.' / '.$rows;
?>