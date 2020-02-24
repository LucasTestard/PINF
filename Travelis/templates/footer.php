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

  <div class="fixed-bottom">
    <?php
		// Si l'utilisateur est connecte, on affiche un lien de deconnexion 
		if (valider("connecte","SESSION"))
		{
			echo "Utilisateur <b>$_SESSION[login]</b> connecté depuis <b>$_SESSION[heureConnexion]</b> &nbsp; "; 
		}
		?>
  	
  </div>
  

  </body>
</html>