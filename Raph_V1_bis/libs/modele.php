<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");


function listerUtilisateurs($classe = "both")
{
	// NB : la présence du symbole '=' indique la valeur par défaut du paramètre s'il n'est pas fourni
	// Cette fonction liste les utilisateurs de la base de données 
	// et renvoie un tableau d'enregistrements. 
	// Chaque enregistrement est un tableau associatif contenant les champs 
	// id,pseudo,blacklist,connecte,couleur

	// Lorsque la variable $classe vaut "both", elle renvoie tous les utilisateurs
	// Lorsqu'elle vaut "bl", elle ne renvoie que les utilisateurs blacklistés
	// Lorsqu'elle vaut "nbl", elle ne renvoie que les utilisateurs non blacklistés

	$SQL = "select * from users";
/*	if ($classe == "bl")
		$SQL .= " where blacklist=1";
	if ($classe == "nbl")
		$SQL .= " where blacklist=0";*/
	
	// echo $SQL;
	return parcoursRs(SQLSelect($SQL));

}


function interdireUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à vrai
	$SQL = "UPDATE users SET blacklist=1 WHERE id='$idUser'";
	// les apostrophes font partie de la sécurité !! 
	// Il faut utiliser addslashes lors de la récupération 
	// des données depuis les formulaires

	SQLUpdate($SQL);
}

function autoriserUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à faux 
	$SQL = "UPDATE users SET blacklist=0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT id FROM users WHERE pseudo='$login' AND passe='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}
function creerFicheInformation($dateRedaction, $heureRedaction, $idConducteur, $immatricualtion, $idClient, $idEtab, $motif, $reservation, $dateIncident, $heureIncident, $circonstances, $ponctualite, $vehicules, $serviceAdmin, $dateAdmin, $descriptionTraitement)
{
//	$heure+= 00;
//	echo $heure;
	$SQL="INSERT INTO `fiche_information`
	(`id_user`, `date_redaction`, `id_user`, `nom_client`, `heure_redaction`, `id_vehicule`, `nom_etablissement`, `date_difficulte`,`heure_difficulte`, `retard`,
	`motif_retard`, `difficulte_reservation`, `date_incident`, `heure_incident`, `vehicule_panne_accident`, `circonstance_panne_accident`, `autre_info_reclamation`, `actions_conducteur`, `	traitement_id_superuser`,`traitement_date`, `traitement_desc`) 
		VALUES (1, $dateRedaction, $heureRedaction, $idConducteur, $immatricualtion, $idClient, $idEtab, $motif,
	$reservation, $dateIncident, $heureIncident, $circonstances, $ponctualite, $vehicules, $serviceAdmin, 
	$dateAdmin, $descriptionTraitement  )";

	return $SQL;

/*
	INSERT INTO `message` (`id`, `idConversation`, `idAuteur`, `contenu`) VALUES
	(1, 1, 3, 'Que penses-tu de la nouvelle organisation des cours d''ISIM ? Pas mal, non ?')*/
}

?>
