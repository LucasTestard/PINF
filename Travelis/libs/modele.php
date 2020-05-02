<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");


function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès
	$SQL="SELECT id FROM user WHERE login='$login' AND passe='$passe'";
	return SQLGetChamp($SQL);
}

function isAdmin($login)
{
	// vérifie si l'utilisateur est un administrateur
	// renvoie faux si user est un simple joueur
	// renvoie l'id de l'utilisateur si c'est un admin
	$SQL ="SELECT id FROM user WHERE login='$login' AND droit>=1";
	return SQLGetChamp($SQL); 
}

function isSuperAdmin($login)
{
	// vérifie si l'utilisateur est un administrateur
	// renvoie faux si user est un simple joueur
	// renvoie l'id de l'utilisateur si c'est un admin
	$SQL ="SELECT id FROM user WHERE login='$login' AND droit=2";
	return SQLGetChamp($SQL); 
}

function nomfromlogin($login)
{
	// renvoie le nom de l'utilisateur
	// dont le login est passé en paramètre
	$SQL ="SELECT nom FROM user WHERE login='$login'";
	return SQLGetChamp($SQL); 
}
function prenomfromlogin($login)
{
	// renvoie le prenom de l'utilisateur
	// dont le login est passé en paramètre
	$SQL ="SELECT prenom FROM user WHERE login='$login'";
	return SQLGetChamp($SQL); 
}

function verifVehicule($immatriculation)
{
	// Vérifie l'existance d'un vehicule 
	// dont l'immatriculation est passe en paramètre
	// renvoie faux si vehicule inconnu
	// renvoie l'id du vehicule si succès
	$SQL="SELECT id FROM vehicule WHERE immatriculation='$immatriculation'";
	return SQLGetChamp($SQL);
}

function getAnneeMois($date)
{
	// Permet d’extraire une date au format AAAA-MM 
	// à partir d’une date au format AAAA-MM-JJ
	$SQL="SELECT SUBSTRING('$date', 1, 7)";
	return SQLGetChamp($SQL);
}

function existMensuelle($anneeMois,$idUser)
{
	// Vérifie l'existance d'une fiche mensuelle correspondant à un utilisateur et à une 'annee-mois'
	// passes en parametre
	// renvoie faux si la fiche n'existe pas
	// renvoie l'id de la fiche si elle existe
	$SQL="SELECT id FROM fiche_mensuelle WHERE id_user='$idUser' AND date LIKE '$anneeMois%' ";
	return SQLGetChamp($SQL);
}

function pointageMensuel($idUser,$date)
{
	// renvoie l'id de la fiche si elle existe
	$SQL ="INSERT INTO fiche_mensuelle(date,id_user)
		VALUES ('$date','$idUser')";
	return SQLInsert($SQL);
}



function pointageJournalier($idUser,$idVehicule,$date,$idMensuelle,$tempsAttente,$prixCarburant,$dateEnvoi)
{
	//TODO: commentaires
	// renvoie l'id de la fiche créer
	$SQL ="INSERT INTO fiche_journaliere (id_user,id_vehicule,date,id_fiche_mensuelle,temps_attente,carburant_euro,date_envoi)
		VALUES ('$idUser', '$idVehicule', '$date','$idMensuelle','$tempsAttente','$prixCarburant','$dateEnvoi')";

	
	return SQLInsert($SQL);
}


function modifierJournalier($idUserModif,$idFicheJournaliere)
{
	//TODO: commentaires
	$SQL ="UPDATE fiche_journaliere
	SET id_user_modif = '$idUserModif'
	WHERE id='$idFicheJournaliere'";
	SQLUpdate($SQL);

}

function creerPriseEnCharge($priseCharge,$absent,$observation,$idVacation,$nbPC)
{
	//TODO: commentaires
	for ($i = 0; $i < $nbPC; $i++) {
		$SQL ="INSERT INTO prise_en_charge (prise_en_charge,absent,observation,id_vacation)
		VALUES ('$priseCharge[$i]', '$absent[$i]', '$observation[$i]','$idVacation')";
		SQLInsert($SQL);
	}
}

