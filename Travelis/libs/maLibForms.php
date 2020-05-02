<?php


/*
Ce fichier définit diverses fonctions permettant de faciliter la production de mises en formes complexes : 
tableaux, formulaires, ...
*/
// Exemple d'appel :  mkLigneEntete($data,array('pseudo', 'couleur', 'connecte'));
function mkLigneEntete($tabAsso,$listeChamps=false)
{
	// Fonction appelée dans mkTable, produit une ligne d'entête
	// contenant les noms des champs à afficher dans mkTable
	// Les champs à afficher sont définis à partir de la liste listeChamps 
	// si elle est fournie ou du tableau tabAsso

	if (!$listeChamps)	// listeChamps est faux  : on utilise le not : '!'
	{
		// tabAsso est un tableau associatif dont on affiche TOUTES LES CLES
		echo "\t<tr>\n";
		foreach ($tabAsso as $cle => $val)	
		{
			echo "\t\t<th>$cle</th>\n";
		}
		echo "\t</tr>\n";
	}
	else		// Les noms des champs sont dans $listeChamps 	
	{
		echo "\t<tr>\n";
		foreach ($listeChamps as $nomChamp)	
		{
			echo "\t\t<th>$nomChamp</th>\n";
		}
		echo "\t</tr>\n";
	}
}

function mkLigne($tabAsso,$listeChamps=false)
{
	// Fonction appelée dans mkTable, produit une ligne 	
	// contenant les valeurs des champs à afficher dans mkTable
	// Les champs à afficher sont définis à partir de la liste listeChamps 
	// si elle est fournie ou du tableau tabAsso

	if (!$listeChamps)	// listeChamps est faux  : on utilise le not : '!'
	{
		// tabAsso est un tableau associatif
		echo "\t<tr>\n";
		foreach ($tabAsso as $cle => $val)	
		{
			echo "\t\t<td>$val</td>\n";
		}
		echo "\t</tr>\n";
	}
	else	// les champs à afficher sont dans $listeChamps
	{
		echo "\t<tr>\n";
		foreach ($listeChamps as $nomChamp)	
		{
			echo "\t\t<td>$tabAsso[$nomChamp]</td>\n";
		}
		echo "\t</tr>\n";
	}
}

// Exemple d'appel :  mkTable($users,array('pseudo', 'couleur', 'connecte'));	
function mkTable($tabData,$listeChamps=false)
{

	// Attention : le tableau peut etre vide 
	// On produit un code ROBUSTE, donc on teste la taille du tableau
	if (count($tabData) == 0) return;

	echo "<table border=\"1\">\n";
	// afficher une ligne d'entete avec le nom des champs
	mkLigneEntete($tabData[0],$listeChamps);

	//tabData est un tableau indicé par des entier
	foreach ($tabData as $data)	
	{
		// afficher une ligne de données avec les valeurs, à chaque itération
		mkLigne($data,$listeChamps);
	}
	echo "</table>\n";

	// Produit un tableau affichant les données passées en paramètre
	// Si listeChamps est vide, on affiche toutes les données de $tabData
	// S'il est défini, on affiche uniquement les champs listés dans ce tableau, 
	// dans l'ordre du tableau
	
}

// Produit un menu déroulant portant l'attribut name = $nomChampSelect

// Produit les options d'un menu déroulant à partir des données passées en premier paramètre
// $champValue est le nom des cases contenant la valeur à envoyer au serveur
// $champLabel est le nom des cases contenant les labels à afficher dans les options
// $selected contient l'identifiant de l'option à sélectionner par défaut
// si $champLabel2 est défini, il indique le nom d'une autre case du tableau 
// servant à produire les labels des options

// exemple d'appel : 
// $users = listerUtilisateurs("both");
// mkSelect("idUser",$users,"id","pseudo");
// TESTER AVEC mkSelect("idUser",$users,"id","pseudo",2,"couleur");

