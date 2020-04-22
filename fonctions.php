<?php

//modif de la bdd dans la table fiche_reparation: ajouter une colonne date (la date de l'accident) et enlever les not null pour lieu_reparation, date_reparation et travaux_effectues car pas forcement de réparation.


// case à ajouter dans le controleur
case 'EnvoyerReparation' :	
				if (valider("connecte","SESSION")) // On verifie Si l'utilisateur est toujours connecté
				if ($idUser = valider("idUser","SESSION"))
				if ($immatriculation = valider("immatriculation"))
				if ($nom = valider("nom"))
				if ($prenom = valider("prenom"))
				if ($date = valider("date"))
				if ($anomalies = valider("anomalies"))
				{if ($idVehicule = verifVehicule($immatriculation)) //On verifie si la plaque du vehicule existe dans la BDD
				
					if (!($lieux = valider("lieux")))
						$lieux="null";
					if (!($travEff = valider("travEff")))
						$travEff="null";
					if (!($dateRep = valider("dateRep")))
						$dateRep="null";
					
					reparation($idUser,$idVehicule,$date,$anomalies,$lieux,$travEff,$dateRep);

				}
			break;


// fonction à ajouter dans le modele

function reparation($idUser,$idVehicule,$date,$anomalies,$lieux,$travEff,$dateRep){

	$SQL="INSERT INTO fiche_reparation (id_user,id_vehicule,date,anomalies_constatees,lieu_reparation,date_reparation,travaux_effectues)
		VALUES ('12','15','$date','$anomalies','$lieux','$dateRep','$travEff')";

	SQLInsert($SQL);
}



?>            