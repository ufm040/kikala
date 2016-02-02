	
/*******************************/
/* Inscription à une formation */
/*******************************/

$("#inscription-form").on("submit", function(e){ 
    // empêche ma soumission du formulaire
    e.preventDefault();
    var $register = $("#register").val();
    $.ajax({
        "url": $("#inscription-form").attr("action"),
        "type": $("#inscription-form").attr("method"),
        "data":$("#inscription-form").serialize()
    })
    .done(function(message){
        // Affiche le message de confirmation
        $("#response-inscription").html(message);
        // modification du libellé du bouton    
        if ($register == 1) {
            $("#register").val('0'); 
            $(".managebutton").text("J'annule mon inscription !"); 
        } else {
            $("#register").val('1'); 
            $(".managebutton").text("Je m'inscris à cette formation !");  
        }
    })
    .fail(function(){
        $("#response-inscription").html("Une erreur est survenue, nous n'avons pas pu traiter votre demande");
    });  
});


// FORMULAIRE

function inputImage($files){

    if ($files.length > 0) {
        // On part du principe qu'il n'y qu'un seul fichier
        // étant donné que l'on a pas renseigné l'attribut "multiple"
        var file = $files[0];
        $image_preview = $('#image_preview');

        // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
        $image_preview.find('.thumbnail').removeClass('hidden');
        $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
        $image_preview.find('span').html(file.name);
    }  
}


$('#formationform').find('input[name="image"]').on('change', function (e) {
    inputImage($(this)[0].files);
});

$('#compteform').find('input[name="image"]').on('change', function (e) {
    inputImage($(this)[0].files);
});

function testerror(){
	var champs = $('#formationform p.error');
	for ( var i=0; i<champs.length; i++ ) {
		text = champs[i].textContent;
		if (text.length > 0) {
			$input = champs[i].parentNode ;	
			$input.className += " error";
		}
	}   
}


testerror();

// DATE PICKER 
$("#dateform").datepicker({
    todayBtn:"true",
    format:"dd/mm/yyyy", 
    autoclose:"true",
    pickerPosition:"bottom-left",
    startView:"year",
    minView:"month",
    language:'fr'
});


$('#duration').timepicker({
    'language':'fr',
    'showMeridian':false,
    'defaultTime':'01:00'
});


// MENU DEROULANT lorsque l'on est connecté
$("#headconnect ul ul").hide();

//avec hover
$("#headconnect ul li").hover( function(){ 
  $(this).find("ul").stop(true).slideToggle(); 
} );