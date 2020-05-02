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

<form id="pointageJournalier" class="container-fluid" action="controleur.php" method="post">
	<input id="dateDuJour" name="dateRemplissage" type="hidden" value='<?php echo date('Y/m/d'); ?>'>
	
	<div class="form-row justify-content-start">
		<div class="form-group col-md-3">
			<label for="inputNom">Nom</label>
			<input type="text" class="form-control Obligatoire" placeholder="Nom" id="inputNom" name="nom" value='<?php if(isset($_SESSION["nom"])) echo $_SESSION["nom"]?>' required readonly>
		</div>
		<div class="form-group col-md-3">
			<label for="inputPrenom">Prénom</label>
			<input type="text" class="form-control Obligatoire" placeholder="Prenom" id="inputPrenom" name="prenom" value='<?php if(isset($_SESSION["prenom"])) echo $_SESSION["prenom"]?>' required readonly> 
		</div>
		<div class="form-group col-md-3">
			<label for="inputDate">Date</label>
			<input type="date" class="form-control Obligatoire" placeholder="Date" id="inputDate" name="date" required>
		</div>
		<div class="form-group col-md-3">
			<label for="inputImmatriculation">Immatriculation</label>
			<input type="text" class="form-control Obligatoire" placeholder="Immatriculation" id="inputImmatriculation" name="immatriculation" autocomplete="off" required>
			<ul class="list-group">
			</ul>
		</div>
		<div class="form-group col-md-3">
			<label for="inputTempsAttente">Temps d'attente</label>
			<input type="time" class="form-control" placeholder="Temps d'attente" id="inputTempsAttente" name="tempsAttente">
		</div>
		<div class="form-group col-md-3">
			<label for="inputPrixCarburant">Pris Carburant (en euro)</label>
			<input type=number step=0.01 min="0" class="form-control" placeholder="Prix Carburant mis dans le véhicule" id="inputPrixCarburant" name="prixCarburant">
		</div>
	</div>
	<div class="trait"></div>
	<input id="nbVacation" name="nbVacation" type="hidden" value="1">
	<div class="vacation">
		<h1>Vacation</h1>
		
		<input id="nbPC" name="nbPC[]" type="hidden" value="1">
		<div class="form-row d-flex justify-content-start">
			<div class="form-group col-sm-auto">
				<label for="inputHeureDepart">Heure de Départ</label>
				<input type="time" class="form-control HeureDepart Obligatoire" id="inputHeureDepart" name="HeureDepart[]" >
			</div>
			<div class="form-group col-sm-auto">
				<label for="inputKmDepart">Kilométrage Départ</label>
				<input type="text" class="form-control KmDepart Obligatoire" placeholder="Kilométrage Départ" id="inputKmDepart" name="KmDepart[]" >
			</div>
			<div class="form-group col-sm-auto">
				<label for="inputPPC">Première prise en charge</label>
				<input type="time" class="form-control PPC Obligatoire" id="inputPPC" name="PPC[]" >
			</div>
			<div class="form-group col-sm-auto">
				<label for="inputHeureRetour">Heure de Retour</label>
				<input type="time" class="form-control HeureRetour Obligatoire" id="inputHeureRetour" name="HeureRetour[]" >
			</div>
			<div class="form-group col-sm-auto">
				<label for="inputKmRetour">Kilométrage Retour</label>
				<input type="text" class="form-control KmRetour Obligatoire" placeholder="Kilométrage Retour" id="inputKmRetour" name="KmRetour[]" >
			</div>
		</div>
		<div class="priseEnCharge">
			<hr>
			<div class="form-row">
				<div class="form-group col-sm-auto">
					<label for="inputPC">heure de PC + ville de PC </br/>+ Nom de la personne transportée</label>
					<input type="text" class="form-control Obligatoire" id="inputPC" name="PriseCharge[]" >
				</div>
				<div class="form-group col-sm-auto">
					<label for="inputAbsent"></br/>Absent</label>
					<input type="text" class="form-control Obligatoire" id="inputAbsent" name="Absent[]" placeholder="oui/non" maxlength="3">
				</div>
				<div class="form-group col-sm-auto">
					<label for="inputObservation"></br/>Observation</label>
					<input type="text" class="form-control" id="inputObservation" name="Observation[]" >
				</div>
			</div>
		</div>
		<input type="button"  class="btn btn-dark btnAjoutPC" value="Ajouter Prise en charge">
	</div>
	<div class="trait"></div>
	<div id="newVacation"></div>
	<input type="button" id="btnAjoutVacation" class="btn btn-dark" value="Ajouter Vacation"><input type="button" id="btnVerif" class="btn btn-dark" value="Vérifier"><button id="btnEnvoi" type="submit" class="btn btn-dark" value="EnvoyerJournalier" name="action">Envoyer pointage</button><input type="button" id="btnContinuer" class="btn btn-dark" value="Continuer Pointage">
	<div id="popup" title="Erreur"></div>
</form>	

  



	
