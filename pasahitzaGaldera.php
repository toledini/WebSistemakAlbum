<?php 
	
	//$niremysql = new mysqli("localhost","root","","album");
	$niremysql = new mysqli("mysql.hostinger.es","u642730790_tol","joantol","u642730790_album");
	
	if ($niremysql->connect_error) {
		printf("Konexio errorea: " . $niremysql->connect_error);
	}
		
		if(!isset($_GET['emaila']))
			echo "Ez dago ezarrita";
		$user = $_GET['emaila'];
		
		$balioak = $niremysql -> query ("SELECT galdera FROM erabiltzaile WHERE eposta = '$user'");
		while($row = mysqli_fetch_assoc($balioak)){
			echo "<br><b>".$row['galdera']."</b><br>";
			echo "<input type = 'text' id ='erantzuna'>";
			echo "<button type = 'input' onclick ='egiaztatuErantzuna()'>Bidali</button>";
			echo "<div id='Berria'></div>";
		}
?>