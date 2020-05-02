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
        <h1>AJOUTER UN NOUVEL UTILISATEUR</h1>
    </div>
		

    <div id="enveloppe">
        <form action="controleur.php" method="POST">
            <div class="col-sm-4 offset-md-4">
                <labe > Nom </label>
                <input type="text" class="form-control" name="nom">
            </div>
           
            <div class="col-sm-4 offset-md-4">
                <label> Prénom </label>
                <input type="text" class="form-control" name="prenom">
            </div>
           
            <div class="col-sm-4 offset-md-4">
                <label> Mot de passe </label>
                <input type="password" class="form-control" name="mdp"> 
            </div>
            
            <div class="col-sm-4 offset-md-4">
                <label> Confirmation du mot de passe </label>
                <input type="password" class="form-control" name="confmdp">
            </div>
          
            <div class="col-sm-4 offset-md-4">
                <label> Rôle </label>
                <select id="Métier" class="form-control" name="role">
                    <option>Conducteur</option>
                    <option>Administrateur</option>
                    <option>SuperAdministrateur</option>
                </select>
            </div>
            </br>
            <div class="col-sm-3 offset-md-4">
                <input type="submit" id="Valider" value="Ajouter Utilisateur" name="action"> <br><br>
            </div>
        </form> 
    </div>

    <div id="enveloppe2">

        <div class="table-wrapper-scroll-y my-custom-scrollbar">

        <?php
		    $TabUser=DataTabUser();
		    mkTabUser($TabUser);
	    ?>
        </div>

        <form action="controleur.php" method="POST">
            <br>
            <div class="col-sm-4 offset-md-4">
                <label> Login à supprimer </label>
                <input type="text" class="form-control" name="loginSuppression">
            </div>
            <br>
            <div class="col-sm-3 offset-md-4">
                <input type="submit" id="Valider" value='Suppression Utilisateur' name="action"> <br><br>
            </div>  
        </form>
    </div>
</body>

</html>