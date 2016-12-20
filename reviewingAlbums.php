<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="width=device-width, initial-scale=1" http-equiv="content-type" charset="utf-8">
	<title>reviewingAlbums</title>
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
	if($_SESSION['kautotua'] != 'BAI'){
		header('Location.html');
		exit();
	}
	//$niremysql = new mysqli("localhost","root","","album");
	$niremysql = new mysqli("mysql.hostinger.es","u642730790_tol","joantol","u642730790_album");
	
	if ($niremysql->connect_error) {
		printf("Konexio errorea: " . $niremysql->connect_error);
	}
	
	$argazkiak = $niremysql->query("SELECT * FROM argazkiak ORDER BY eposta,albuma");
	
	echo "<h1> Argazkien zerrenda </h1>";		
		echo "
		<table border=1>
			<tr>
				<th>Zenbakia</th>
				<th>Egilea</th>
				<th>Argazkia</th>
				<th>Deskripzioa</th>
				<th>Albuma</th>
			</tr>";
			
		while ($row = mysqli_fetch_assoc($argazkiak)){
			if($row['eposta'] != "web000@ehu.es"){
				echo '<tr> <td>'.$row['id'].'</td><td>'.$row['eposta'].'</td><td><img src="data:image/jpeg;base64,'.base64_encode( $row['argazkia'] ).'" width="100" height="100"/></td><td>'.$row['deskripzioa'].'</td><td>'.$row['albuma'].'</td> </tr>';
			}
		}
		echo "</table>";
	
?>
<html>
<body>
	<center>
		<form method="post" action="treatQuestions.php">
			Sar ezazu ezabatu nahi duzun argazkiaren zenbakia:
			<div><input type="number" name="zenb" id="zenb" placeholder="1" />
			<button type="submit">Ezabatu</button>
		</form>
	</center>
	<span><a href='layout.html'><img src="http://www.freeiconspng.com/uploads/icones-png-theme-home-19.png" alt="atzera" width="50" height="50" align="left"></a></span>	
</body>
</html>

