<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php"){
	header("Location:../index.php");
	die("");
}
/*
// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
*/
?>


<form class="container-fluid">
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="inputNom">Nom</label>
			<input type="text" class="form-control" placeholder="Nom" id="inputNom" name="nom" required>
		</div>
		<div class="form-group col-md-3">
			<label for="inputPrénom">Prénom</label>
			<input type="text" class="form-control" placeholder="Prénom" id="inputPrénom" name="prénom" required>
		</div>
		<div class="form-group col-md-3">
			<label for="inputDate">Date</label>
			<input type="date" class="form-control" placeholder="Date" id="inputDate" name="date" required>
		</div>
		<div class="form-group col-md-3">
			<label for="inputNom">Immatriculation</label>
			<input type="text" class="form-control" placeholder="Immatriculation" id="inputImmatriculation" name="immatriculation" required>
		</div>
	</div>
	<div class="form-row vacation">
			<div class="form-group col-md-2">
				<label for="inputHeureDépart">Heure de Départ</label>
				<input type="time" class="form-control" id="inputHeureDépart" name="HeureDépart" required>
			</div>
			<div class="form-group col-md-3">
				<label for="inputKmDépart">Kilométrage Départ</label>
				<input type="text" class="form-control" placeholder="Kilométrage Départ" id="inputKmDépart" name="KmDépart" required>
			</div>
			<div class="form-group col-md-2">
				<label for="inputPPC">Première prise en charge</label>
				<input type="time" class="form-control" id="inputPPC" name="PPC" required>
			</div>
			<div class="form-group col-md-2">
				<label for="inputHeureRetour">Heure de Retour</label>
				<input type="time" class="form-control" id="inputHeureRetour" name="HeureRetour" required>
			</div>
			<div class="form-group col-md-3">
				<label for="inputKmRetour">Kilométrage Retour</label>
				<input type="text" class="form-control" placeholder="Kilométrage Retour" id="inputKmRetour" name="KmRetour" required>
			</div>
	</div>
	<button type="submit" class="btn btn-dark" value="EnvoyerJournalier" name="action">Vérifier & Envoyer</button>
	
</form>



