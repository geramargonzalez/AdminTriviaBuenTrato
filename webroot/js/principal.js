$(document).ready(function () { 
    
    Timer();
    $(".gameOver").addClass('hidden');

});


function ReenviarPagina() {
    
    $.ajax({
        url: url + 'timeout',
        type: 'POST',
        data:{id: 44},
        success: function (data) {
            
            if(data <= 2){
              
                insertarFallos(data);  
            
            } else {
                $(".gameOver").removeClass('hidden');
                $(".ContenedorJuego").addClass('hidden');
                $(".nivelContenedor").addClass('hidden');
                $(".score").addClass('hidden');
                $(".fallos").addClass('hidden');
                $(".time").addClass('hidden');
            
            }
       }
           
    });
    
}


function insertarFallos(data){
    
    $(".fallos").html("Fallos: " + data);
    
    Timer();
}

function Timer(){
    
    var timer2 = "0:20";

    var interval = setInterval(function() {

    var timer = timer2.split(':');

    //by parsing integer, I avoid all extra string processing
    var minutes = parseInt(timer[0], 10);
    var seconds = parseInt(timer[1], 10);

    --seconds;
    minutes = (seconds < 0) ? --minutes : minutes;

    if (minutes < 0) clearInterval(interval);

    seconds = (seconds < 0) ? 59 : seconds;
    seconds = (seconds < 10) ? '0' + seconds : seconds;

    $('.time').html("Tiempo: " + minutes + ':' + seconds);

    timer2 = minutes + ':' + seconds;

    if(minutes == 0 && seconds == 0){
      ReenviarPagina();
    }

}, 1000);
}
