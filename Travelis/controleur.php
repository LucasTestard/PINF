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
						$_SESSION["nom"] = nomfromlogin($login);
						$_SESSION["prenom"] = prenomfromlogin($login);
						//tprint($_SESSION);
						//die();
						
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

			case 'EnvoyerJournalier' :
				if (valider("connecte","SESSION")) // On verifie Si l'utilisateur est toujours connecté
				if ($idUser = valider("idUser","SESSION"))
				if ($immatriculation = valider("immatriculation"))
				if ($nom = valider("nom"))
				if ($prenom = valider("prenom"))
				if ($date = valider("date"))
				if ($idVehicule = verifVehicule($immatriculation)) //On verifie si la plaque du vehicule existe dans la BDD
				if ($nbVacation = valider("nbVacation"))
				if ($nbPC = valider("nbPC"))
				if ($heureDepart = valider("HeureDepart"))
				if ($kmDepart = valider("KmDepart"))
				if ($PPC = valider("PPC"))
				if ($heureRetour = valider("HeureRetour"))
				if ($kmRetour = valider("KmRetour"))
				if ($priseCharge = valider("PriseCharge"))
				if ($absent = valider("Absent"))
				if ($observation = valider("Observation"))
				{
					// tprint($_GET);
					// die();
					$mois=getMois($date);
					if($idFicheMensuelle=existMensuelle($mois,$idUser))
					{
						// On crée le pointage journalier (on récup l'id)
						$idFicheJournaliere=pointageJournalier($idUser,$idVehicule,$date,$idFicheMensuelle);
						
						
						creerVacationsFicheJournaliere($idFicheJournaliere,$nbVacation,$nbPC,$heureDepart,$kmDepart,$PPC,$heureRetour,$kmRetour,$priseCharge,$absent,$observation);
					}
					
					else{
						//On crée la fiche mensuelle correspondante
						$idFicheMensuelle=pointageMensuel($idUser,$date);
						//PUIS
						$idFicheJournaliere=pointageJournalier($idUser,$idVehicule,$date,$idFicheMensuelle);
						creerVacationsFicheJournaliere($idFicheJournaliere,$nbVacation,$nbPC,$heureDepart,$kmDepart,$PPC,$heureRetour,$kmRetour,$priseCharge,$absent,$observation);
					}
				}
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










