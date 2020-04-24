<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}
/*
// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
*/
?>

<h1> Accueil </h1>




<input type="time" id="lol">
<input type="time" id="lol2">



var start_time = $("#lol").val();
var end_time = $("#lol2").val();

var stt = new Date("January 1, 2020 " + start_time);
stt = stt.getTime();

var endt = new Date("January 1, 2020 " + end_time);
endt = endt.getTime();

//by this you can see time stamp value in console via firebug
console.log("Time1: "+ stt + " Time2: " + endt);

if(stt > endt) {
   console.log("non");
}
else{

	console.log("oui");
}
