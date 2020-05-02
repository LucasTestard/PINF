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
if ($idFiche = valider("idFiche")) {
	//Récupération information principales fiche journalière
	$infoFiche = infoFiche($idFiche);
	$nom = $infoFiche[0]["nom"];
	$prenom = $infoFiche[0]["prenom"];
	$date = $infoFiche[0]["date"];
	$immatriculation = $infoFiche[0]["immatriculation"];
	$carburant = $infoFiche[0]["carburant_euro"];
	$attente = $infoFiche[0]["temps_attente"];


	$dateEnvoi =  $infoFiche[0]["date_envoi"];
	


	$datetime1 = new DateTime($dateEnvoi); // Date du jour
	$datetime2 = new DateTime(date("Y-m-d"));   // Date du jour (2018-09-07 16:10:21)
	$interval = $datetime1->diff($datetime2);
	 

	

	//Récupération information principales des vacations liées à l'id de la fiche journalière
	$infoVacation = infoVacation($idFiche);
	//Récupération du nombre de vacation liées à l'id de la fiche journalière	
	$nbVacation = nbVacation($idFiche);
	$nbVacation = $nbVacation[0]["nbVacation"];
	//Récupération de toutes les prises en charges liées à l'id de la fiche journalière
	$infoPC = infoPC($idFiche);
	//Récupération du nombre de prises en charges par vacation
	$nbPC = nbPC($idFiche);
	
	$k=0;//Variable permettant le bon affichage du bon nombre de prise en charge dans chaques vacations

	//On créer le corps de la fiche journalière dont on a l'id
	echo '<form id="pointageJournalier" class="container-fluid" action="controleur.php" method="post">';
		if($modifUser=estModifiePar($idFiche)){
			echo '<h3>Cette fiche a été modifié par ';
			echo $modifUser[0]["prenom"]." ".$modifUser[0]["nom"].'</h3>';
			echo '<div class="trait"></div>';
		}
		echo '<input id="dateDuJour" name="dateRemplissage" type="hidden" value=' . $dateEnvoi. '>';
		echo '<div class="form-row justify-content-start">';
		
			echo '<div class="form-group col-md-3">';
				echo '<label for="inputNom">Nom</label>';
				echo '<input type="text" class="form-control Obligatoire" placeholder="Nom" id="inputNom" name="nom" value=' .$nom.' required readonly>';
			echo '</div>';
			echo '<div class="form-group col-md-3">';
				echo '<label for="inputPrenom">Prénom</label>';
				echo '<input type="text" class="form-control Obligatoire" placeholder="Prenom" id="inputPrenom" name="prenom" value=' .$prenom.' required readonly> ';
			echo '</div>';
			echo '<div class="form-group col-md-3">';
				echo '<label for="inputDate">Date</label>';
				echo '<input type="date" class="form-control Obligatoire" placeholder="Date" id="inputDate" name="date" value=' .$date.' required readonly>';
			echo '</div>';
			echo '<div class="form-group col-md-3">';
				echo '<label for="inputImmatriculation">Immatriculation</label>';
				echo '<input type="text" class="form-control Obligatoire" placeholder="Immatriculation" id="inputImmatriculation" name="immatriculation" autocomplete="off" value='.$immatriculation.' required readonly>';
				echo '<ul class="list-group"></ul>';
			echo '</div>';
			echo '<div class="form-group col-md-3">';
				echo '<label for="inputTempsAttente">Temps d\'attente</label>';
				echo '<input type="time" class="form-control" placeholder="Temps d\'attente" id="inputTempsAttente" name="tempsAttente" value='.$attente.' readonly>';
			echo '</div>';
			echo '<div class="form-group col-md-3">';
				echo '<label for="inputPrixCarburant">Prix Carburant (en euro)</label>';
				echo '<input type=number step=0.01 min="0" class="form-control" placeholder="Prix Carburant mis dans le véhicule" id="inputPrixCarburant" name="prixCarburant" value="'.$carburant.'" readonly>';
			echo '</div>';
		echo '</div>';
		echo '<div id="popup" title="Erreur"></div>';
		echo '<div class="trait"></div>';
		echo '<input id="nbVacation" name="nbVacation" type="hidden" value="'.$nbVacation.'">';
	//On crée les
	for ($i = 0; $i <$nbVacation; $i++) {
		echo '<div class="vacation">';
			echo '<h1>Vacation</h1>';
			echo '<input id="nbPC" name="nbPC[]" type="hidden" value="'.$nbPC[$i]["nbPriseEnCharge"].'">';
			echo '<div class="form-row d-flex justify-content-start">';
				echo '<div class="form-group col-sm-auto">';
					echo '<label for="inputHeureDepart">Heure de Départ</label>';
					echo '<input type="time" class="form-control HeureDepart Obligatoire" id="inputHeureDepart" name="HeureDepart[]" value='.substr($infoVacation[$i]["heure_depart"],0,-3).' readonly>';
				echo '</div>';
				echo '<div class="form-group col-sm-auto">';
					echo '<label for="inputKmDepart">Kilométrage Départ</label>';
					echo '<input type="text" class="form-control KmDepart Obligatoire" placeholder="Kilométrage Départ" id="inputKmDepart" name="KmDepart[]" value='.$infoVacation[$i]["km_depart"].' readonly>';
				echo '</div>';
				echo '<div class="form-group col-sm-auto">';
					echo '<label for="inputPPC">Première prise en charge</label>';
					echo '<input type="time" class="form-control PPC Obligatoire" id="inputPPC" name="PPC[]" value='.substr($infoVacation[$i]["premiere_prise_en_charge"],0,-3).' readonly>';
				echo '</div>';
				echo '<div class="form-group col-sm-auto">';
					echo '<label for="inputHeureRetour">Heure de Retour</label>';
					echo '<input type="time" class="form-control HeureRetour Obligatoire" id="inputHeureRetour" name="HeureRetour[]" value='.substr($infoVacation[$i]["heure_retour"],0,-3).' readonly>';
				echo '</div>';
				echo '<div class="form-group col-sm-auto">';
					echo '<label for="inputKmRetour">Kilométrage Retour</label>';
					echo '<input type="text" class="form-control KmRetour Obligatoire" placeholder="Kilométrage Retour" id="inputKmRetour" name="KmRetour[]" value='.$infoVacation[$i]["km_retour"].' readonly>';
				echo '</div>';
			echo '</div>';
		for ($j = 0; $j <$nbPC[$i]["nbPriseEnCharge"]; $j++) {
			echo '<div class="priseEnCharge">';
				echo '<hr>';
				echo '<div class="form-row">';
					echo '<div class="form-group col-sm-auto">';
						echo '<label for="inputPC">heure de PC + ville de PC </br/>+ Nom de la personne transportée</label>';
						echo '<input type="text" class="form-control Obligatoire" id="inputPC" name="PriseCharge[]" value="'.$infoPC[$k]["prise_en_charge"].'" readonly>';
					echo '</div>';
					echo '<div class="form-group col-sm-auto">';
						echo '<label for="inputAbsent"></br/>Absent</label>';
						echo '<input type="text" class="form-control Obligatoire" id="inputAbsent" name="Absent[]" placeholder="oui/non" maxlength="3" value="'.$infoPC[$k]["absent"].'" readonly>';
					echo '</div>';
					echo '<div class="form-group col-sm-auto">';
						echo '<label for="inputObservation"></br/>Observation</label>';
						echo '<input type="text" class="form-control" id="inputObservation" name="Observation[]" value="'.$infoPC[$k]["observation"].'" readonly>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			$k++;
		}
		echo '</div>';
		echo '<div class="trait"></div>';
	}
	

	if ($interval->format('%a') < 4)
	{
		echo '<input type="hidden" name="ficheModifie" value='.$idFiche.'>';
		echo '<input type="button" id="btnModifierFiche" class="btn btn-dark" value="Modifier Fiche">';
	}
	else{
		echo 'Vous ne pouvez plus modifier cette fiche, le délai de 4 jours est dépassé';
	}
	
	

	echo '<div id="newVacation"></div>';
	
	echo '<button id="btnEnvoi" type="submit" class="btn btn-dark" value="EnvoyerJournalier" name="action">Envoyer pointage</button><input type="button" id="btnContinuer" class="btn btn-dark" value="Continuer Pointage">';
	echo '</form>';
	echo '<div id="popup" title="Erreur"></div>';
}
?>