<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="width=device-width, initial-scale=1" http-equiv="content-type" charset="utf-8">
	<title>ShowQuestions</title>
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
	//$niremysql = new mysqli("localhost","root","","album");
	$niremysql = new mysqli("mysql.hostinger.es","u642730790_tol","joantol","u642730790_album");
		
	if($niremysql->connect_errno) {
		die( "Konexioan errorea gertatu da: (". 
		$niremysql->connect_errno() . ") " . 
		$niremysql->connect_error()	);
	}
		
	$hautatu = "SELECT * FROM argazkiak ORDER BY eposta,albuma";
	$balioak = $niremysql -> query ($hautatu);
	
	$eposta=$_SESSION['username'];
	/*$mota="argazkiaa ikusi";
	$ordua= Date('Y-m-d H:i:s');
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}*/

		if(!$ident= $niremysql-> query("SELECT identifikazioa FROM konexioak WHERE eposta='$eposta' ORDER BY identifikazioa DESC LIMIT 1")){
						die("<p>Errore bat gertatu da: ".$niremysql -> error."</p>");
				}
				$row = mysqli_fetch_array($ident);
				$ident=intval($row['identifikazioa']);
				
				/*$balioa= "INSERT INTO ekintzak (konexioa, eposta, mota, ordua, ip) values ('$ident', '$eposta', '$mota','$ordua','$ip')";
				if (!$niremysql -> query($balioa)){
					die("<p>Errore bat gertatu da: ".$niremysql -> error."</p>");
				}*/
		
	echo "<h1> Argazkien zerrenda </h1>";
	echo '<table border=1>
	<tr>
	<th> Egilea </th>
	<th> Argazkia </th>
	<th> Deskripzioa </th>
	<th> Albuma </th>
	</tr>';	
	
	while($ilara = mysqli_fetch_assoc($balioak)){
		if($ilara['eposta'] != "web000@ehu.es"){
			echo '<tr><td>'.$ilara['eposta'].'</td> </td> <td><img src="data:image/jpeg;base64,'.base64_encode( $ilara['argazkia'] ).'" width="100" height="100"/></td> <td>'. $ilara['deskripzioa']. '</td><td>'.$ilara['albuma'].'</td></tr>';
		}
	}
		
	echo "
			<p><a href = 'albumakKudeatu.php'>Atzera</a></p>
			<p><a href = 'layout.html'>Goazen hasierako orrira.</a></p>";
			
	mysqli_close($niremysql);
	
?>