<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Desvie dos virus e prove que você é mais rápido que ele." />
        <meta name="keywords" content="virus, gripe, coronavirus, corona, fuja do virus, fuja do corona, pandemia, epidemia, game, jogo"/>
        <meta name="robots" content="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="language" content="pt-br" />
        <meta name="author" content="Yan T. Basilio" />
        <link rel="icon" href="content/img/virus.ico" />
        <title>Fuja do Virus</title>
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="content/css/w3.css?<?=strtotime(date('Y-m-d H:i:s'))?>">
        <link rel="stylesheet" type="text/css" href="content/css/style.css?<?=strtotime(date('Y-m-d H:i:s'))?>" />
    </head>
    <body>
        <div id="container_principio" class="w3-container">
            <div class="w3-center">
                <img src="content/img/coroninha.png" style="width:250px;"/>
                <h2 id="titulo" class="w3">Fuja do virus</h2>
            </div>
        </div>

        <div id="regressiva"></div>

        <div id="campo" class="w3-card-4">
            <div id="parede_campo_top" class="parede_campo"></div>
            <div id="parede_campo_right" class="parede_campo"></div>
            <div id="parede_campo_bottom" class="parede_campo"></div>
            <div id="parede_campo_left" class="parede_campo"></div>
            
            <div id="modal_inicio" class="w3-container w3-card-4">
                <h2 class="w3-center">Fuja do Virus</h2>
                <div class="w3-container" style="margin-bottom: 15px">
                    <h4 class=" w3-center">Fuja do vírus com o cursor do mouse e prove que você é mais rápido que ele.</h4>
                    <div class="w3-container">
                        <p>Escolha o nível de dificuldade</p>
                        <div>
                            <input id="dificuldade_facil" type="radio" name="dificuldade" value="facil">
                            <label id="label_facil" for="dificuldade_facil">Fácil</label>
                        </div>
                        <div>
                            <input id="dificuldade_media" type="radio" name="dificuldade" value="media" checked>
                            <label id="label_media" for="dificuldade_media">Média</label>
                        </div>
                        <div>
                            <input id="dificuldade_dificil" type="radio" name="dificuldade" value="dificil">
                            <label id="label_dificil" for="dificuldade_dificil">Difícil</label>
                        </div>
                    </div>
                </div>
                <button class="w3-button w3-green w3-col" onclick="contagem_regressiva()">COMEÇAR</button>
            </div>
        </div>

        <div id="div-recorde">
            <p  id="recorde-atual"> Recorde: <br/> - <br/> - </p>
        </div>
        <div id="div-pontuacao">
            <p> Sua Pontuacao <br/><b id="pt_atual"> - </b></p>
        </div>
        
        <div class="div-adsense w3-center">
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- bottom_block -->
          <ins class="adsbygoogle"
               style="display:inline-block;width:728px;height:120px"
               data-ad-client="ca-pub-8708315484895922"
               data-ad-slot="9285863583"></ins>
          <script>
               (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </div>

        <!-- MODAL RECORDE -->
        <div id="modal_recorde" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <header class="w3-container "> 
                        <h2 class="w3-center">RECORDE!!!</h2>
                    </header>
                    <div class="w3-container  w3-center" style="margin-bottom: 15px">
                        <h3 class=" w3-center">Uaal!! Você bateu o último recorde na dificuldade <b id="nivel_recorde">-</b>.</h3>
                        
                        <p>O recorde era de <b id="recorde_antigo"></b> e você superou com <b id="recorde_novo"></b> virus.</p>
                        
                        <h4>Informe o seu nome para entrar para o nosso livro dos recordes!</h4>
                        <input id="ipt_nome" type="text" value="">
                    </div>
                    <footer class="w3-container" style="margin-bottom: 15px">
                        <button class="w3-button w3-green w3-col" onclick="salvar_recorde()">Salvar e Jogar Novamente</button>
                    </footer>
                </div>
            </div>
        </div> <!-- /MODAL RECORDE -->
        

        <!-- MODAL PERDA -->
        <div id="modal_perda" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <header class="w3-container "> 
                        <h2 id="titu-perda" class="w3-center"></h2>
                    </header>
                    <div class="w3-container w3-center" style="margin-bottom: 15px">
                         <h3 id="mensagem_perda"></h3>
                    </div>
                    <footer class="w3-container" style="margin-bottom: 15px">
                        <button class="w3-button w3-green w3-col" onclick="reiniciar_jogo()">Jogar Novamente</button>
                    </footer>
                </div>
            </div>
        </div> <!-- / MODAL PERDA -->
    </body>

    <!-- FIREBASE -->
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-analytics.js"></script>

    <!-- FUJADOVIRUS  -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="content/js/detectmobilebrowser.js?<?=strtotime(date('Y-m-d H:i:s'))?>"></script>
    <script src="content/js/script.js?<?=strtotime(date('Y-m-d H:i:s'))?>"></script>
    
    <script data-ad-client="ca-pub-8708315484895922" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</html>