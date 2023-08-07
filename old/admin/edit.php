<?php
    include_once "./HEAD.php";

    if(!isset($_SESSION["SuperUser"])){
        header("Location: ../");
        die();
    }

    $parametros = str_replace("/admin/edit.php/?", "", $_SERVER["REQUEST_URI"]);

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
        /* DB */
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "loja";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            
            $sql = "UPDATE produtos SET titulo='$titulo', preco='$preco', descricao='$descricao', tamanho='$tamanhos', promocao='$promocao'  WHERE id='$id'";

            $conn->exec($sql);
            $result = "ok";
        }
        catch(PDOException $e) {
            $result = "Server file: " . $e->getMessage();
        }
        //encerra
        $conn = null;

        if($result == "ok"){
            $_SESSION['msg'] = "Successfully edited";
            header("Location: /admin");
            die();
        }else{
            $_SESSION['msg'] = "Server fail!";
            header("Location: /admin/edit.php");
            die();
        }
    }
?>

<div class="container">
    <br>
    <h1>Edit</h1>
    <?php
        include_once "../includes/db.php";
        $r = produto($parametros);

        foreach($r as $r){
            /* images */
            $imgs = explode(',', $r[1]);
            $imgtxt = '';
            $c = 0;
            foreach($imgs as $img){
                if($img != '' and $img != ' '){
                    if($c == 0){
                        $imgtxt = $imgtxt . "
                            <div class='carousel-item active'>
                                <img class='d-block w-100 imgResponsive' src='../../public/img/". $img ."' alt='Fotos'>
                            </div>
                        ";
                    }else {
                        $imgtxt = $imgtxt . "
                            <div class='carousel-item'>
                                <img class='d-block w-100 imgResponsive' src='../../public/img/". $img ."' alt='Fotos'>
                            </div>
                        ";
                    }
                }
                $c += 1;
            }
            /* sizes */
            $tamanhos = explode(',', $r[5]);
            $tamanho = '';
            $c = 0;
            $medidas = array('S','M','L','XL','2XL','3XL');
            foreach($tamanhos as $tam){
                $i = 0;
                foreach($medidas as $m){
                    if($tam == $medidas[$i]){
                        unset($medidas[$i]);
                        $medidas[$i] = '';
                    }
                    $i += 1;
                }
                if($tam){
                    $tamanho .= "
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='". $tam ."' value='". $tam ."' name='tamanho[]' checked>
                            <label class='form-check-label' for='". $tam ."'>". $tam ."</label>
                        </div>
                    ";
                }
                $c += 1;
            }
            foreach($medidas as $m){
                if($m != ''){
                    $tamanho .= "
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='". $m ."' value='". $m ."' name='tamanho[]'>
                            <label class='form-check-label' for='". $m ."'>". $m ."</label>
                        </div>
                    ";
                }
            }
            echo ("
                <div class='row'>
                    <div class='col-sm'>
                        <div class='card customcar' style='width: 30rem;'>
                            <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
                                <div class='carousel-inner'>
                                    ". $imgtxt ."
                                </div>
                                <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                    <span class='sr-only'></span>
                                </a>
                                <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
                                    <span class='carousel-control-next-icon' aria-hidden='true' ></span>
                                    <span class='sr-only'></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm'>
                        <form action='./edit.php' method='post'>
                            <input type='text' id='id' name='id' value='". $r[0] ."' hidden>
                            <div class='form-group'>
                                <label for='titulo'>Title</label>
                                <input type='text' class='form-control' id='titulo' name='titulo' required value='". $r[2] ."'>
                            </div>
                            <div class='form-group'>
                                <label for='promocao'>Old price</label>
                                <input type='number' step='any' class='form-control' id='promocao' name='promocao' required value='". $r[6] ."'>
                            </div>
                            <div class='form-group'>
                                <label for='preco'>Price</label>
                                <input type='number' step='any' class='form-control' id='preco' name='preco' required value='". $r[3] ."'>
                            </div>
                            <div class='form-group'>
                                <label for='descricao'>Description</label>
                                <textarea class='form-control' id='descricao' rows='5' name='descricao' required>". $r[4] ."</textarea>
                            </div>
                            <div class='form-group'>
                                ". $tamanho ."
                            </div>
                            <button type='submit' class='btn btn-primary' style='min-width: 100px'>EDIT</button>
                        </form>
                        <br>
                        <a href='../remove.php/?". $r[0] ."'><button class='btn btn-danger' style='min-width: 100px'>REMOVE</button></a>
                    </div>
                </div>
            ");
        }
    ?>
</div>
<br><br><br><br>

<style>
    .container {
        min-height: 600px;
    }
    @media only screen and (max-width: 3000px) {
        .customcar {
            width: 25rem;
        }
    }
    @media only screen and (max-width: 770px) {
        .customcar {
            width: 20rem;
        }
        .carousel-inner{
            max-width: 400px;
        }
    }
</style>

<?php include_once "../partials/FOOT.php" ?>