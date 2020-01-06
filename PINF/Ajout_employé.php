<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>
	<title>Ajout d'un Employé</title>
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
    .Text{
      position:absolute;
      margin-left:50%;
    }
    .Motif{
      position: absolute;
      margin-left: 35%;
    }
    #Valider{
      position:absolute;
      margin-left: 40%;
    }
		hr {
		display: block;
		clear: both;
		height: 0;
		margin: 40px 0 80px;
		padding: 0;
		border: 0;
		font-family: arial;
		text-align: center;
		font-size: 60px;
		line-height: 1;
	}
	hr:after {
		content: "\273D \273D \273D";
		height: 0;
		letter-spacing: 1em;
		color: #aaa;
	}
</style>
<!-- **** B O D Y **** -->
<body >
    <div id="entete">
        <h1>TRAVELIS</h1>
        <h1>AJOUTER UN NOUVEL UTILISATEUR</h1>
    </div>
		<hr >

    <div id="enveloppe">
          <span class="Motif" > Nom </span>
          <input type="text" class="Text"> <br><br>
          <span class="Motif" > Prénom </span>
          <input type="text" class="Text"> <br><br>
          <span class="Motif" > Date de naissance </span>
          <input type="date" class="Text"> <br><br>
          <span class="Motif" > Identifiant </span>
          <input type="text" class="Text"> <br><br>
          <span class="Motif" > Mot de passe </span>
          <input type="text" class="Text"> <br><br>
          <span class="Motif" > Confirmation du mot de passe </span>
          <input type="text" class="Text"> <br><br>
          <span class="Motif" > Rôle </span>
          <select id="Métier" class="Text">
              <option>Conducteur</option>
              <option>Administrateur</option>
              <option>SuperAdministrateur</option>
          </select> <br><br>
          <input type="submit" id="Valider" value="Ajouter cet Utilisateur"> <br><br>


      </div>


</body>

</html>
