<?php

// Si la page est appelee directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php"){
	header("Location:../index.php");
	die("");
}
/*
// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
*/
?>
<?php 
if ($idFicheMensuelle = valider("idFicheMensuelle")) {
	//Récupération information principales fiche journalière
	$infoFicheMensuelle = infoFicheMensuelle($idFicheMensuelle);
	$totauxFicheMensuelle = totauxFicheMensuelle($idFicheMensuelle);
	
	mkMensuelle($infoFicheMensuelle);
	mkTotalMensuelle($totauxFicheMensuelle);
}
?>