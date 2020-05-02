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


<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-2">
			<form action="controleur.php" class="" method="get">
				<div class="form-group">
					<!-- <label for="inputCache" class="">Mois actuel:</label> -->
					<input class="form-control" type="hidden" name="anneeMois" id="inputCache" value="e" >
				</div>
				
				<button type="submit" class="btn btn-dark" value="AfficherFicheMensuelleActuelle" name="action">Afficher ma fiche mensuelle</button>
			</form>
		</div>
		<div class="col-12 col-md-10">
		<?php 
		if ($idFicheMensuelle = valider("idFicheMensuelle")) {

			//echo $idFicheMensuelle;
			$infoFicheMensuelle = infoFicheMensuelle($idFicheMensuelle);
			$totauxFicheMensuelle = totauxFicheMensuelle($idFicheMensuelle);

			
			mkMensuelle($infoFicheMensuelle);
			mkTotalMensuelle($totauxFicheMensuelle);
		}
		?>
		</div>
	</div>
</div>