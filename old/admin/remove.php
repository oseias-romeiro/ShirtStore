<?php
    session_start();

    if(!isset($_SESSION["SuperUser"])){
        header("Location: ../");
        die();
    }
    
    $id = str_replace("/admin/remove.php/?", "", $_SERVER["REQUEST_URI"]);

    /* DB */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "loja";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

        /* Images delete */
        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id='$id'");
        $stmt->execute();
        
        $files = '';
        foreach($stmt->fetchAll() as $data) {
            $files = $data[1];
        }
        $files = explode(',', $files);
        foreach($files as $f) {
            $filepath = "C:/xampp/htdocs/public/img/". $f; // path da imagem
            unlink($filepath);
        }

        /* delete in DB */
        $sql = "DELETE FROM produtos WHERE id='$id'";

        $conn->exec($sql);
        $result = "ok";
    }
    catch(PDOException $e) {
        $result = "Conexão com BD falhou: " . $e->getMessage();
    }
    //exit
    $conn = null;

    if($result == "ok"){
        $_SESSION['msg'] = "Successfully removed";
    }else{
        $_SESSION['msg'] = "Server Fail!";
    }
    header("Location: /admin");
    die();
?>
