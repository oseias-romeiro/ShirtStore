<?php
    include_once "partials/HEAD.php";
    $parametros = str_replace("/product.php/?", "", $_SERVER["REQUEST_URI"]);
?>
<br><br><br><br>
<div class="container">
    <div class="card" style="padding: 10px">
        <div class="row">
            <?php
                include_once "includes/db.php";
                $r = produto($parametros);

                foreach($r as $r){
                    /* imagens */
                    $imgs = explode(',', $r[1]);
                    $imgtxt = '';
                    $c = 0;
                    foreach($imgs as $img){
                        if($img != '' and $img != ' '){
                            if($c == 0){
                                $imgtxt = $imgtxt . "
                                    <div class='carousel-item active'>
                                        <img class='d-block w-100 imgResponsive' src='../public/img/". $img ."' alt='Fotos' >
                                    </div>
                                ";
                            }else {
                                $imgtxt = $imgtxt . "
                                    <div class='carousel-item'>
                                        <img class='d-block w-100 imgResponsive' src='../public/img/". $img ."' alt='Fotos' >
                                    </div>
                                ";
                            }
                        }
                        $c += 1;
                    }
                    /* sizes */
                    $tamanhos = explode(',', $r[5]);
                    $tamanho = '';
                    foreach($tamanhos as $tam){
                        if($tam){
                            if($tam == 'M'){
                                $tamanho .= "<option selected value='". $tam ."'>". $tam ."</option>";
                            }
                            else {
                                $tamanho .= "<option value='". $tam ."'>". $tam ."</option>";
                            }
                        }
                    }
                    echo ("
                        <div class='col-sm'>
                            <div class='card customcar' >
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
                            <br>
                            <h2>". $r[2] ."</h2>
                            <del>$ ". $r[6] ."</del>
                            <h1>$ ". $r[3] ."</h1>
                            <br>
                            <form action='../valid/compra.php' method='post'>
                                <input type='text' class='form-control' name='id' value='". $parametros ."' hidden>
                                <div class='input-group mb-3' style='max-width: 200px'>
                                    <span class='input-group-text'>Unit: </span>
                                    <input type='number' class='form-control' name='quantidade' required>
                                </div>
                                <div class='input-group mb-3'>
                                    <label class='input-group-text' for='inputGroupSelect01'>Size</label>
                                    <select class='form-select' id='inputGroupSelect01' name='tamanho' required>
                                        ". $tamanho ."
                                    </select>
                                </div>
                                <button type='submit' class='btn btn-warning'>ADD TO CART</button>
                            </form>
                            <br><br>
                            <p>Description</p>
                            <p>". $r[4] ."</p>
                        </div>
                    ");
                }
            ?>
        </div>
    </div>
</div>
<br>

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
<?php
    include_once "partials/FOOT.php";
?>
