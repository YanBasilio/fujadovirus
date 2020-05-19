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

        <div id="regressiva"></div>
        
        <div id="campo" class="w3-card-4">
            <div id="parede_campo_top" class="parede_campo"></div>
            <div id="parede_campo_right" class="parede_campo"></div>
            <div id="parede_campo_bottom" class="parede_campo"></div>
            <div id="parede_campo_left" class="parede_campo"></div>
            <div id="smile" class="smile" style="display:none"></div>
            <div id="modal_inicio" class="w3-container w3-card-4">
                <div class="w3-center">
                    <img src="content/img/coroninha.png" style="width:10vh;"/>
                    <h2 class="titulo">Fuja do virus</h2>
                </div>

                <div class="w3-container" style="margin-bottom: 15px">
                    <h4 class="sub-titulo-modal w3-center">Fuja do vírus com o cursor do mouse e prove que você é mais rápido que ele.</h4>
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
            <p id="recorde-atual" class="font-posicao"> Recorde: <br/> - <br/> - </p>
        </div>
        <div id="div-pontuacao">
            <p class="font-posicao"> Sua Pontuacao <br/><b id="pt_atual"> - </b></p>
        </div>

        <div class="w3-row w3-center">
            <h4 class="subtitulo w3-center">Saiba o que é vírus!</h4>
            <div class="w3-col m1">&nbsp;</div>
            <div class="w3-col w3-container m2">
                <img id="img-texto1"src="content/img/coroninha.png" style="width:200px;"/>
            </div>
            <div id="texto1" class="w3-col w3-container m8">
                São organismos simples, (para muitos não são considerados seres vivos), mas que podem ser fatais para animais e
                seres humanos, eles não tem a estrutura de uma célula e, ao contrário das bactérias, não tem condições de se multiplicarem sozinhos.
                Sendo assim o vírus invade e destrói a célula para se multiplicarem, e por fim saem prontos para atacar.<br/><br/>
                Os mesmos podem passar por mutações rapidamente, com isso eles se transformam em armas letais para os seres humanos.
            </div>
            <div class="w3-col m12">&nbsp;</div>
            <div class="w3-col m2">&nbsp;</div>
            <div class="w3-col m8" style="text-align:left;">
            <ul>
                <li>Lave com frequência as mãos até a altura dos punhos, com água e sabão, ou então higienize com álcool em gel 70%.</li>
                <li>Ao tossir ou espirrar, cubra nariz e boca com lenço ou com o braço, e não com as mãos.</li>
                <li>Evite tocar olhos, nariz e boca com as mãos não lavadas.</li>
                <li>Ao tocar, lave sempre as mãos como já indicado.</li>
                <li>Mantenha uma distância mínima de cerca de 2 metros de qualquer pessoa tossindo ou espirrando.</li>
                <li>Evite abraços, beijos e apertos de mãos. Adote um comportamento amigável sem contato físico, mas sempre com um sorriso no rosto.</li>
                <li>Higienize com frequência o celular e os brinquedos das crianças.</li>
                <li>Não compartilhe objetos de uso pessoal, como talheres, toalhas, pratos e copos.</li>
                <li>Mantenha os ambientes limpos e bem ventilados.</li>
                <li>Evite circulação desnecessária nas ruas, estádios, teatros, shoppings, shows, cinemas e igrejas. Se puder, fique em casa.</li>
                <li>Se estiver doente, evite contato físico com outras pessoas, principalmente idosos e doentes crônicos, e fique em casa até melhorar.</li>
                <li>Durma bem e tenha uma alimentação saudável.</li>
                <li>Utilize máscaras caseiras ou artesanais feitas de tecido em situações de saída de sua residência. </li>
            </ul>
            </div>
            <div class="w3-col m2">&nbsp;</div>
            <h4 class="w3-col subtitulo w3-center">Aprenda a lavar as mãos correetamente e previna-se!</h4>
            <iframe class="frame" src="https://www.youtube.com/embed/rsQlyIwetsE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="div-adsense w3-center">
            <div id="844717441">
                <script type="text/javascript">
                    try {
                        window._mNHandle.queue.push(function (){
                            window._mNDetails.loadTag("844717441", "728x90", "844717441");
                        });
                    }
                    catch (error) {}
                </script>
            </div>
        </div>

        <!-- MODAL RECORDE -->
        <div id="modal_recorde" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <header class="w3-container "> 
                        <h2 class="w3-center">RECORDE!!!</h2>
                    </header>
                    <div class="w3-container  w3-center" style="margin-bottom: 15px">
                        <h3 class="sub-titulo-modal  w3-center">Uaal!! Você bateu o último recorde na dificuldade <b id="nivel_recorde">-</b>.</h3>
                        
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
                         <h3 id="mensagem_perda" class="sub-titulo-modal"></h3>
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
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-analytics.js"></script>

    <!-- FUJADOVIRUS  -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="content/js/detectmobilebrowser.js?<?=strtotime(date('Y-m-d H:i:s'))?>"></script>
    <script src="content/js/script.js?<?=strtotime(date('Y-m-d H:i:s'))?>"></script>
    
    <script data-ad-client="ca-pub-8708315484895922" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</html>