function mkSelect($nomChampSelect, $tabData,$champValue, $champLabel,$selected=false,$champLabel2=false)
{

	$multiple=""; 
	if (preg_match('/.*\[\]$/',$nomChampSelect)) $multiple =" multiple =\"multiple\" ";

	echo "<select $multiple name=\"$nomChampSelect\">\n";
	foreach ($tabData as $data)
	{
		$sel = "";	// par défaut, aucune option n'est préselectionnée 
		// MAIS SI le champ selected est fourni
		// on teste s'il est égal à l'identifiant de l'élément en cours d'affichage
		// cet identifiant est celui qui est affiché dans le champ value des options
		// i.e. $data[$champValue]
		if ( ($selected) && ($selected == $data[$champValue]) )
			$sel = "selected=\"selected\"";

		echo "<option $sel value=\"$data[$champValue]\">\n";
		echo  $data[$champLabel] . "\n";
		if ($champLabel2) 	// SI on demande d'afficher un second label
			echo  " ($data[$champLabel2])\n";
		echo "</option>\n";
	}
	echo "</select>\n";
}

function mkForm($action="",$method="get")
{
	// Produit une balise de formulaire NB : penser à la balise fermante !!
	echo "<form action=\"$action\" method=\"$method\" >\n";
}
function endForm()
{
	// produit la balise fermante
	echo "</form>\n";
}

function mkInput($type,$name,$value="",$attrs="")
{
	// Produit un champ formulaire
	echo "<input $attrs type=\"$type\" name=\"$name\" value=\"$value\"/>\n";
}

function mkRadioCb($type,$name,$value,$checked=false)
{
	// Produit un champ formulaire de type radio ou checkbox
	// Et sélectionne cet élément si le quatrième argument est vrai
	$selectionne = "";	
	if ($checked) 
		$selectionne = "checked=\"checked\"";
	echo "<input type=\"$type\" name=\"$name\" value=\"$value\"  $selectionne />\n";
}

function mkLien($url,$label, $qs="",$attrs="")
{
	echo "<a $attrs href=\"$url?$qs\">$label</a>\n";
}

function mkLiens($tabData,$champLabel, $champCible, $urlBase=false, $nomCible="")
{
	// produit une liste de liens (plus facile à styliser)
	// A partir de données fournies dans un tableau associatif	
	// Chaque lien pointe vers une url définie par le champ $champCible
	
	// SI urlBase n'est pas false, on utilise  l'url de base 
	// (avec son point d'interrogation) à laquelle on ajoute le champ cible 
	// dans la chaîne de requête, associé au paramètre $nomCible, après un '&' 

	// Exemples d'appels : 
	// mkLiens($conversations,"id","theme");
	// produira <a href="1">Multimédia</a> ...

	// mkLiens($conversations,"theme","id","index.php?view=chat","idConv");
	// produira <a href="index.php?view=chat&idConv=1">Multimédia</a> ...

	// parcourir les données de tabData 
	foreach($tabData as $data) {
		// on parcourt uniquement les valeurs
		// a chaque itération, les valeurs sont dans 
		// le tableau $data
		echo '<a href="';
		echo $urlBase . "&" . $nomCible . "=" ;
		echo $data[$champCible];
		echo '">';
		echo $data[$champLabel];
		echo "</a>\n<br />\n";
	}
}


function mkResultat($tabData)
{
	echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
		echo '<table class="table table-dark table-bordered table-hover table-striped mb-0">';
			echo '<thead>';
				echo '<tr>';
					echo '<th scope="col">id</th>';
					echo '<th scope="col">date</th>';	
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			foreach($tabData as $data) {
				// on parcourt uniquement les valeurs
				// a chaque itération, les valeurs sont dans 
				// le tableau $data
				echo '<tr>';
					echo '<th scope="row">';
						echo '<a href="index.php?view=afficherFiche&idFiche='.$data["id"].'">'.$data["id"].'</a>';
					echo '</th>';
					echo'<td>';
						echo '<a href="index.php?view=afficherFiche&idFiche='.$data["id"].'">'.$data["date"].'</a>';
					echo'</td>';
				echo '</tr>';
			}
			echo'</tbody>';
		echo'</table>';
	echo'</div>';
}

