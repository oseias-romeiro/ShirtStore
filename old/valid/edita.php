<?php
    session_start();
    /* DB */
    include_once "../includes/db.php";

    if(isset($_SESSION['user']) and $_SERVER["REQUEST_METHOD"] == "POST"){
        
        // IN
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        /* SANITIZATION */
        $nome = filter_var($nome, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $password = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $password2 = filter_var($password2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        /* VALIDATION */
        $NumPass = preg_match_all("/[0-9]/", $password);// contador de numeros
        $UpPass = preg_match_all("/[A-Z]/", $password);// contador de letras maiusculas
        $ValidName = preg_match_all("/[a-zA-Z ]/", $nome);// quantidade de letras e espaços

        if($password != $password2){
            $_SESSION["msg"] = "Passwords don't match";
        }
        else if($NumPass < 4 or $UpPass == 0){
            $_SESSION["msg"] = "Password must contain numbers and uppercase letters";
        }
        else if(strlen($email) < 10 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION["msg"] = 'Invalid Email';
        }
        else if (strlen($nome) < 3 || $ValidName != strlen($nome) ){
            $_SESSION["msg"] = "Invalid name";
        }else {
            $r = upPerfil($nome, $email, $password);
            if($r == "ok"){
                $_SESSION["msg"] = "Successfully edited";
                header("Location: /");
                die();
            }else {
                $_SESSION["msg"] = 'Server fail';
                header("Location: /perfil.php");
                die();
            }
        }
        header("Location: /perfil.php");
        die();
    }else {
        header("Location: /");
        die();
    }
?>