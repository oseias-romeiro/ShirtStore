<?php
    include_once "partials/HEAD.php";
    include_once "includes/db.php";
?>

<div class="capa">
    <picture>
        <source srcset="public/img/capaMobile.jpeg" media="(max-width: 770px)">
        <source srcset="public/img/capa2.png">
        <img src="public/img/capa2.png" alt="Responsive image" class="img-fluid">
    </picture>
    <br><br>
</div>

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