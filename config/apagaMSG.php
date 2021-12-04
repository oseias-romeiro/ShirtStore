<?php
    session_start();
    
    $parametros = str_replace("/config/apagaMSG.php/?", "", $_SERVER["REQUEST_URI"]);

    $_SESSION['msg'] = null;
    if($parametros == "/index.php"){
        header("Location: /");
    }else{
        header("Location: $parametros");
    }
    die();
?>