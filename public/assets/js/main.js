	
// formulaire 

$('#formationform').find('input[name="image"]').on('change', function (e) {
	console.log($(this));
    var files = $(this)[0].files;

    if (files.length > 0) {
        // On part du principe qu'il n'y qu'un seul fichier
        // étant donné que l'on a pas renseigné l'attribut "multiple"
        var file = files[0],
            $image_preview = $('#image_preview');

        // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
        $image_preview.find('.thumbnail').removeClass('hidden');
        $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
        $image_preview.find('span').html(file.name);
    }
});

function testerror(){
	var champs = $('#formationform p.error');
	console.log(champs.length);
	for ( var i=0; i<champs.length; i++ ) {
		text = champs[i].textContent;
		if (text.length > 0) {
			$input = champs[i].parentNode ;	
			$input.className += " error";
		}
	}   
}


testerror();

//datepicker
$("#dateform").datepicker({
  todayBtn:"true",
  format:"dd/mm/yyyy", 
  autoclose:"true",
  pickerPosition:"bottom-left",
  startView:"year",
  minView:"month",
  language:'fr'
});


/*$('#duration').timepicker({
    minuteStep: 1,
    template: 'modal',
    appendWidgetTo: 'body',
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
});
*/
