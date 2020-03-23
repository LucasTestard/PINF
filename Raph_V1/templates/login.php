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
<div class="container">
	<div class="row justify-content-lg-center align-middle">
		<form id="connexion" class="form-signin">
			<div class="form-group">
				<label for="Identifiant">Identifiant</label>
				<input type="email" class="form-control" id="Identifiant" aria-describedby="aideIdentifiant">
				<small id="aideIdentifiant" class="form-text text-muted">Celui figurant sur le courrier</small>
			</div>
			<div class="form-group">
				<label for="mdp">Mot de Passe</label>
				<input type="password" class="form-control" id="mdp">
				<small id="aideIdentifiant" class="form-text text-muted">Celui figurant sur le courrier OU celui que vous avez défini</small>
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" id="CBsouvenir">
				<label class="form-check-label" for="CBsouvenir">Se souvenir de moi</label>
			</div>
			<button type="submit" class="btn btn-dark">Se Connecter</button>
		</form>
	</div>
</div>