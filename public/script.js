bool = true;

$(document).ready(function(){
    var tela = {'x': screen.width, 'y': screen.height};
    var campo_h = tela.y - 130;
    $('#campo').attr('style', 'height:'+campo_h+'px');
    $('#parede_campo_left').attr('style', 'height:'+campo_h+'px;');
    $('#parede_campo_right').attr('style', 'height:'+campo_h+'px;');
    insere_virus();
    desbloqueia_tempo();

    $(document).on('mousemove', function(mouse){
        mouse_x = mouse.clientX;
        mouse_y = mouse.clientY;
        if(bool){
            bool = false;
            $('.virus').animate({
                top: mouse_y+'px',
                left: mouse_x+'px'
            },200);
            
        }
    });
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

    $('.parede_campo').on('mouseenter', function(){
        perde_partida('saiu_tela');
    });

    setTimeout(() => {
        insere_virus();
    }, 2000);
}

function desbloqueia_tempo(){
    bool = true;
    setTimeout(()=>{
        desbloqueia_tempo();
    }, 200);
}

function perde_partida(tipo = 'virus'){
    var qtd = $('.virus').length;
    if(tipo == 'virus'){
        $('#div-mensagem').find('#mensagem').html('Você perdeu com '+qtd+' virus.')
    }else if(tipo == 'saiu_tela'){
        $('#div-mensagem').find('#mensagem').html('Você perdeu. saiu do campo de jogo');

    }
    $('#div-mensagem').show();

    setTimeout(() => {
        document.location.reload(true);
    }, 2000);
}