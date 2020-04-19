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


<form class="container-fluid">
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="inputNom">Nom</label>
			<input type="text" class="form-control" placeholder="Nom" id="inputNom" name="nom" value='<?php if(isset($_SESSION["nom"])) echo $_SESSION["nom"]?>' required>
		</div>
		<div class="form-group col-md-3">
			<label for="inputPrenom">Prenom</label>
			<input type="text" class="form-control" placeholder="Prenom" id="inputPrenom" name="prenom" value='<?php if(isset($_SESSION["prenom"])) echo $_SESSION["prenom"]?>' required>
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
				<label for="inputHeureDepart">Heure de Depart</label>
				<input type="time" class="form-control" id="inputHeureDepart" name="HeureDepart" >
			</div>
			<div class="form-group col-md-3">
				<label for="inputKmDepart">Kilometrage Depart</label>
				<input type="text" class="form-control" placeholder="Kilometrage Depart" id="inputKmDepart" name="KmDepart" >
			</div>
			<div class="form-group col-md-2">
				<label for="inputPPC">Première prise en charge</label>
				<input type="time" class="form-control" id="inputPPC" name="PPC" >
			</div>
			<div class="form-group col-md-2">
				<label for="inputHeureRetour">Heure de Retour</label>
				<input type="time" class="form-control" id="inputHeureRetour" name="HeureRetour" >
			</div>
			<div class="form-group col-md-3">
				<label for="inputKmRetour">Kilometrage Retour</label>
				<input type="text" class="form-control" placeholder="Kilometrage Retour" id="inputKmRetour" name="KmRetour" >
			</div>
	</div>
	<input type="button" id="btnVerif" class="btn btn-dark" value="Vérifier">
	<div id="popup" title="Erreur"></div>
	
</form>



