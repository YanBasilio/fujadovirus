//Globais
bool = true;
desbloqueado = true;
dificuldade = "media";
campo_h = 0;
tela = null;
recordes_atual = null;
parado = 0;
qtd_virus = 0;
niveis_dificultade = null;
mobile = jQuery.browser.mobile;



firebaseConfig = {
    apiKey: "AIzaSyB7hXDUdKvU-61w1qFKSk9wfC5z625TGIk",
    authDomain: "fujadovirus.firebaseapp.com",
    databaseURL: "https://fujadovirus.firebaseio.com",
    projectId: "fujadovirus",
    storageBucket: "fujadovirus.appspot.com",
    messagingSenderId: "785278748879",
    appId: "1:785278748879:web:e3a8a527be23fa1f118fba",
    measurementId: "G-88WDV3LHYL"
};

$(document).ready(function(){
    tela = {'x': window.innerWidth, 'y': window.innerHeight};
    campo_h = tela.y - 150;
    $('#campo').attr('style', 'height:'+campo_h+'px');
    $('#parede_campo_left').attr('style', 'height:'+campo_h+'px;');
    $('#parede_campo_right').attr('style', 'height:'+campo_h+'px;');
 
    $('#modal_inicio').attr('style', 'display:block');

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();


    // dbReference = firebase.database();
});

regressiva = '3';
function contagem_regressiva(){
    $('#modal_inicio').attr('style', 'display:none');
    $('#modal_perda').attr('style', 'display:none');
    $('#modal_recorde').attr('style', 'display:none');
    $('#regressiva').attr('style', 'display:block');

    $('#regressiva').html(regressiva);

    $('.virus').remove();
    bool = true;
    parado = 0;
    qtd_virus = 0;
    
    if(regressiva > 0){
        setTimeout(() => {
            contagem_regressiva();
        },1000);
    }else{
        $('#regressiva').html("FUJA!!");
        setTimeout(()=>{
            $('#regressiva').attr('style', 'display:none');
            desbloqueado = true;
            inicia_jogo();
        }, 1000);
    }

    regressiva--;
}

function inicia_jogo(){

    dificuldade = $('input[name="dificuldade"]:checked').val();
    var desc_dificuldade = $('#label_'+dificuldade).html();

    $.ajax({
        'url': 'app.php?get=configuracoes',
        'type':'POST',
        'data':{
            'nivel':dificuldade
        },
        success:function(dif){
            dif = JSON.parse(dif);
            niveis_dificultade = dif;
            
            insere_virus();
            desbloqueia_movimento();
        
            $(document).on('mousemove', function(mouse){
                mouse_x = mouse.clientX;
                mouse_y = mouse.clientY;
                parado = 0;
                var tg = mouse.target;
                
                if($(tg).attr('id') != 'campo'){
                    perde_partida('saiu_tela');
                }
        
                if(bool){
                    bool = false;
                    $('.virus').animate({
                        top: (mouse_y - 30)+'px',
                        left:(mouse_x - 30)+'px'
                    }, niveis_dificultade["segue_cursor"] );
                    
                }
            });
        }
    });
    
    $.ajax({
        'url': 'app.php?get=recordes',
        'type':'POST',
        'data':{
            'nivel':dificuldade
        },
        success:function(r){
            recordes_atual = JSON.parse(r);

            var html = 'Recorde <br />';
            html += 'Dificuldade: <b>'  + desc_dificuldade +        '</b> <br/>';
            html += 'Virus: <b>'        + recordes_atual['recorde'] +  '</b> <br/>';
            html += 'Autor: <b>'        + recordes_atual['nome'] +     '</b>';

            $('#recorde-atual').html(html);
        }
    });

}

function insere_virus(){
    if(desbloqueado){
        var max_x = window.innerWidth - 30;
        var max_y =  window.innerHeight - 160;
        
        var x = parseInt(Math.random() * max_x);
        var y = parseInt(Math.random() * max_y);
    
        var virus = '<div class="virus" style="top:'+y+'px; left:'+x+'px;"></div>';
    
        $('#campo').append(virus);
    
        qtd_virus++;
        $('#pt_atual').html(qtd_virus);

        $('.virus').on('mouseenter', function(){
            perde_partida('virus');
        });
    
        parado++; //variavel para não ficar parado
        if(parado > niveis_dificultade['max_parado']){
            perde_partida('parado');
        }

        setTimeout(() => {
            insere_virus();
        }, niveis_dificultade["insere_virus"]);
    }
}

function desbloqueia_movimento(){
    bool = true;
    setTimeout(()=>{
        desbloqueia_movimento();
    }, niveis_dificultade["desbloqueia_movimento"]);
}

function salvar_recorde() {
    var qtd = $('.virus').length;
    var usuario = $('#ipt_nome').val();
    if(usuario.length > 0){
        $.ajax({
            'url': 'app.php?set=recorde',
            'type':'POST',
            'data':{
                'nivel':dificuldade,
                'nome':usuario,
                'recorde':qtd
            },
            success:function(r){
                reiniciar_jogo();
            }
        });

    }else{
        alert("Um recordista merece ser lembrado! \n\n Informe o seu nome.");
    }
}

function perde_partida(tipo = 'virus'){
    var qtd = $('.virus').length;

    if(desbloqueado){
        if(qtd > parseInt(recordes_atual.recorde)){
            $('#nivel_recorde').html(dificuldade);
            $('#recorde_antigo').html(recordes_atual.recorde);
            $('#recorde_novo').html(qtd);

            $('#modal_recorde').attr('style', 'display:block');

        }else{
            if(tipo == 'virus'){
                $('#titu-perda').html('Nããão!!');
                $('#mensagem_perda').html('Você foi infectado com '+qtd+' virus.');

            }else if(tipo == 'saiu_tela'){
                $('#titu-perda').html('Fique em casa!!');
                $('#mensagem_perda').html('Você não respeitou o isolamento e acabou sendo infectado. \n\n Você resistiu a '+qtd+' vírus.');

            }else if(tipo == 'parado'){
                $('#titu-perda').html('Não fique parado!');
                $('#mensagem_perda').html('Não vale ficar parado, você resistiu a '+qtd+' vírus');
            }
            
            $('#modal_perda').attr('style', 'display:block');
        }
    }
    desbloqueado = false;
}

function reiniciar_jogo(){
    document.location.reload(true);
}