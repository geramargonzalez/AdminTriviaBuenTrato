$(document).ready(function(){
	checkBoxes.click(function() {
		id =  $(this).attr("id");
        if ($(this).is(':checked')) {
              checked(id);
        } else {
             unChecked(id);  
        }
    });

});

var checkBoxes = $('.checkbox label input');
var number = 0;
var cantpreguntas = $('#cantpre').val();
function checked(id) {
	if(cantpreguntas > number){
	   number = parseInt(number) + parseInt("1"); 
	  $('#numeroDeselecciones').text("Seleccionados " + number); 
	} else if(cantpreguntas == number) {
		$('#numeroDeselecciones').text("Ya tienes tus preguntas ...");  
	}
	
}
function unChecked(id) {
 	if(number > 0){
 	  number = parseInt(number) - parseInt("1"); 
     $('#numeroDeselecciones').text("Seleccionados " + number);
 	}
}