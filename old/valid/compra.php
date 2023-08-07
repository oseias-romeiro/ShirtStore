<?php
    session_start();

    /* DB */
    include_once "../includes/db.php";

    /* IN */
    $quantidade = $_POST['quantidade'];
    $tamanho = $_POST['tamanho'];
    $id = $_POST['id'];

    // VERIFY PRODUCT
    $r = produto($id);
    
    if($_SERVER["REQUEST_METHOD"] == "POST" and $r != "Server connection fail!"){

        // ADD TO CART
        if(isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'][$id]['quantidade'] = $quantidade;
            $_SESSION['carrinho'][$id]['tamanho'] = $tamanho;
        }else{
            $_SESSION['carrinho'][$id] = array('quantidade' => $quantidade, 'tamanho' => $tamanho);
        }
        
        // REDIRECT
        $_SESSION['msg'] = 'Product added to cart';
        if(isset($_SESSION['user'])){
            header('Location: /cart.php');
            die();
        }else {
            header('Location: /');
            die();
        }
    }else {
        header('Location: /');
        die();
    }
?>