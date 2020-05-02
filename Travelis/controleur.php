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
		// A EVITER
		
		switch($action)
		{
			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($passe = valider("passe","POST"))
				if ($login = valider("login","POST"))
				{
					//On verifie l'utilisateur, et on crée des variables de session si tout est OK
					if (verifUser($login,$passe)) {
						$_SESSION["login"]=$login;
						$_SESSION["passe"]=$passe;
						$_SESSION["nom"] = nomfromlogin($login);
						$_SESSION["prenom"] = prenomfromlogin($login);

						$addArgs = "?view=accueil&message=Vous êtes connecté"; //Selectionner la bonne vue (accueil)
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

			case 'AfficherFicheMensuelleActuelle' :			
				if ($idUser = valider("idUser","SESSION"))
				if ($anneeMois = valider("anneeMois"))
				{
					$idFicheMensuelle=existMensuelle($anneeMois,$idUser);
					$addArgs = "?view=mensuel&idFicheMensuelle=".$idFicheMensuelle; 
				}
			break;	

			case 'AfficherPointage' :
				if ($idFiche = valider("fiche"))
				{
					$addArgs = "?view=afficherFiche&idFiche=".$idFiche; 
				}
			break;

			case 'RechercherFichesJournalieres' :
				if ($idUser = valider("idUser","SESSION"))
				if ($dateDebut = valider("DateDebut","POST"))
				if ($dateFin = valider("DateFin","POST"))
				{
					$addArgs = "?view=ancien&idUser=".$idUser."&dateFin=".$dateFin."&dateDebut=".$dateDebut; 
				}
			break;

			case 'RechercherFichesMensuelles' :
				if ($idUser = valider("idUser","SESSION"))
				if ($annee = valider("annee","POST"))
				{
					$addArgs = "?view=ancien&idUser=".$idUser."&annee=".$annee; 	
				}

			break;

			case 'EnvoyerJournalier' :
				

				if (valider("connecte","SESSION")) // On verifie Si l'utilisateur est toujours connecté
				if ($idUser = valider("idUser","SESSION"))
				if ($immatriculation = valider("immatriculation","POST"))
				if ($nom = valider("nom","POST"))
				if ($prenom = valider("prenom","POST"))
				if ($date = valider("date","POST"))
				if ($idVehicule = verifVehicule($immatriculation)) //On verifie si la plaque du vehicule existe dans la BDD
				if ($nbVacation = valider("nbVacation","POST"))
				if ($nbPC = valider("nbPC","POST"))
				if ($heureDepart = valider("HeureDepart","POST"))
				if ($kmDepart = valider("KmDepart","POST"))
				if ($PPC = valider("PPC","POST"))
				if ($heureRetour = valider("HeureRetour","POST"))
				if ($kmRetour = valider("KmRetour","POST"))
				if ($priseCharge = valider("PriseCharge","POST"))
				if ($absent = valider("Absent","POST"))
				if ($observation = valider("Observation","POST"))
				if ($dateEnvoi = valider("dateRemplissage","POST"))
				{
					$prixCarburant=valider("prixCarburant","POST");
					$tempsAttente=valider("tempsAttente","POST");
					if($prixCarburant=="") $prixCarburant=0.00;
					if($tempsAttente=="") $tempsAttente='00:00';

					$anneeMois = getAnneeMois($date);

					if($ficheModifie = valider("ficheModifie","POST")){
						supprimerFicheJournaliere($ficheModifie);
					}
					//Si une fiche mensuelle existe pour ce mois (aaaa-mm) et cet utilisateur
					if($idFicheMensuelle=existMensuelle($anneeMois,$idUser))
					{
						// On crée le pointage journalier (et on récupère l'id)
						$idFicheJournaliere=pointageJournalier($idUser,$idVehicule,$date,$idFicheMensuelle,$tempsAttente,$prixCarburant,$dateEnvoi); 
						creerVacationsFicheJournaliere($idFicheJournaliere,$nbVacation,$nbPC,$heureDepart,$kmDepart,$PPC,$heureRetour,$kmRetour,$priseCharge,$absent,$observation);
						$addArgs = "?view=accueil&message=Fiche créée";
						if($ficheModifie = valider("ficheModifie","POST")){	
							modifierJournalier($idUser,$idFicheJournaliere);
							$addArgs = "?view=accueil&message=Fiche Modifiée";
						}
					}
					else{
						//SINON On crée la fiche mensuelle correspondante
						$idFicheMensuelle=pointageMensuel($idUser,$date);
						//PUIS
						$idFicheJournaliere=pointageJournalier($idUser,$idVehicule,$date,$idFicheMensuelle,$tempsAttente,$prixCarburant,$dateEnvoi);
						creerVacationsFicheJournaliere($idFicheJournaliere,$nbVacation,$nbPC,$heureDepart,$kmDepart,$PPC,$heureRetour,$kmRetour,$priseCharge,$absent,$observation);
						$addArgs = "?view=accueil&message=Fiche créée";
						if($ficheModifie = valider("ficheModifie","POST")){	
							modifierJournalier($idUser,$idFicheJournaliere);
							$addArgs = "?view=accueil&message=Fiche Modifiée";
						}
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