function mkResultatMensuelles($tabData)
{
	echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
		echo '<table class="table table-dark table-bordered table-hover table-striped mb-0">';
			echo '<thead>';
				echo '<tr>';
					echo '<th scope="col">id</th>';
					echo '<th scope="col">mois</th>';	
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			foreach($tabData as $data) {
				// on parcourt uniquement les valeurs
				// a chaque itération, les valeurs sont dans 
				// le tableau $data
				echo '<tr>';
					echo '<th scope="row">';
						echo '<a href="index.php?view=afficherFicheMensuelle&idFicheMensuelle='.$data["id"].'">'.$data["id"].'</a>';
					echo '</th>';
					echo'<td>';
						echo '<a href="index.php?view=afficherFicheMensuelle&idFicheMensuelle='.$data["id"].'">'.$data["mois"].'</a>';
					echo'</td>';
				echo '</tr>';
			}
			echo'</tbody>';
		echo'</table>';
	echo'</div>';
}


function mkMensuelle($tabData)
{
	echo '<div class="col-12">';
		echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
			echo '<table class="table table-dark table-bordered table-hover table-striped mb-0">';
				echo '<thead>';
					echo '<tr>';
						echo '<th scope="col"></th>';
						echo '<th scope="col" colspan="1">Heures</th>';
						echo '<th scope="col">Vehicule</th>';
						echo '<th scope="col" colspan="3">Kilométrage</th>';
						echo '<th scope="col">Carburant</th>';
					echo '</tr>';
					echo '<tr>';
						echo '<th scope="col">Jour + Date</th>';
						echo '<th scope="col">Fiche Journalière</th>';
						echo '<th scope="col">Immatriculation</th>';
						echo '<th scope="col">Début</th>';
						echo '<th scope="col">Fin</th>';
						echo '<th scope="col">Total</th>';
						echo '<th scope="col">En Euro</th>';
					echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				//$temps_total = "00:00:00";
				foreach($tabData as $data) {
					// on parcourt uniquement les valeurs
					// a chaque itération, les valeurs sont dans 
					// le tableau $data
					echo '<tr>';
						echo'<td>';
							echo '<a href="index.php?view=afficherFiche&idFiche='.$data["id"].'">'.jour($data["Jour"]).' '.$data["Date"].'</a>';
						echo'</td>';
						echo'<td>';
							echo substr($data["Heures"],0,-3);//permet de ne pas afficher les secondes (qui sont toujours à 00)
						echo'</td>';
						echo'<td>';
							echo $data["Vehicule"];
						echo'</td>';
						echo'<td>';
							echo $data["Debut"];
						echo'</td>';
						echo'<td>';
							echo $data["Fin"];
						echo'</td>';
						echo'<td>';
							echo $data["Total"];
						echo'</td>';
						echo'<td>';
							echo $data["Carburant"];
						echo'</td>';
					echo '</tr>';
				}
				echo'</tbody>';
			echo'</table>';
		echo'</div>';
	echo'</div>';
}

function mkTotalMensuelle($data)
{
	echo '<div class="col-12">';
		echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
			echo '<table class="table table-dark table-bordered table-hover table-striped mb-0">';
				echo '<thead>';
					echo '<th scope="col">Total Heures</th>';
					echo '<th scope="col">Total Kilométrage</th>';
					echo '<th scope="col">Total Carburant</th>';
				echo '</thead>';
				echo '<tbody>';
					echo '<tr>';
						echo'<td>';
							echo substr($data[0]["TotalHeure"],0,-3);
						echo'</td>';
						echo'<td>';
							echo $data[0]["TotalKm"];
						echo'</td>';
						echo'<td>';
							echo $data[0]["TotalCarburant"];
						echo'</td>';
					echo '</tr>';
				echo'</tbody>';
			echo'</table>';
		echo'</div>';
	echo'</div>';		
}

function jour($numJour){
	switch ($numJour) {
		
		case 1:
			return "Dimanche";
			break;
		case 2:
			return "Lundi";
			break;
		case 3:
			return "Mardi";
			break;
		case 4:
			return "Mercredi";
			break;
		case 5:
			return "Jeudi";
			break;
		case 6:
			return "Vendredi";
			break;
		case 7:
			return "Samedi";
			break;	
	}
}
?>

















