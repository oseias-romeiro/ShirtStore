<?php
    session_start();
    $id = str_replace("/config/apagaProduto.php?", "", $_SERVER["REQUEST_URI"]);

    if(isset($_SESSION['carrinho'])){
        
        $tam = count($_SESSION['carrinho']);

        if($tam == 1){
            $_SESSION['carrinho'] = null;
        }else {
            unset($_SESSION['carrinho'][$id]);
        }
    }
    header("Location: /cart.php");
    die();
?>