<?php
    include_once "./HEAD.php";
    include_once "../includes/db.php";

    if(!isset($_SESSION["SuperUser"])){
        header("Location: ../");
        die();
    }
?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>LIST</h2>
        </div>
        <div class="col-4">
            <a href="./adicionar.php">
                <button class="btn btn-success">+ NEW</button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
    <?php
        $r = produtos();

        foreach($r as $r){
            $img = explode(',', $r[1]);
            echo("
                <div class='col'>
                    <a href='./edit.php/?". $r[0] ."' style='text-decoration: none; color: black'>
                        <div class='card-body' style='text-align: center'>
                            <h4>ID: ". $r[0] ."</h4>
                            <hr>
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
</div>

<style>
    .container {
        min-height: 2000px;
    }
</style>

<?php include_once "../partials/FOOT.php" ?>