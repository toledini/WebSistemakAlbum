<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="width=device-width, initial-scale=1" http-equiv="content-type" charset="utf-8">
	<title>EnrollWithImage</title>
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
	$argazkiak = $niremysql -> query ("Select eposta,argazkia, deskripzioa, albuma from argazkiak where eposta='$eposta' GROUP BY eposta, albuma");
	/*$mota="galdera ikusi";
	$ordua= Date('Y-m-d H:i:s');
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}*/

	/*if(!$ident= $niremysql-> query("SELECT identifikazioa FROM konexioak WHERE eposta='$eposta' ORDER BY identifikazioa DESC LIMIT 1")){
					die("<p>Errore bat gertatu da: ".$niremysql -> error."</p>");
			}
			$row = mysqli_fetch_array($ident);
			$ident=intval($row['identifikazioa']);
			
			$balioa= "INSERT INTO ekintzak (konexioa, eposta, mota, ordua, ip) values ('$ident', '$eposta', '$mota','$ordua','$ip')";
			if (!$niremysql -> query($balioa)){
				die("<p>Errore bat gertatu da: ".$niremysql -> error."</p>");
			}*/
	$numrows = mysqli_num_rows($argazkiak);
	if($numrows > 0){
		
		echo "<h1> Galderen zerrenda </h1>";		
		echo "
		<table border=1>
			<tr>
				<th>Argazkia</th>
				<th>Deskripzioa</th>
				<th>Albuma</th>
			</tr>";
			
		while ($row = mysqli_fetch_assoc($argazkiak)){
			if($row['eposta'] != "web000@ehu.es"){
				echo '<tr> <td><img src="data:image/jpeg;base64,'.base64_encode( $row['argazkia'] ).'" width="100" height="100"/></td><td>'.$row['deskripzioa'].'</td><td>'.$row['albuma'].'</td> </tr>';
			}
		}
		echo "</table>";
	}else{
		echo "
		<center><p>Ez duzu txertatutako argazkirik.</p></center>";
	}
	
	echo "<p><a href = 'albumakKudeatu.html'>Segi kudeatzen argazkiak.</a></p>";
	
?>