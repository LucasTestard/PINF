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
	<div class="row justify-content-lg-center align-middle ">
		<form id="connexion" class="form-signin col-md-6" action="controleur.php" method="post">
			<div class="form-group ">
				<label for="Identifiant">Identifiant</label>
				<input type="text" class="form-control" id="Identifiant" aria-describedby="aideIdentifiant" name="login">
				<!-- <small id="aideIdentifiant" class="form-text text-muted">Celui figurant sur le courrier</small> -->
			</div>
			<div class="form-group">
				<label for="mdp">Mot de Passe</label>
				<input type="password" class="form-control" id="mdp" aria-describedby="aideMdp" name="passe">
				<!-- <small id="aideMdp" class="form-text text-muted">Celui figurant sur le courrier OU celui que vous avez défini</small> -->
			</div>
			<button type="submit" class="btn btn-dark" value="Connexion" name="action">Se Connecter</button>
		</form>
	</div>
</div>