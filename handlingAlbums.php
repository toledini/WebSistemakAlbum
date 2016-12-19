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
	<title>Handling Albums</title>
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
  //Argazkiak ikusteko
	$(document).ready(function(){
		$("#ikusi").click(function(){
        $("#Ikus").load("datuakIkusi.php");
		document.getElementById('Ikus').style.visibility="visible";
		});
	});
	//Argazkiak txertatzeko
	$(document).ready(function(){
		$("#txertatu").click(function(){
		//var arg = document.getElementById('image').value; 
		var des = document.getElementById('des').value;
		var alb = document.getElementById('alb').values;
		$("#Txerta").load("argazkiGehitu.php",{argazkia:arg, deskripzioa:des, albuma:alb} );
		});
	});
	
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
	
		var irudiaIgo = function(event) {
		var output = document.getElementById('aurrekoa');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.style.paddingBottom="10px";
		};
		
	function tamainaAldatu(irudia,altuera,zabalera){
		irudia.height=altuera;
		irudia.width=zabalera;
	}
	
  </script>
  
</head>
<body onload="argazkiKop()">

    <h2>
      ALBUMen kudeaketa:
    </h2>
	
	<form>
    
    Albumera igo nahi den argazkia:<br/>
	<div><input name="image" id="image" type="file" accept="image/*" onchange="irudiaIgo(event)"/><br/></div>
	<div><img id="aurrekoa" onload="tamainaAldatu(this,125,250)"/><br/></div>
	Deskripzioa:
	<div><input type="text" title="des" name="des" id="des" placeholder="Mendi baten irudia"><br/></div>
	Albuma:
	<div><input type="text" title="alb" name="alb" id="alb" placeholder="Mendia"><br/></div>
	</form>
      <div><input type="button" name="txertatu" id="txertatu" value="Argazkia Txertatu" />
	  <input type="button" name="ikusi" id="ikusi" value="Argazkiak Ikusi" /><br/></div>
	  
	  
	  <div id="Txerta" name="Txerta">
	  </div>
	  
	  <div id="Ikus" name="Ikus" style="visibility:hidden">
	  </div>
	  
	  <div id="kopurua" name="kopurua">
	  </div>
	  
	  <div><span><a href='ShowPhotos.php'>Argazki guztiak ikusi nahi?</a></span><br/></div>
	
	 <span><a href='layout.html'><img src="http://www.freeiconspng.com/uploads/icones-png-theme-home-19.png" alt="atzera" width="50" height="50" align="left"></a></span>

</body>

</html>