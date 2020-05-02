$(document).ready(function() {
    
    $(document).on("click","#btnModifierFiche",function(){
       
        $(this).parent().find("input").attr('readonly', false); // on enlève les readonly
        $(this).parent().find("#inputNom").attr('readonly', true);
        $(this).parent().find("#inputPrenom").attr('readonly', true);
        $(this).parent().find("#inputDate").attr('readonly', true);
        $(this).remove();//on supprime btn modif
        $(".vacation").append('<input type="button" id="btnAjoutPC" class="btn btn-dark btnAjoutPC" value="Ajouter Prise en charge"></input>');
        
        $("newVacation").after('<input type="button" id="btnAjoutVacation" class="btn btn-dark" value="Ajouter Vacation"><input type="button" id="btnVerif" class="btn btn-dark" value="Vérifier"></input>');
        
        $(".priseEnCharge").each(function(index){
            if(index!=0)
            $(this).children(".form-row").append('<div class="form-group col-sm-2"><label for="btnSuppPC"> </br/>Supprimer Prise en charge: </label><input type="button" id="btnSuppPC" class="btn btn-dark form-control col-sm btnSuppPC" value="Supprimer"></div>');
        })

        $(".vacation").each(function(index){
            if(index!=0)
            $(this).append('<input type="button" id="btnSuppVacation" class="btn btn-dark btnSuppVacation" value="Supprimer Vacation">');
        })

        $("#newVacation").after('<input type="button" id="btnAjoutVacation" class="btn btn-dark" value="Ajouter Vacation"><input type="button" id="btnVerif" class="btn btn-dark" value="Vérifier"></input>');

        
    });
        
        
        
   
});


