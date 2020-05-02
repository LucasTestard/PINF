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

<!-- **** B O D Y **** -->
<body >
    <div id="entete">
        <h1>TRAVELIS</h1>
        <h1>FICHE D'INFORMATION</h1>
    </div>

    <div id="enveloppe">
        <form>
        <fieldset id="information">
        <legend>Information</legend>
            <span class="PremColonne"> Date</span>
            <input type="date" class="TextPremCol">
            <span class="SecColonne"> Heure</span>
            <input type="time"  class="TextSecCol"/>  <br><br>
            <span class="PremColonne"> Nom Prénom (conducteur)</span>
            <input type="text" class="TextPremCol" >
            <span class="SecColonne"> Immatriculation</span>
            <input type="text" class="TextSecCol"> <br><br>
            <span class="PremColonne"> Nom Prénom (client)</span>
            <input type="text" class="TextPremCol" >
            <span class="SecColonne"> Nom de l'Etablissement</span>
            <input type="text" class="TextSecCol"> <br>
        </fieldset>
        </form>

        <div id="Description">
            <h1>Description</h1>
            <span>Décrivez tous les évènements imprévus..</span><br><br>

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
                Motif : <input type="text"> <br><br><br><br>

                <h2>Accueil</h2>
                <input type="radio"> Le client a des difficultés pour joindre la réservation <br><br>
                Date du jour  <input type="date"><br><br>
                Heure <input type="time"><br><br><br><br>

                <h2>Véhicule</h2>
                <input type="radio" name="Vehic"> Véhicule non adapté aux besoins du client<br><br>
                <input type="radio" name="Vehic"> Véhicule en panne ou accidenté<br><br>
                Préciser les circonstances : <input type="text"> <br><br><br>
            </div>

            <div id="Traitement">
                <h2>Traitement administratif</h2>
                <spann>Traité par:</spann> <input type=text> <br><br>
                <span>Le :</span> <input type=date> <br><br>
                <span>Traitement effectué :</span> <br><textarea rows="8" style="width:60%;"></textarea>
            </div>
        </div>
    <input type=submit value=Envoyer id=envoyer>
    </div>

</body>

</html>