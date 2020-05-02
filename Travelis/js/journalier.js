function verifValeurEntiereKilometrage(){
    // Vérifie que tout les champs kilométrages sont remplis
    // Si non il y a un message d'erreur en dessous du champ manquant
    // Vérifie que les champs sont bien des nombre
    // Fait également abstraction de quelques fautes de frappe
    // Exemple: "10z" vaut 10
    // Renvoi VRAI si on a uniquement des valeurs entière, FAUX sinon

    let messageErreur=$("<div>").addClass("invalid-feedback").html("Ce nombre est obligatoire");
    let verif=true;

    $(".KmRetour, .KmDepart").each(function(){
        if($(this).val() != ""){
            $(this).val(parseInt($(this).val(),10)); // Fait également abstraction de quelques fautes de frappe
            if(!Number.isInteger(parseInt($(this).val(),10)))// Vérifie que les champs sont bien des nombre
            {
                $(this).addClass("is-invalid");
                $(this).after(messageErreur.clone());  // Si non il y a un message d'erreur en dessous du champ manquant
                verif=false;
            }
        } 
    });
    return verif;
}

function verifCoheranceKilometrage(){
    // Vérifie le kilométrage de chaque Vacation
    // C'est à dire si le kilométrage de départ est inférieur au kilométrage de retour
    // Si non il y a un message d'erreur en dessous des champs où il y a l'erreur
    // Renvoi VRAI si le kilométrage de départ est inférieur au kilométrage de retour, FAUX sinon

    let messageErreur=$("<div>").addClass("invalid-feedback").html("Le kilométrage n'est pas cohérent");
    let verif=true;

    $(".KmDepart").each(function(index){
        if( parseInt($(this).val()) > parseInt($(".KmRetour").eq(index).val()) ){
            
            $(this).addClass("is-invalid");
            $(".KmRetour").eq(index).addClass("is-invalid");
            $(this).after(messageErreur.clone()); // Si non il y a un message d'erreur en dessous du champ manquant
            $(".KmRetour").eq(index).after(messageErreur.clone()); 
            verif=false;
        }   
    });
    return verif;
}

function verifCoheranceHeures(){
    // Vérifie les heures de chaque Vacation
    // C'est à dire si l'heure de départ < heure de la première prise en charge < heure de retour
    // Si non il y a un message d'erreur en dessous des champs où il y a l'erreur
    // Renvoi VRAI si les heures sont cohérantes, FAUX sinon

    let messageErreur=$("<div>").addClass("invalid-feedback").html("Les heures ne sont pas cohérentes");
    let verif=true;


    $(".HeureDepart").each(function(index){
        var heure_depart = $(this).val();
        var heure_ppc = $(".PPC").eq(index).val();
        var heure_retour = $(".HeureRetour").eq(index).val();
    
        if( !(heure_depart < heure_ppc && heure_ppc < heure_retour) && heure_depart!="" && heure_ppc!=""&& heure_retour!=""){
            $(this).addClass("is-invalid");
            $(".PPC").eq(index).addClass("is-invalid");
            $(".HeureRetour").eq(index).addClass("is-invalid");
            $(this).after(messageErreur.clone()); // Si non il y a un message d'erreur en dessous du champ manquant
            $(".HeureRetour").eq(index).after(messageErreur.clone());
            $(".PPC").eq(index).after(messageErreur.clone());
            verif=false;
        }   
    });
    return verif;
}

function verifChampObligatoire(){
    // Vérifie que les champs obligatoire sont non vide
    // Si un champ est vide il est mis en évidance avec un message d'erreur en dessous

    let messageErreur=$("<div>").addClass("invalid-feedback").html("Ce champ est obligatoire");
    let verif=true;

    $(".Obligatoire").each(function(){
        if($(this).val()==""){
            $(this).addClass("is-invalid");
            $(this).after(messageErreur.clone());
            verif=false;
        }
    });
    return verif;
}

