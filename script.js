$(document).ready(function(){
   
    insere_virus();
});

function insere_virus(){
    var max_x = screen.width - 30;
    var max_y = screen.height - 200;
    
    var x = parseInt(Math.random() * max_x);
    var y = parseInt(Math.random() * max_y);

    var virus = '<div class="virus" style="top:'+y+'px; left:'+x+'px;"></div>';

    $('#campo').append(virus);

    $('.virus').on('mouseenter', function(){
        perde_partida('virus');
    });

    
    segue_ponteiro();
    setTimeout(() => {
        insere_virus();
    }, 5000);
}

function segue_ponteiro(){
    var position = getposition();
    console.log(position);
}

function getposition (){
    $(document).on('mousemove', function(mouse){
        var mouse_x = mouse.clientX;
        var mouse_y = mouse.clientY;
        
        return {"mouse_x": mouse_x, "mouse_y":mouse_y}
    });
}

function perde_partida(tipo = 'virus'){
    var qtd = $('.virus').length;
    $('#div-mensagem').find('#mensagem').html('Você perdeu com '+qtd+' virus.')
    $('#div-mensagem').show();

    setTimeout(() => {
        document.location.reload(true);
    }, 2000);
}