<?php
    session_start();
    include_once "../includes/db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // IN
        $email = $_POST["email"];
        $password = $_POST["password"];

        /* SANTIZATION */
        $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $password = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        /* VALIDATION */
        $r = validaDB($email, $password);
        
        if($r  == "ok"){
            $_SESSION['msg']  = 'Login successfully';
            if(isset($_POST["lembra"])){
                setcookie('lembra', $email, time()+(86400*30), "/");
            }
        }else {
            $_SESSION['msg'] = $r;
        }
        header("Location: /");
        die();
    }else {
        header("Location: /");
        die();
    }
?>