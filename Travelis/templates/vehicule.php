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
        <h1>Ajout Véhicule</h1>
    </div>

    <div id="enveloppe">
    <form action="controleur.php" method="POST">
          <!--<span class="Motif" > Immatriculation </span>
          <input type="text" class="Text" name="vehicule_Imma"> <br><br>
          <span class="Motif" > Type de véhicule </span>
          <input type="text" class="Text" name="vehicule_Type"> <br><br>
          <span class="Motif" > Kilométrage </span>
          <input type="number" class="Text" name="vehicule_Km"> <br><br>
          <input type="submit" id="Valider" value="Ajout_Vehicule" name="action"> <br><br>
          <form action="controleur.php" method="POST">-->
            <div class="col-sm-4 offset-md-4">
                <labe > Immatriculation </label>
                <input type="text" class="form-control" name="vehicule_Imma">
            </div>
           
            <div class="col-sm-4 offset-md-4">
                <label> Type de véhicule </label>
                <input type="text" class="form-control" name="vehicule_Type">
            </div>
           
            <div class="col-sm-4 offset-md-4">
                <label> Kilométrage </label>
                <input type="text" class="form-control" name="vehicule_Km"> 
            </div>
            <br>
            <div class="col-sm-4 offset-md-4">
                <input type="submit" id="Valider" value="Ajouter Vehicule" name="action"> <br><br>
            </div>
        </form> 
    </form>
      </div>

    <div id="enveloppe2">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">

            <?php
		        $TabVehicule=DataTabVehicule();
		        mkTabVehicule($TabVehicule);
	        ?>
        </div>

        <form action="controleur.php" method="POST">
            <div class="col-sm-4 offset-md-4">
                <br>
                <label> Immatriculation du véhicule à supprimer </label>
                <input type="text" class="form-control" name="vehiculeSuppression">
            </div>
            <br>
            <div class="col-sm-3 offset-md-4">
                <input type="submit" id="Valider" value='Suppression Vehicule' name="action"> <br><br>
            </div>  
        </form>



    </div>

    

</body>

</html>