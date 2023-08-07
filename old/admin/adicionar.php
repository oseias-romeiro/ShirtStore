<?php
    include_once "HEAD.php";

    if(!isset($_SESSION["SuperUser"])){
        header("Location: ../");
        die();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        /* IN */
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $promocao = $_POST['promocao'];

        $tamanho = $_POST['tamanho'];
        $tamanhos = '';
        foreach($tamanho as $t){
            $tamanhos .= $t . ",";
        }
        /* file */
        $files = $_FILES['imagem']['name'];
        $MultiNames = '';
        $c = 0;
        foreach($files as $f){
            $FileType = strtolower(pathinfo($f, PATHINFO_EXTENSION));
            $filename = uniqid() . ".$FileType";
            $path = "../public/img/$filename";
            $MultiNames = $MultiNames . $filename . ",";

            move_uploaded_file($_FILES["imagem"]["tmp_name"][$c], $path);
            $c += 1;
        }
        /* DB */
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "loja";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

            $stmt = $conn->prepare("SELECT * FROM produtos WHERE id='$id'");
            $stmt->execute();
    
            $find = FALSE;
            $tam = count($stmt->fetchAll());
            if($tam > 0){
                $find = TRUE;
            }
            if(!$find){
                $sql = "INSERT INTO produtos (id, imagem, titulo, preco, descricao, tamanho, promocao) VALUES ('$id', '$MultiNames', '$titulo', '$preco', '$descricao', '$tamanhos', '$promocao')";

                $conn->exec($sql);
                $result = "ok";
            }else {
                $result = "ID already exist!";
            }
        }
        catch(PDOException $e) {
            $result = "Conexão com BD falhou: " . $e->getMessage();
        }
        //EXIT
        $conn = null;

        if($result == "ok"){
            $_SESSION['msg'] = "Successfully added";
            header("Location: /admin");
            die();
        }else{
            if($result == "ID already exist!"){
                $_SESSION['msg'] = $result;
            }
            else {
                $_SESSION['msg'] = "Server fail!" . $result;
            }
            header("Location: /admin/adicionar.php");
            die();
        }
    }
?>

<div class="container">
    <br><br>
    <h1>ADD</h1>
    <form action="./adicionar.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="formFileMultiple" class="form-label">Imagem</label>
            <input class="form-control" type="file" id="formFileMultiple" name="imagem[]" multiple required>
            <small>3:4 images on portrait mode</small>
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" placeholder="id" name="id" required>
            <small>Products are sorted in ascending order by ID</small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="titulo" placeholder="Title" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="preco">Price</label>
            <input type="number" step='any' class="form-control" id="preco" placeholder="29.99" name="preco" required>
        </div>
        <div class="form-group">
            <label for="promocao">Old Price</label>
            <input type="number" step='any' class="form-control" id="promocao" placeholder="opcional" name="promocao">
        </div>
        <div class="form-group">
            <label for="descricao">Description</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao" required></textarea>
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="S" value="S" name="tamanho[]" checked>
                <label class="form-check-label" for="S">S</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="M" value="M" name="tamanho[]" checked>
                <label class="form-check-label" for="M">M</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="L" value="L" name="tamanho[]" checked>
                <label class="form-check-label" for="L">L</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="XL" value="XL" name="tamanho[]" checked>
                <label class="form-check-label" for="XL">XL</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="2XL" value="2XL" name="tamanho[]" checked>
                <label class="form-check-label" for="2XL">2XL</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="3XL" value="3XL" name="tamanho[]" checked>
                <label class="form-check-label" for="3XL">3XL</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">ADD</button>
    </form>
</div>
<br><br><br><br><br>

<?php include_once "../partials/FOOT.php"; ?>
