<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}
/*
// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
*/
?>

<link rel="stylesheet" href="css/styleInfo.css">

<!--
<div id="entete">
        <h1>TRAVELIS</h1>
        <h1>FICHE D'INFORMATION</h1>
</div>

<form action="controleur.php">
    <div id="enveloppe">
        <div id="information">
            <span class="PremColonne"> Date</span>
            <input type="text" class="TextPremCol" name=date>
            <span class="SecColonne"> Heure</span>
            <input type="text"  class="TextSecCol" name=heure>  <br><br>
            <span class="PremColonne"> Nom Prénom (conducteur)</span>
            <input type="text" class="TextPremCol" name=idConducteur>
            <span class="SecColonne"> Immatriculation</span>
            <input type="text" class="TextSecCol" name=immatricualtion> <br><br>
            <span class="PremColonne"> Nom Prénom (client)</span>
            <input type="text" class="TextPremCol" name=idClient >
            <span class="SecColonne"> Nom de l'Etablissement</span>
            <input type="text" class="TextSecCol" name=idEtab> <br>
        </div>

        <div id="Description">
            <h1>Description</h1>
            <span class="span">Décrivez tous les évènements imprévus..</span><br><br>

            <div id="contenuDescD">
                <h2>Autres informations ou réclamations :</h2>
                <textarea rows="15"></textarea>
                <h2>Actions menées par le conducteur </h2>
                <textarea rows="15"></textarea>
            </div>

            <div id="contenuDescG">
                <h2>Ponctualité</h2>
                <input type="radio" name="Ponct"> Retard<br><br>
                <input type="radio" name="Ponct"> Avance<br><br>
                Motif : <input type="text" name=motif> <br><br><br><br>

            

                <h2>Véhicule</h2>
                <input type="radio" name="Vehic"> Véhicule non adapté aux besoins du client<br><br>
                <input type="radio" name="Vehic"> Véhicule en panne ou accidenté<br><br>
                Préciser les circonstances : <input type="text" name=circonstances> <br><br><br>
            </div>
		<br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>
            <div id="Traitement">
                <h2>Traitement administratif</h2>
                <spann>Traité par:</spann> <input type=text name=serviceAdmin> <br><br>
                <span class="span">Le :</span> <input type=text name=dateAdmin> <br><br>
                <span class="span">Traitement effectué :</span> <br><textarea rows="8" style="width:60%;"></textarea>
            </div>
		</div> 
	<input type=submit value=Envoyer name=action id=envoyer >
</form>
    
    </div>-->
	<form action="controleur.php">
        <div class="container">
            <h1 class="col-12" id=titre>TRAVELIS <br> FICHE D'INFORMATION</h1><br>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <span class="span"> Date </span> <input type=date name=dateRedaction> <br><br>
                    <span class="span"> Identifiant Conducteur</span>  <input type=text class=text name=idConducteur> <br><br>
                    <span class="span"> Nom Client</span>  <input type=text class=text name=idClient>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <span class="span"> Heure</span>  <input type="time" name=heureRedaction> <br><br>
                    <span class="span"> Immatriculation</span>  <input type=text class=text name=immatricualtion> <br><br>
                    <span class="span"> Nom de l'Etablissement</span>  <input type=text class=text name=idEtab>
                </div>

            </div> 
            <br><br><br>
            <div class="row">
                <div class="col-lg-6">
                    <h1> Description</h1>
                    <span class="span">Décrivez tous les évènements imprévus..</span><br><br>
                    <h2>Ponctualité</h2>
                    <input type="radio" name="Ponct"> Retard<br><br>
                    <input type="radio" name="Ponct"> Avance<br><br>
                    <span class="span">Motif :</span>
                    <input type="text" class=text name=motif> <br><br><br><br>

                    <h2>Accueil</h2>
                    <input type="radio" name=reservation> Le client a des difficultés pour joindre la réservation <br><br>
                    <span class="span">Date du jour </span> <input type=date name=dateIncident><br><br>
                    <span class="span">Heure de l'incident</span> <input type=time name=heureIncident><br><br><br><br>

                    <h2>Véhicule</h2>
                    <input type="radio" name="Vehic"> Véhicule non adapté aux besoins du client<br><br>
                    <input type="radio" name="Vehic"> Véhicule en panne ou accidenté<br><br>
                    <span class="span">Préciser les circonstances : </span>
                    <input type="text" class=text name=circonstances> 
                    <br>
                </div>
                <div class="col-lg-6"> <br><br>
                    <h2>Autres informations ou réclamations :</h2>
                    <textarea  rows="8"  style="width:100%;"></textarea><br><br><br><br>
                    <h2>Actions menées par le conducteur </h2>
                    <textarea rows="8" style="width:100%; "></textarea>
                </div>
            </div><br><br>
            <div class="row" id="PageInfoPartieAdmin">
                <div class="col-lg-12">
                    <h2>Traitement administratif</h2>
                    <span>Traité par:</span> <input type=text name=serviceAdmin> <br><br>
                    <span>Le :</span> <input type=date name=dateAdmin> <br><br>
                    <span>Traitement effectué :</span> <br><textarea rows="8" style="width:100%;" name=descriptionTraitement></textarea>
                </div>
            </div>
            <input type=submit value=Envoyer name=action id=envoyer class="btn btn-dark" >
            <br><br><br><br>
        </div> 
    </form>
