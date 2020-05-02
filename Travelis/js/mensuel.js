function getDateAAAAMM(){
    //Renvoi la date actuelle sous le format aaaa-mm
    var today = new Date();
	var year = (today.getFullYear());
    var month = ("0" + (today.getMonth() + 1)).slice(-2); 
    
    return year+'-'+month;
}



$(document).ready(function() {
    var input = $("#inputCache");
    input.val(getDateAAAAMM());
    
});