$(document).ready(function() {
    let PriseCharge=$('<div class="priseEnCharge"><hr><div class="form-row"><div class="form-group col-sm-auto"><label for="inputPC">heure de PC + ville de PC </br/>+ Nom de la personne transportée</label><input type="text" class="form-control Obligatoire" id="inputPC" name="PriseCharge[]" ></div><div class="form-group col-sm-auto"><label for="inputAbsent"></br/>Absent</label><input type="text" class="form-control Obligatoire" id="inputAbsent" name="Absent[]" placeholder="oui/non" maxlength="3"></div><div class="form-group col-sm-auto"><label for="inputObservation"></br/>Observation</label><input type="text" class="form-control" id="inputObservation" name="Observation[]" ></div><div class="form-group col-sm-2"><label for="btnSuppPC"> </br/>Supprimer Prise en charge:</label><input type="button" id="btnSuppPC" class="btn btn-dark form-control col-sm btnSuppPC" value="Supprimer"></div></div></div><input type="button" class="btn btn-dark btnAjoutPC" value="Ajouter Prise en charge"></input>"');
    let vacation=$('<div class="vacation"><h1>Vacation</h1><input id="nbPC" name="nbPC[]" type="hidden" value="1"><div class="form-row d-flex justify-content-start"><div class="form-group col-sm-auto"><label for="inputHeureDepart">Heure de Départ</label><input type="time" class="form-control HeureDepart Obligatoire" id="inputHeureDepart" name="HeureDepart[]" ></div><div class="form-group col-sm-auto"><label for="inputKmDepart">Kilométrage Départ</label><input type="text" class="form-control KmDepart Obligatoire" placeholder="Kilométrage Départ" id="inputKmDepart" name="KmDepart[]" ></div><div class="form-group col-sm-auto"><label for="inputPPC">Première prise en charge</label><input type="time" class="form-control PPC Obligatoire" id="inputPPC" name="PPC[]" ></div><div class="form-group col-sm-auto"><label for="inputHeureRetour">Heure de Retour</label><input type="time" class="form-control HeureRetour Obligatoire" id="inputHeureRetour" name="HeureRetour[]" ></div><div class="form-group col-sm-auto"><label for="inputKmRetour">Kilométrage Retour</label><input type="text" class="form-control KmRetour Obligatoire" placeholder="Kilométrage Retour" id="inputKmRetour" name="KmRetour[]" ></div></div><div class="priseEnCharge"><hr><div class="form-row"><div class="form-group col-sm-auto"><label for="inputPC">heure de PC + ville de PC </br/>+ Nom de la personne transportée</label><input type="text" class="form-control Obligatoire" id="inputPC" name="PriseCharge[]" ></div><div class="form-group col-sm-auto"><label for="inputAbsent"></br/>Absent</label><input type="text" class="form-control Obligatoire" id="inputAbsent" name="Absent[]" placeholder="oui/non" maxlength="3"></div><div class="form-group col-sm-auto"><label for="inputObservation"></br/>Observation</label><input type="text" class="form-control" id="inputObservation" name="Observation[]" ></div></div></div><input type="button" class="btn btn-dark btnAjoutPC" value="Ajouter Prise en charge"><input type="button" id="btnSuppVacation" class="btn btn-dark btnSuppVacation" value="Supprimer Vacation"></div><div class="trait"></div><div id="newVacation"></div>');
    let messageErreur=$("<div>").addClass("invalid-feedback").html("Ce champ est obligatoire");

    $('#btnEnvoi').hide();
    $('#btnContinuer').hide();

    $(document).on("click","#btnVerif",function(){

        console.log("test");
        //On cache les btn d'ajout et supp
        $(".btnAjoutPC").each(function(){
            $(this).hide();
        });
        $(".btnSuppPC").each(function(){
            $(this).hide();
        });
        $("#btnAjoutVacation").hide(); //un seul
        $(".btnSuppVacation").each(function(){
            $(this).hide();
        });

       

        //On met tout on read only pour bloquer la modif des input
        $(this).parent().find("input").attr('readonly', true); 

        console.log("Fonction de vérification des champs");
        message="";
        $(".is-invalid").removeClass("is-invalid");
        $(".invalid-feedback").remove();
        
        
        if(!verifChampObligatoire()){ //Vérification des informations principales de la fiche journalière
            message+="Remplissez tous les champs obligatoires\n<br/>";
        }       
        if(!verifValeurEntiereKilometrage() || !verifCoheranceKilometrage()){ //Vérification du Kilométrage des Vacations
            message+="Vérifiez le kilométrage\n<br/>";
        }
        if(!verifCoheranceHeures()){ //Vérification des heures entrées dans les Vacations
            message+="Vérifiez les heures entrées\n<br/>";
        }

        //Création du popup du message d'erreur
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
                        $(".btnAjoutPC").show();
                        $(".btnSuppPC").show();
                        $("#btnAjoutVacation").show();
                        $(".btnSuppVacation").show();

                        // On autorise la modif des inputs

                        //console.log($(this));
                        $(this).parent().parent().find("input").attr('readonly', false);
                        $(this).parent().parent().find("#inputNom").attr('readonly', true);
                        $(this).parent().parent().find("#inputPrenom").attr('readonly', true);
                        $(this).parent().parent().find("#inputDate").attr('readonly', true);

                    }
                }
                ]
            })
            .html(message);
        }
        else{
            $("#popup").remove();
            $('#btnEnvoi').show();
            $('#btnContinuer').show();
            $('#btnVerif').hide();
        }
    });


    
    $(document).on("click",".btnAjoutPC",function(){
        $(this).parent(".vacation").children("#nbPC").get(0).value++;
        $(this).replaceWith(PriseCharge.clone(true));

    });
    $(document).on("click",".btnSuppPC",function(){
        $(this).parent().parent().parent().parent(".vacation").children("#nbPC").get(0).value--;
        if( $(this).parent().parent().parent().parent(".vacation").children("#nbPC").get(0).value==0){
            $(this).parent().parent().parent().parent().remove();
            $('#nbVacation').get(0).value-- ;
        }
        
        else
        $(this).parent().parent().parent().remove();
    });
    $(document).on("click","#btnAjoutVacation",function(){
        $('#nbVacation').get(0).value++ ;
        $("#newVacation").replaceWith(vacation.clone(true));
    });
    $(document).on("click",".btnSuppVacation",function(){
        $('#nbVacation').get(0).value-- ;
        $(this).parent().remove();
    });

    $(document).on("click","#btnContinuer",function(){
        $(".btnAjoutPC").show();
        $(".btnSuppPC").show();
        $("#btnAjoutVacation").show();
        $(".btnSuppVacation").show();
        $('#btnVerif').show();
        // On autorise la modif des inputs
        $(this).parent().find("input").attr('readonly', false); 
        $(this).parent().find("#inputNom").attr('readonly', true);
        $(this).parent().find("#inputPrenom").attr('readonly', true);
        $(this).parent().find("#inputDate").attr('readonly', true);
        $('#btnEnvoi').hide();
        $('#btnContinuer').hide();
        
    });
    
    //Suggest de l'immatriculation
    $(document).on("click keyup",'#inputImmatriculation',function(){
		var query = $('#inputImmatriculation').val();
		$('.list-group').css('display', 'block');
		if(query.length == 1)
		{
			$.ajax({
				url:"fetch.php",
				method:"POST",
				data:{query:query},
				success:function(data)
				{
					$('.list-group').html(data);
				}
			})
		}
		if(query.length == 0)
		{
			$('.list-group').css('display', 'none');
		}
	});
	$(document).on('click', '.gsearch', function(){
		var immat = $(this).children().text();
		$('#inputImmatriculation').val(immat);
		$('.list-group').css('display', 'none');

	});
});


