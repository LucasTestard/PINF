<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>
	<title>Fiche D'Information</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<!-- **** F I N **** H E A D **** -->
<style>
    #entete{
        border: black 1px solid;
        text-align: center;
        padding: 2px;
    }
    #enveloppe{
        border: black 1px solid;
        padding: 50px 5px 5px 5px;
        margin: 10px;
        padding-bottom: 20px;
    }
    #information{
        border: 1px black solid;
        width: 80%;
        margin: 5px 10% 5px 10%;
        padding: 2%;
    }
    .PremColonne{
        position: absolute;
        margin-right:500px;
        margin-bottom: 20px;
    }
    .SecColonne{
        position:absolute;
        margin-left: 40%;
    }
    .TextPremCol{
        position:absolute;
        margin-left: 13%;
    }
    .TextSecCol{
        position: absolute;
        margin-left: 52%;
    }
    #contenuDescG{
        margin-left: 10%;
    }
    #contenuDescD{
        position: absolute;
        margin-left: 50%;
    }
    textarea{
        resize: none;
        width: 100%;
        height: 100%;
    }
    #Traitement{
        margin-top: 5%;
        border: 1px solid black;
        width: 50%;
        text-align: center;
        margin-left: 25%;
    }
    #envoyer{
        
        margin-left: 70%;
        margin-top: 2%;
        padding: 2% 7% 2% 7%;
        font-size: 200%;
    }
</style>
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