function creerVacationsFicheJournaliere($idFicheJournaliere,$nbVacation,$nbPC,$heureDepart,$kmDepart,$PPC,$heureRetour,$kmRetour,$priseCharge,$absent,$observation)
{
	//TODO: commentaires
	for ($i = 0; $i < $nbVacation; $i++) {
		$SQL ="INSERT INTO vacation (heure_depart,km_depart,premiere_prise_en_charge,heure_retour,km_retour,id_fiche_journaliere)
		VALUES ('$heureDepart[$i]', '$kmDepart[$i]', '$PPC[$i]','$heureRetour[$i]','$kmRetour[$i]','$idFicheJournaliere')";
		$idVacation=SQLInsert($SQL);
		creerPriseEnCharge($priseCharge,$absent,$observation,$idVacation,$nbPC[$i]);

	}
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function estModifiePar($idFiche)
{
	$SQL ="SELECT j.id_user_modif, u.prenom, u.nom
	FROM user u , fiche_journaliere j
	WHERE (u.id = j.id_user_modif) AND j.id = $idFiche";


	return parcoursRs(SQLSelect($SQL));
}

function infoFiche($idFiche)
{

	$SQL ="SELECT u.nom, u.prenom, j.date, v.immatriculation, j.carburant_euro, j.temps_attente, j.date_envoi
	FROM user u , fiche_journaliere j , vehicule v 
	WHERE (u.id = j.id_user) AND (j.id_vehicule = v.id) AND j.id = $idFiche";

	return parcoursRs(SQLSelect($SQL));
}

function infoVacation($idFiche)
{
	$SQL ="SELECT v.heure_depart, v.km_depart, v.premiere_prise_en_charge, v.heure_retour, v.km_retour 
	FROM vacation v 
	WHERE id_fiche_journaliere=$idFiche";

	return parcoursRs(SQLSelect($SQL));
}

function nbVacation($idFiche)
{
	$SQL ="SELECT COUNT(*) AS nbVacation FROM vacation WHERE id_fiche_journaliere=$idFiche";

	return parcoursRs(SQLSelect($SQL));
}

function nbPC($idFiche)
{
	$SQL ="SELECT COUNT(*) AS nbPriseEnCharge 
	FROM prise_en_charge p, vacation v, fiche_journaliere j 
	WHERE (p.id_vacation = v.id) AND (v.id_fiche_journaliere=j.id) AND j.id =$idFiche
	GROUP BY p.id_vacation";

	return parcoursRs(SQLSelect($SQL));
}


function infoPC($idFiche){
	$SQL ="SELECT p.prise_en_charge, p.absent, p.observation 
	FROM prise_en_charge p, vacation v, fiche_journaliere j 
	WHERE (p.id_vacation = v.id) AND (v.id_fiche_journaliere = j.id) AND j.id =$idFiche
	ORDER BY p.id_vacation ASC";


	return parcoursRs(SQLSelect($SQL));
}


function rechercheFiches($dateDebut,$dateFin,$idUser){
	if($dateDebut < $dateFin){
		$SQL ="SELECT j.id,j.date
		FROM fiche_journaliere j 
		WHERE j.id_user =$idUser AND j.date BETWEEN '$dateDebut' AND '$dateFin'";
	}
	else{
		$SQL ="SELECT j.id,j.date
		FROM fiche_journaliere j 
		WHERE j.id_user =$idUser AND j.date BETWEEN '$dateFin' AND '$dateDebut'";
	}
	return parcoursRs(SQLSelect($SQL));
}

function rechercheFichesMensuelles($idUser,$annee){
	$SQL ="SELECT m.id, SUBSTRING(m.date,1,7) AS mois
	FROM fiche_mensuelle m
	WHERE m.id_user=$idUser AND SUBSTRING(m.date,1,4)=$annee";

	return parcoursRs(SQLSelect($SQL));
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function infoFicheMensuelle($idFicheMensuelle)
{
	$SQL = "SELECT j.id AS 'id',DAYOFWEEK(j.date) AS 'Jour',j.date AS 'Date',SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(v.heure_retour, v.heure_depart)))) AS 'Heures',
	c.immatriculation AS 'Vehicule',MIN(v.km_depart) AS 'Debut',MAX(v.km_retour) AS 'Fin',(MAX(v.km_retour)-MIN(v.km_depart)) AS 'Total', j.carburant_euro AS 'Carburant'
	FROM vacation v, fiche_journaliere j,vehicule c, fiche_mensuelle m
	WHERE (v.id_fiche_journaliere = j.id) AND (j.id_vehicule=c.id) AND (j.id_fiche_mensuelle=m.id) AND (m.id=$idFicheMensuelle)
	GROUP BY v.id_fiche_journaliere
	ORDER BY j.date ASC";

	return parcoursRs(SQLSelect($SQL));
}


function totauxFicheMensuelle($idFicheMensuelle)
{
	$SQL = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(v.heure_retour, v.heure_depart)))) AS 'TotalHeure',SUM(v.km_retour-v.km_depart) AS 'TotalKm', ROUND(SUM(j.carburant_euro),2) AS 'TotalCarburant'
	FROM vacation v, fiche_journaliere j, fiche_mensuelle m
	WHERE (v.id_fiche_journaliere = j.id) AND (j.id_fiche_mensuelle=m.id) AND (m.id=$idFicheMensuelle)";

	return parcoursRs(SQLSelect($SQL));
}


function supprimerFicheJournaliere($idFiche)
{
	$SQL = "DELETE p.* FROM prise_en_charge p, vacation v, fiche_journaliere j  WHERE (p.id_vacation = v.id) AND (v.id_fiche_journaliere=j.id) AND (j.id=$idFiche)";
	SQLDelete($SQL);
	$SQL = "DELETE v.* FROM vacation v , fiche_journaliere j WHERE (v.id_fiche_journaliere=j.id) AND (j.id=$idFiche)";
	SQLDelete($SQL);
	$SQL = "DELETE j.* FROM fiche_journaliere j WHERE (j.id=$idFiche)";
	SQLDelete($SQL);
}

?>
