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

<?php 

	if ($message = valider("message")) {
		echo "<h2> $message </h2>";
	}


?>


