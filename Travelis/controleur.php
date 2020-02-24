<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php";
	include_once "libs/maLibBootstrap.php";

	$addArgs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		echo "Action = '$action' <br />";
		// ATTENTION : le codage des caractères peut poser PB si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: A REVOIR !!
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			
			
			// Connexion //////////////////////////////////////////////////
			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($passe = valider("passe"))
				if ($login = valider("login"))
				{
					//On verifie l'utilisateur, et on crée des variables de session si tout est OK
					if (verifUser($login,$passe)) {
						$_SESSION["login"]=$login;
						$_SESSION["passe"]=$passe;
						$addArgs = "?view=accueil"; //Selectionner la bonne vue (accueil)
					}
					//S'il y a une erreur, on redirige vers la page 
					else{
						$addArgs = "?view=login";//Selectionner la bonne vue
					}
				}
				else{//Si les deux champs ne sont pas remplis
					$addArgs = "?view=login"; //Selectionner la bonne vue
				}
			break;

			case 'Logout' :
				session_destroy();
			break;




		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $addArgs);

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>









