<?php

	session_start();
	//$niremysql = new mysqli("localhost","root","","album");
	$niremysql = new mysqli("mysql.hostinger.es","u642730790_tol","joantol","u642730790_album");
	
	if ($niremysql->connect_error) {
		printf("Konexio errorea: " . $niremysql->connect_error);
	}
	
	if($_SESSION['username']!= 'web000@ehu.es'){
		echo "<script type=\"text/javascript\">
			    alert('Ez zara irakaslea edo logeatu gabe sartzen saiatu zara.');
				history.go(-1);
				</script>";
	}else{
		
		$zenb = $_POST['zenb'];

		$niremysql -> query("DELETE FROM argazkiak WHERE id=$zenb");
		
		
		header('Location:reviewingAlbums.php');
	}
?>