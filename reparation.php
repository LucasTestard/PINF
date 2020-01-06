<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>
	<title>Fiche De Réparation</title>
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
        margin-right:10%;
    }
    textarea{
        resize: none;
        width: 100%;
        height: 100%;
    }
    #envoyer{
        margin-left:43%;
        margin-top: 2%;
        padding: 2% 7% 2% 7%;
        font-size: 200%;
    }
</style>
<!-- **** B O D Y **** -->
<body >
    <div id="entete">
        <h1>TRAVELIS</h1>
        <h1>FICHE DE REPARATION</h1>
    </div>

    <div id="enveloppe">
        <div id="information">
            <span class="PremColonne"> Date</span>
            <input type="date" class="TextPremCol">
            <span class="SecColonne"> Nom Prénom (conducteur)</span>
            <input type="text"  class="TextSecCol"/>  <br><br>
            <span class="PremColonne"> Immatriculation</span>
            <input type="text" class="TextPremCol" >
            <span class="SecColonne"> km</span>
            <input type="text" class="TextSecCol"> <br><br>
            <span class="PremColonne"> Type Véhicule</span>
            <input type="text" class="TextPremCol" >
        </div>
    </div>    


    <div id="contenuDescG">
        <h2>Anomalies constatées sur le véhicule :</h2>
        <textarea rows="15"></textarea>
        <h2>Réparation du véhicule:</h2>
        <input type="radio" name="Ponct">Oui<br><br>
        <input type="radio" name="Ponct">Non<br><br>                
        <h2>Lieux de réparation:</h2>
        <input type="text">
        <h2>Travaux effectuées :</h2>
        <textarea rows="15"></textarea>
        <h2>Traitement effectué par le chargé d'entretien du parc :</h2>
        <input type="text">
        <h2>Fait le :</h2>
        <input type="date">
    </div>
    <input type=submit value=Envoyer id=envoyer>


</html>
