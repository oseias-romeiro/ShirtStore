<?php
    include_once "partials/HEAD.php";
    include_once "includes/db.php";
?>

<div class="capa">
    <div class='sell'>
        ECOMMERCE TO SELL
    </div>
    <picture>
        <source srcset="public/img/capaMobile.jpeg" media="(max-width: 770px)">
        <source srcset="public/img/capa2.jpeg">
        <img src="public/img/capa.jpeg" alt="Responsive image" class="img-fluid">
    </picture>
    <br><br>
</div>

<style>
    .sell {
        font-family: 'Times New Roman', Times, serif;
        color: orange;
        font-size: 2rem;
        text-decoration: underline;
        margin-top: 45px;
        padding: 20px 0 10px 0;
    }
</style>

<hr>
<div class="container">
    <div class="row">
        <?php
            $r = produtos();
            foreach($r as $r){
                $img = explode(',',  $r[1]);
                echo ("
                    <div class='col-6 col-md-3'>
                        <a href='/product.php/?". $r[0] ."' style='text-decoration: none; color: black' class='card'>
                            <img src='public/img/". $img[0] ."' alt='modelo' class='imgRes align-self-center' >
                            <div class='card-body' style='text-align: center'>
                                <h5 class='card-title'>". $r[2] ."</h5>
                                <del>$ ". $r[6] ."</del>
                                <h2>$ ". $r[3] ."</h2>
                            </div>
                        </a>
                        <br>
                    </div>
                ");
            }
        ?>
    </div>
</div><br>


<?php include_once "partials/FOOT.php" ?>