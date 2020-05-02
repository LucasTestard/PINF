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
	if ($classe == "bl")
		$SQL .= " where blacklist=1";
	if ($classe == "nbl")
		$SQL .= " where blacklist=0";
	
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

function UserExist($id)
{
	$SQL="SELECT id FROM user where login='$id'";
	
	return SQLGetchamp($SQL);
}

function ajoutUtilisateur($nom,$prenom,$id,$mdp,$confmdp,$role)
{
	$SQL="INSERT INTO user VALUES (NULL,'$nom','$prenom','$role','$id','$mdp')";
	SQLInsert($SQL);
}

function verifImma($vehicule_Imma)
{
	$SQL="SELECT Immatriculation from vehicule WHERE immatriculation like '$vehicule_Imma'";
	return SQLSelect($SQL);
}

function ajoutVehicule($vehicule_Imma,$vehicule_Type,$vehicule_Km)
{
	$SQL="INSERT INTO vehicule VALUES (NULL,'$vehicule_Imma','$vehicule_Type','$vehicule_Km')";
	SQLInsert($SQL);
}

function DataTabUser()
{
	$SQL = "SELECT nom, prenom, login, passe, droit from user order by nom"; 
	return parcoursRs(SQLSelect($SQL)); 
}

function DataTabVehicule()
{
	$SQL = "SELECT immatriculation, type_vehicule, km from vehicule order by id"; 
	return parcoursRs(SQLSelect($SQL)); 
}

function verifLogin($Login)
{
	$SQL="SELECT login from user WHERE login like '$Login'";
	return SQLSelect($SQL);
}

function SuppLogin($LoginSupp)
{
	$SQL="DELETE FROM `user` WHERE `login`='$LoginSupp'";
	/*echo $SQL;
	die();*/
	return SQLDelete($SQL);
}

function SuppVehicule($VehiculeSupp)
{
	$SQL="DELETE FROM `vehicule` WHERE `immatriculation`='$VehiculeSupp'";
	/*echo $SQL;
	die();*/
	return SQLDelete($SQL);
}

?>
