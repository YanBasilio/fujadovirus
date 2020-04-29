bool = true;
niveis_dificultade = {
    "dificil":{
        "segue_cursor": 200,
        "desbloqueia_movimento": 150,
        "insere_virus": 500
    },
    "media":{
        "segue_cursor": 300,
        "desbloqueia_movimento": 200,
        "insere_virus": 1000
    },
    "facil":{
        "segue_cursor": 1000,
        "desbloqueia_movimento": 800,
        "insere_virus": 2000
    }
};
dificuldade = "media";

$(document).ready(function(){
    var tela = {'x': window.innerWidth, 'y': window.innerHeight};
    var campo_h = tela.y - 150;
    $('#campo').attr('style', 'height:'+campo_h+'px');
    $('#parede_campo_left').attr('style', 'height:'+campo_h+'px;');
    $('#parede_campo_right').attr('style', 'height:'+campo_h+'px;');
    
    // $('#modalInicio').modal('show'); 
    insere_virus();
    desbloqueia_movimento();
    $(document).on('mousemove', function(mouse){
        mouse_x = mouse.clientX;
        mouse_y = mouse.clientY;
        if(bool){
            bool = false;
            $('.virus').animate({
                top: mouse_y+'px',
                left: mouse_x+'px'
            }, niveis_dificultade[dificuldade]["segue_cursor"] );
            
        }
    });
});

function inicia_jogo(){
    dificuldade = $('input[name="dificuldade"]:checked').val();

    insere_virus();
    desbloqueia_movimento();
    
    $(document).on('mousemove', function(mouse){
        mouse_x = mouse.clientX;
        mouse_y = mouse.clientY;
        if(bool){
            bool = false;
            var y = $('.virus').css('top');
            
        }
    });

}

function insere_virus(){
    var max_x = window.innerWidth - 30;
    var max_y =  window.innerHeight - 160;
    
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
    }, niveis_dificultade[dificuldade]["insere_virus"]);
}

function desbloqueia_movimento(){
    bool = true;
    setTimeout(()=>{
        desbloqueia_movimento();
    }, niveis_dificultade[dificuldade]["desbloqueia_movimento"]);
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