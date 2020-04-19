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
	$SQL="SELECT id FROM user WHERE login='$login' AND passe='$passe'";
	return SQLGetChamp($SQL);

	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
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


?>
