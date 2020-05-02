<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

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
				if ($login = valider("login"))
				if ($passe = valider("passe"))
				{
					// On verifie l'utilisateur, 
					// et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					if (verifUser($login,$passe)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 
						if (valider("remember")) {
							setcookie("login",$login , time()+60*60*24*30);
							setcookie("passe",$password, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
						}

					}	
				}

				// On redirigera vers la page index automatiquement
			break;

			case 'Logout' :
				session_destroy();
			break;

			case 'Ajouter Utilisateur':
					$nom = addslashes($_POST['nom']);
					$prenom = addslashes($_POST['prenom']);
					$role = addslashes($_POST['role']);
					$id = $prenom[0].$nom;
					$mdp = addslashes($_POST["mdp"]);
					$confmdp = addslashes($_POST["confmdp"]);
					if($role=="Conducteur")
					{
						$role="0";
					}
					if($role=="Administrateur")
					{
						$role="1";
					}
					if($role=="SuperAdministrateur")
					{
						$role="2";
					}
					
					if($confmdp==$mdp)
					{
						ajoutUtilisateur($nom,$prenom,$id,$mdp,$confmdp,$role); //On crée l'utilisateur		
					}
					
					
			break;


		case 'Ajouter Vehicule':
			$vehicule_Imma = addslashes($_POST['vehicule_Imma']);
			$vehicule_Type = addslashes($_POST['vehicule_Type']);
			$vehicule_Km = addslashes($_POST['vehicule_Km']);
			if (!verifImma($vehicule_Imma))
			{
							ajoutVehicule($vehicule_Imma,$vehicule_Type,$vehicule_Km); //On ajoute le véhicule		
			}
		break;


		case 'Suppression Utilisateur':
			$loginSuppression = addslashes($_POST['loginSuppression']);
			//echo $loginSuppression;
			//die();
			if (verifLogin($loginSuppression))
			{
				SuppLogin($loginSuppression);		
			}
		break;

		case 'Suppression Vehicule':
			$vehiculeSuppression = addslashes($_POST['vehiculeSuppression']);
			//echo $vehiculeSuppression;
			//die();
			if (verifImma($vehiculeSuppression))
			{
				SuppVehicule($vehiculeSuppression);		
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










