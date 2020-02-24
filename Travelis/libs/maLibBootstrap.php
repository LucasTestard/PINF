<?php


/*
Ce fichier définit diverses fonctions permettant de faciliter la production de mises en formes complexes
Il est utilisé en conjonction avec le style de bootstrap et insère des classes bootstrap
*/

function mkHeadLink($label,$vue="",$id="")
{
	// Fabrique un lien pour l'entête de navigation

	// EX: mkHeadLink("Accueil","accueil","lienAccueil")
	// produit <li class="navbar-pages nav-item" id="lienAccueil">
	//				<a class="nav-link" href="index.php?view=accueil">Accueil</a>
	//			</li>"
	
	return "<li class=\"navbar-pages nav-item\" id=\"$id\">
				<a class=\"nav-link\" href=\"index.php?view=$vue\">$label</a>
  			</li>";
}

?>
