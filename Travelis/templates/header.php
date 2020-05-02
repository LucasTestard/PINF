<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

include_once("libs/modele.php");
include_once("libs/maLibForms.php");
/*
// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
*/
//echo $view;
?>

<!doctype html>
<html lang="fr">
  <head>
    <title>Eh ça marche</title>
    <!-- meta tags requis -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Inclusion de notre style APRES celui de bootstrap pour ne pas écraser celui de bootstrap-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style">


	<!-- Bibliothèque Jquery puis Bootstrap -->
	<script src="js/jquery-3.4.1.min.js"></script> <!-- A corriger -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- Implémentation de JQuery par le CDN de Google -->
	<script src="js/bootstrap.min.js"></script>

  <script>
  
    $( document ).ready(function() {
      var page = '<?php echo $view?>'; //On récupère le paramètre qui représente la vue actuelle
      console.log( "ready!" );
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
        default:
        break;
      }
      
        
    });
    
  </script>

    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#banniere" aria-controls="banniere" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php //echo $_SESSION['nom'];?>
      <div class="collapse navbar-collapse" id="banniere">
        <!-- Partie de gauche de la navbar -->
        <ul class="navbar-nav mr-auto">
          <li class="navbar-pages nav-item" id="lienAccueil">
            <a class="nav-link" href="index.php?view=accueil">Accueil</a>
          </li>
          <li class="navbar-pages nav-item" id="lienJournalier">
            <a class="nav-link" href="index.php?view=journalier">Pointage Journalier</a>
          </li>
          <li class="navbar-pages nav-item" id="lienMensuel">
            <a class="nav-link" href="index.php?view=mensuel">Pointage Mensuel</a>
          </li>
          <li class="navbar-pages nav-item" id="lienInformation">
            <a class="nav-link" href="index.php?view=information">Fiche d'Information</a>
          </li>
          <li class="navbar-pages nav-item" id="lienReparation">
            <a class="nav-link" href="index.php?view=reparation">Fiche de Réparation</a>
          </li>
          <li class="navbar-pages nav-item" id="lienSuperAdmin">
            <a class="nav-link" href="index.php?view=super_admin_ajout">Ajout Utilisateur</a>
          </li>
          <li class="navbar-pages nav-item" id="lienSuperAdminVehicule">
            <a class="nav-link" href="index.php?view=vehicule">Ajout Véhicule</a>
          </li>
        </ul>
        <!-- Partie de droite de la navbar -->
        <ul class="navbar-nav ml-auto">
          <li class="navbar-pages nav-item">
            <a class="btn btn-secondary" role="button" href="index.php?view=login">Se Connecter</a>
          </li>
        </ul>
      </div>
    </nav>
    
   

  

  







