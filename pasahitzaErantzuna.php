<?php
	
	//$niremysql = new mysqli("localhost","root","","album");
	$niremysql = new mysqli("mysql.hostinger.es","u642730790_tol","joantol","u642730790_album");
	
	if ($niremysql->connect_error) {
		printf("Konexio errorea: " . $niremysql->connect_error);
	}
	
		
	$user = $_GET['emaila'];
	$eran = $_GET['eran'];
		

	$balioak = $niremysql -> query ("SELECT * FROM erabiltzaile WHERE eposta = '$user' AND erantzuna = '$eran'");
	
	$kopurua = mysqli_num_rows($balioak);
		
	if ($kopurua == 0){
		echo "Ez da zuzena erantzuna";
	}else{
		$pasahitza = randomPassword();
		$niremysql -> query ("UPDATE erabiltzaile SET pasahitza = '$pasahitza' WHERE eposta = '$user'");
		echo "<br><br><h4> Pasahitz berria: </h4>";
		echo $pasahitza;
	}
		
		
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
?>