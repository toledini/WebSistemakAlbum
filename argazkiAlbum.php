<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="width=device-width, initial-scale=1" http-equiv="content-type" charset="utf-8">
	<title>ArgazkiaGehitu</title>
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
	
	if ($niremysql->connect_error) {
		printf("Konexio errorea: " . $niremysql->connect_error);
	}
	
	//argazkiak igotzeko
	
	if($_FILES['image']['error']==0){
		$file= $_FILES['image']['tmp_name'];
		$irudia= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$irudi_izena= addslashes($_FILES['image']['name']);
	}else{
		$irudia=null;
		$irudi_izena="";
	}
	
	//datuak jaso eta irakurri
	
	$des = $_POST['des'];
	$alb = $_POST['alb'];	
	$eposta=$_SESSION['username'];
	
	if($des == ""){
			echo "<script type=\"text/javascript\">
			    alert('Deskripzioa hutsa dago');
				history.go(-1);
				</script>";
		}else if($alb == ""){
			echo "<script type=\"text/javascript\">
			    alert('Albuma hutsa dago.');
				history.go(-1);
				</script>";
		}else{
			
			$balioa = "INSERT INTO argazkiak(eposta,argazkia,argazki_mota,deskripzioa,albuma) VALUES ('$eposta','$irudia','$irudi_izena','$des','$alb')";
				
			if (!$niremysql -> query($balioa)){
				die("<p>Errore bat gertatu da: ".$niremysql -> error."</p>");
			}

			echo "
			<p>Modu egokian igo duzu argazkia. </p>";
			
			echo "<p><a href = 'albumakKudeatu.php'>Atzera</a></p>";
			
	}
	mysqli_close($niremysql);
	
?>