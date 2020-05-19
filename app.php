<?php

if(isset($_GET['get'])){
    switch ($_GET['get']) {
        case 'configuracoes':
            $configuracoes = json_decode(convert_uudecode(file_get_contents('configuracoes.txt')));

            $nivel = $_POST['nivel'];
            echo json_encode($configuracoes->$nivel);
            exit;
            
        break;
        case 'recordes':
            $recordes = json_decode(convert_uudecode(file_get_contents('recordes.txt')));
            // sdie($recordes);
            $nivel = $_POST['nivel'];
            echo json_encode($recordes->$nivel);
            exit;
            break;
        default:
            break;
    }
}elseif(isset($_GET['set'])){
    switch ($_GET['set']) {
        case 'recorde':
            $nivel = $_POST['nivel'];
            
            $recordes = json_decode(convert_uudecode(file_get_contents('recordes')));
            $recorde_atual = $recordes->$nivel->recorde;

            if($_POST['recorde'] > $recorde_atual){
                $recordes->$nivel->recorde = $_POST['recorde'];
                $recordes->$nivel->nome = $_POST['nome'];
            }

            if(file_put_contents('recordes', convert_uuencode(json_encode($recordes)))){
                echo "sucesso";
            }

            exit;
            break;    
        default:
            break;
    }
}

function sdie($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    die();
}