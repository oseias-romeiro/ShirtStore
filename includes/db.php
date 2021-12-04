<?php
    define("SERVERNAME", 'localhost');
    define("USERNAME", 'root');
    define("PASSWORD", '');
    define("DB", 'loja');

    /* cria usuario */
    function insere($nome, $email, $senha){

        // criptografando senha
        $options = ['cost' => 8];
        $senhaSegura = password_hash($senha,  PASSWORD_DEFAULT, $options);
        
        try {
            $conn = new PDO("mysql:host=". SERVERNAME .";dbname=".DB, USERNAME, PASSWORD);
            
            /* verifica se o email ja existe */
            $stmt = $conn->prepare("SELECT * FROM users WHERE email='$email' ");
            $stmt->execute();
            
            if($stmt->fetchAll()) {
                $result = "Email already exist";
            }else {
                $sql = "INSERT INTO users (nome, email, senha, super) VALUES ('$nome', '$email', '$senhaSegura', 0)";

                $conn->exec($sql);
                $result = "ok";
            }
        }
        catch(PDOException $e) {
            $result = "Server connection fail!";
        }
        //encerra
        $conn = null;
        return $result;
    }
    /* login */
    function validaDB($email, $senha) {

        //$senha = md5($senha);
        
        try {
            $conn = new PDO("mysql:host=". SERVERNAME .";dbname=".DB, USERNAME, PASSWORD);

            $stmt = $conn->prepare("SELECT * FROM users WHERE email='$email' ");
            $stmt->execute();

            $result = "none";
            $iduser = '';
            
            foreach($stmt->fetchAll() as $data) {
                $iduser = $data[0];
                $senhaDB = $data[3];
                if($data[4] == 1){
                    $_SESSION['SuperUser'] = TRUE;
                }
                break;
            }
            if(password_verify($senha, $senhaDB)){
                $result = "ok";
                $_SESSION["user"] = $iduser;
            }else {
                $result = "Incorrect password";
            }
        }
        catch(PDOException $e) {
            $result = "Server connection fail!";
        }
        //encerra
        $conn = null;
        return $result;
    }
    /* seleciona produtos */
    function produtos() {
        try {
            $conn = new PDO("mysql:host=". SERVERNAME .";dbname=".DB, USERNAME, PASSWORD);

            $stmt = $conn->prepare("SELECT * FROM produtos ORDER BY id");
            $stmt->execute();

            $result = $stmt->fetchAll();

        }
        catch(PDOException $e) {
            $result = "Server connection fail!";
        }
        //encerra
        $conn = null;
        return $result;
    }
    /* procura produto pelo id */
    function produto($id) {
        
        try {
            $conn = new PDO("mysql:host=". SERVERNAME .";dbname=".DB, USERNAME, PASSWORD);

            $stmt = $conn->prepare("SELECT * FROM produtos WHERE id='$id'");
            $stmt->execute();

            $result = $stmt->fetchAll();
        }
        catch(PDOException $e) {
            $result = "Server connection fail!";
        }
        //encerra
        $conn = null;
        return $result;
    }
    /* dados do usuario */
    function perfil($id){
        try {
            $conn = new PDO("mysql:host=". SERVERNAME .";dbname=".DB, USERNAME, PASSWORD);
    
            $stmt = $conn->prepare("SELECT * FROM users WHERE id='$id'");
            $stmt->execute();
    
            $result = $stmt->fetchAll();
        }
        catch(PDOException $e) {
            // $e->getMessage() = menssagem de erro
            $result = "Server connection fail!";
        }
        //encerra
        $conn = null;
    
        global $id, $email, $nome;
        foreach($result as $r){
            $id = $r[0];
            $nome = $r[1];
            $email = $r[2];
        }
    }
    /* atualiza dados do usuario */
    function upPerfil($nome, $email, $senha){

        // criptografando senha
        $options = ['cost' => 8];
        $senhaSegura = password_hash($senha,  PASSWORD_DEFAULT, $options);
        
        try {
            $conn = new PDO("mysql:host=". SERVERNAME .";dbname=".DB, USERNAME, PASSWORD);
            
            $sql = "UPDATE users SET nome = '$nome', senha = '$senhaSegura', super = 0 WHERE email='$email' ";

            $conn->exec($sql);
            $result = "ok";
        }
        catch(PDOException $e) {
            $result = "Server connection fail!";
        }
        //encerra
        $conn = null;
        return $result;
    }
?>