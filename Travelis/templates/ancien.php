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
<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-3">
			<form action="controleur.php" class="" method="post">
				<h3>Recherche de fiches Journalières</h3>
				<div class="form-group">
					<label for="inputDateDebut" class="">Debut</label>
					<input class="form-control" type="date" name="DateDebut" id="inputDateDebut">
				</div>
				<div class="form-group">
					<label for="inputDateFin" class="">Fin</label>
					<input class="form-control" type="date" name="DateFin" id="inputDateFin">
				</div>
				<button type="submit" class="btn btn-dark" value="RechercherFichesJournalieres" name="action">Rechercher</button>
			</form>
			<br/>
			<form action="controleur.php" class="" method="post">
				<h3>Recherche de fiches Mensuelles</h3>
				<div class="form-group">
					<label for="inputAnnee" class="">Annee</label>
					<input class="form-control" type="text" name="annee" id="inputAnnee">
				</div>
				<button type="submit" class="btn btn-dark" value="RechercherFichesMensuelles" name="action">Rechercher</button>
			</form>
		</div>
		<div class="col-12 col-md-9">
		<?php
			if ($idUser = valider("idUser"))
			if ($dateDebut = valider("dateDebut"))
			if ($dateFin = valider("dateFin"))
			{
				$fiches=rechercheFiches($dateDebut,$dateFin,$idUser);
				echo '<div class="col-md-9" >';
					echo '<h3>Tableau des résultats</h3><br/>';
					mkResultat($fiches);
				echo '</div>';
			}

			if ($idUser = valider("idUser"))
			if ($annee = valider("annee"))
			{
				$fichesMensuelles=rechercheFichesMensuelles($idUser,$annee);
				//Chercher les datas de la fiche mensuelle
				echo '<div class="col-md-9" >';
					echo '<h3>Tableau des résultats</h3><br/>';
					mkResultatMensuelles($fichesMensuelles);
					//Fonction affichant le tableau id / mois
				echo '</div>';	
			}	
		
			?>
		</div>	
	</div>	
</div>