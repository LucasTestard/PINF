$(document).ready(function() {
    $('#btnVerif').click(function(){
        
           
          
        console.log("Fonction de vérification des champs");
        message="";
        if($("#inputNom").val()==""){
            message+="Le champ nom n'est pas rempli\n<br/>";
        }
        if($("#inputPrenom").val()==""){
            message+="Le champ prenom n'est pas rempli\n<br/>";
        }
        if($("#inputDate").val()==""){
            message+="Le champ date n'est pas rempli\n<br/>";
        }
        if($("#inputImmatriculation").val()==""){
            message+="Le champ immatriculation n'est pas rempli\n<br/>";
        }
        if(message!=""){
            $('#btnVerif').hide();
            $("#popup").dialog({
                dialogClass: "no-close",
                buttons: [
                {
                    text: "OK",
                    click: function() {
                        $( this ).dialog( "close" );
                        $('#btnVerif').show();
                    }
                }
                ]
            })
            .html(message);
        }
        
        else{
            $("#popup").remove();
            $('#btnVerif').replaceWith( "<button id=\"btnEnvoi\" type=\"submit\" class=\"btn btn-dark\" value=\"EnvoyerJournalier\" name=\"action\">Envoyer pointage</button>" );
        }
    });
});