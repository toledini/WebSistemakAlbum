<?php
	
	session_start();
	$niremysql = new mysqli("localhost","root","","album");
	//$niremysql = new mysqli("mysql.hostinger.es","u980005360_tol","joantol","u980005360_quiz");
	
	if ($niremysql->connect_error) {
		printf("Konexio errorea: " . $niremysql->connect_error);
	}
	
	
	//$argazkia= isset($_POST["argazkia"]) ? $_POST["argazkia"] : '';
	$deskripzioa= isset($_POST["deskripzioa"]) ? $_POST["deskripzioa"] : '';
	$albuma= isset($_POST["albuma"]) ? $_POST["albuma"] : '';
	
								
	if($_FILES['image']['error']==0){
		$file= $_FILES['image']['tmp_name'];
		$irudia= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$irudi_izena= addslashes($_FILES['image']['name']);
	}else{
		$irudia=null;
		$irudi_izena="";
	}
	
	$eposta=$_SESSION['username'];
	
	if($irudia==""){
		echo("Argazkia hutsa dago. <br/>");
	}else if($deskripzioa==""){
		echo("Deskripzioa hutsa dago. <br/>");
	}else if($albuma==""){
		echo("Albuma hutsa dago. <br/>");
	}else{
		$balioa = "INSERT INTO argazkiak (eposta, argazkia, argazki_mota,deskripzioa ,albuma) VALUES ('$eposta','$irudia','$irudi_izena','$deskripzioa','$albuma')"; 
		if (!$niremysql -> query($balioa)){
			die("<p>Errorea gertatu da: ".$niremysql -> error ."</p>");
		}else{
			echo 'Argazkia zuzen sartu da ';
			echo "<br>";
		}
		/*if(!$ident= $niremysql-> query("SELECT identifikazioa FROM konexioak WHERE eposta='$eposta' ORDER BY identifikazioa DESC LIMIT 1")){
			die("<p>Errore bat gertatu da: ".$niremysql -> error."</p>");
		}
		$row = mysqli_fetch_array($ident);
		$ident=intval($row['identifikazioa']);
		$mota="galdera txertatu";
		$ordua= Date('Y-m-d H:i:s');
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		$balioa= "INSERT INTO ekintzak (konexioa, eposta, mota, ordua, ip) values ('$ident', '$eposta', '$mota','$ordua','$ip')";
		if (!$niremysql -> query($balioa)){
			die("<p>Errore bat gertatu da: ".$niremysql -> error."</p>");
		}else{
		
			$fitxategi= simplexml_load_file('galderak.xml');
			$item= $fitxategi->addChild('assessmentItem');
			$item->addAttribute('complexity', $zailtasun);
			$item->addAttribute('subject', $gaia);
			$body=$item->addChild('itemBody');
			$body->addChild('p', $galdera);
			$response=$item->addChild('correctResponse');
			$response->addChild('value', $erantzuna);
			if($fitxategi->asXML('galderak.xml') == 1){
				echo "Ondo txertatu da XML fitxategian.";
			}else{
				echo "Gaizki txertatu da XML fitxategian.";
			}
			
	    }*/
	}
		


?>