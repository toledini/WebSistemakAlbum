<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="width=device-width, initial-scale=1" http-equiv="content-type" charset="utf-8">
	<title>ShowUsersWithImage</title>
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
	

	$niremysql = new mysqli("localhost","root","","album");
	$niremysql = new mysqli("mysql.hostinger.es","u642730790_tol","joantol","u642730790_album");
		
	if($niremysql->connect_errno) {
		die( "Konexioan errorea gertatu da: (". 
		$niremysql->connect_errno() . ") " . 
		$niremysql->connect_error()	);
	}
		
	$hautatu = "SELECT * FROM erabiltzaile";
	$balioak = $niremysql -> query ($hautatu);
		
	echo "<h1> Erabiltzaileen zerrenda </h1>";
	echo '<table border=1>
	<tr>
	<th> Posta </th>
	<th> Izena </th>
	<th> Abizena1 </th>
	<th> Abizena2 </th>
	<th> Pasahitza </th>
	<th> Telefonoa </th>
	<th> Espezialitatea </th>
	<th> Interesak </th>
	<th> Argazkia </th>
	</tr>';	
	
	while($ilara = mysqli_fetch_assoc($balioak)){
			if($ilara['eposta'] != "web000@ehu.es"){
				echo '<tr><td>'.$ilara['eposta'].'</td> <td>'. $ilara['izena']. '</td> <td>'. $ilara['abizena1']. '</td> <td>'. $ilara['abizena2']. '</td> <td>'. $ilara['pasahitza'].'</td> <td>'. $ilara['telefonoa'].'</td> <td>'. $ilara['espezialitatea'].'</td> <td>'. $ilara['interesak'].'</td> <td><img src="data:image/jpeg;base64,'.base64_encode( $ilara['argazkia'] ).'" width="100" height="100"/></td> </tr>';
			}
		}
		
	echo "
			<p><a href = 'layout.html'>Goazen hasierako orrira.</a></p>";
			
	mysqli_close($niremysql);
	
?>