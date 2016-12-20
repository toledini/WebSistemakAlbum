<?php
	session_start();
	if($_SESSION['kautotua'] != 'BAI'){
		header('Location.html');
		exit();
	}
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="width=device-width, initial-scale=1" http-equiv="content-type" charset="utf-8">
	<title>Formularioa</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	<script type="text/javascript" language="Javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" language="Javascript">
		   
	Objektua = new XMLHttpRequest();
	
	function argazkiKop(){
		Objektua.open('POST',"argazkiKop.php",true);
		Objektua.onreadystatechange = function(){
			if((Objektua.readyState==4)&&(Objektua.status==200)){
				document.getElementById('kopurua').innerHTML=Objektua.responseText;
			}
		}
		Objektua.send();
	}
	setInterval(kopurua,5000);
	</script>
</head>
<body onload="argazkiKop()">

<div><input type="submit" name="botoia1" id="botoia1" value="Argazkia txertatu" class="btn" onclick="location.href='argazkiGehitu.html';"/><br/></div>
<div><input type="submit" name="botoia2" id="botoia2" value="Argazkiak ikusi" class="btn" onclick="location.href='datuakIkusi.php';"/><br/></div>

<div id="kopurua" name="kopurua">
	  </div>

<div><span><a href='ShowPhotos.php'>Argazki guztiak ikusi nahi?</a></span><br/></div>

	 <span><a href='layout.html'><img src="http://www.freeiconspng.com/uploads/icones-png-theme-home-19.png" alt="atzera" width="50" height="50" align="left"></a></span>

</body>
</html>