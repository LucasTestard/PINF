<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>

<style>
/*fieldset{
    border: black 1px solid;
    padding: 50px 5px 5px 5px;
    margin: 10px;
    padding-bottom: 20px;
}*/

form{
    margin-top: 30px;;

}

.space{
    padding-top: 10px;
    padding-left:0px;

}

#btnEnvoyer{
    margin-top: 20px;
}

</style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>


</script>

<!-- **** B O D Y **** -->
<body>

<form class="container-fluid">

<!--<fieldset class="form-row">
<legend>Information</legend>-->

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="inputDate" placeholder="Date" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputNom">Nom</label>
      <input type="text" class="form-control" id="inputNom" name="inputNom" placeholder="Nom" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPrenom">Prénom</label>
      <input type="text" class="form-control" id="inputPrenom" name="inputPrenom" placeholder="Prénom" required>
    </div>
</div>




<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputImmat">Immatriculation</label>
      <input type="text" class="form-control" id="inputImmat" name="inputImmat" placeholder="Immatriculation" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputTypeVehicule">Type Véhicule</label>
      <input type="text" class="form-control" id="inputTypeVehicule" name="inputTypeVehicule" placeholder="Type Véhicule" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputKm">km</label>
      <input type="number" step="any" class="form-control" id="inputKm" name="inputKm" placeholder="km" required>
    </div>
</div>

<!--</fieldset>-->


<div class="form-group space">
    <label for="inputAno">Anomalies constatées sur le véhicule :</label>
    <textarea class="form-control" id="inputAno" name="inputAno" rows="3" required></textarea>
</div> 



<div class="form-group space">
    <label for="inputReparation">Réparation du véhicule ?</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radio" id="radioOui" value="Oui" required>
        <label class="form-check-label" for="radioOui">Oui</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radio" id="radioNon" value="Non" required>
        <label class="form-check-label" for="radioNon">Non</label>
    </div>

    <div id="infoReparation">
        <div class="form-group col-md-3 space">
            <label for="inputLieux">Lieux de réparation :</label>
            <input type="text" class="form-control" id="inputLieux" name="inputLieux" placeholder="Lieux de réparation">
        </div>

        <div class=space>
            <label for="inputTrav">Travaux Effectuées :</label>
            <textarea class="form-control" id="inputTrav" name="inputTrav" rows="3"></textarea>
        </div>


        <div class="form-group col-md-3 space">
          <label for="inputDateRep">Fait le</label>
          <input type="date" class="form-control" id="inputDateRep" name="inputDateRep">
        </div>
    </div>    



</div>





  <button type="submit" class="btn btn-dark" id="btnEnvoyer" value="EnvoyerReparation" name="action">Envoyer</button>
</form>


</body>
</html>
