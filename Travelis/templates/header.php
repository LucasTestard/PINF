<?php
include_once "libs/modele.php";
include_once "libs/maLibForms.php";
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
//echo $view;
?>

<!doctype html>
<html lang="fr">
<head>
	<title>Travelis</title>
	<!-- meta tags requis -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min">
	<!-- Inclusion de notre style APRES celui de bootstrap pour ne pas écraser celui de bootstrap-->
	<!-- /!\ Double inclusion, résout certains problèmes entre Google et Firefox -->
	
	<link rel="stylesheet" href="css/style">
	
	<!-- Bibliothèque Jquery puis Bootstrap -->
	<script src="js/jquery-3.4.1.min.js"></script> <!-- A corriger -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- Implémentation de JQuery par le CDN de Google -->
	
	


	<link rel="stylesheet" href="jqueryui/jquery-ui.min.css">
	<script src="jqueryui/external/jquery/jquery.js"></script>
	<script src="jqueryui/jquery-ui.min.js"></script>


  	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">



	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
  	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>   -->
  
 

	
	<script src="js/bootstrap.min"></script>
	<script src="js/journalier"></script>
	<script src="js/mensuel"></script>
	<script src="js/afficherFiche"></script>
	<script src="js/biblioAjax"></script>
	<script>
	$(document).ready(function() {
		var page = '<?php echo $view?>'; //On récupère le paramètre qui représente la vue actuelle
		console.log( "ready!", page);
		switch(page){
			case 'accueil':
				$('#lienAccueil').addClass('active');
				break;
				case 'journalier':
				$('#lienJournalier').addClass('active');
				break;
				case 'mensuel':
				$('#lienMensuel').addClass('active');
				break;
				case 'information':
				$('#lienInformation').addClass('active');
				break;
				case 'reparation':
				$('#lienReparation').addClass('active');
				break;
				case 'ancien':
				$('#lienAncien').addClass('active');
				break;
				default:
				break;
			}
		});
	</script>
</head>
<body>
	<nav id="navbarSite" class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#banniere" aria-controls="banniere" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="banniere">
			<!-- Partie de gauche de la navbar -->
			<ul class="navbar-nav mr-auto">
			<?php
				//Si l'utilisateur est connecté et qu'il n'est pas admin (c'est un conducteur)
				if(isset($_SESSION["login"]) && !isAdmin($_SESSION["login"]))
				{
					echo mkHeadLink("Accueil","accueil","lienAccueil");
					echo mkHeadLink("Pointage Journalier","journalier","lienJournalier");
					echo mkHeadLink("Pointage Mensuel","mensuel","lienMensuel");
					echo mkHeadLink("Fiche d'Information","information","lienInformation");
					echo mkHeadLink("Fiche de Réparation","reparation","lienReparation");
					echo mkHeadLink("Anciennes Fiches","ancien","lienAncien");
				}
				//Si l'utilisateur est connecté et qu'il est admin
				if(isset($_SESSION["login"]) && isAdmin($_SESSION["login"])){
					echo "TODO";


					
				}
			?>
			</ul>
			<!-- Partie de droite de la navbar -->
			<ul class="navbar-nav ml-auto">
			<?php
				//Si l'utilisateur n'est pas connecté
				if(!valider("connecte","SESSION")){
					echo "<li class=\"navbar-pages nav-item\">
						<a class=\"btn btn-secondary\" role=\"button\" href=\"index.php?view=login\">Se Connecter</a>
					</li>";
				}
				else{
					echo "<li class=\"navbar-pages nav-item\">
						<a class=\"btn btn-secondary\" role=\"button\" href=\"controleur.php?action=Logout\">Se Déconnecter</a>
					</li>";
				}
			?>
			</ul>
		</div>
	</nav>
   
   

  

  







