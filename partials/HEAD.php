<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web clothes / shirt store to sell, if you search for a ecommmerce working now, this can be be your!" title="shirt store | Ecommerce to sell">
    <meta name="keywords" content="ecommerce, website, clothes, store, shirts, buy, sell, buy-an-ecommerce">
    <meta name="google-site-verification" content="hZcQF8vJ9UveUt0bOdHXs2w-E6NEyzFWpVpEc4GFKSI" />
    
    <title>STORE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php
        if($_SERVER['PHP_SELF'] == '/index.php'){
            echo '<link rel="stylesheet" href="public/css/style.css">'; 
        }
    ?>
    <link rel="stylesheet" href="../../public/css/fonte.css">

    <link rel="shortcut icon" href="../public/img/favicon.ico" type="image/x-icon">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand text-warning" href="/" style='width: 100px; text-align: center'>STORE</a>
        <button class="navbar-toggler" id="btnMobile" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item <?php if($_SERVER['PHP_SELF'] == '/index.php'){ echo 'active'; } ?>">
                    <a class="nav-link" href="/" >Home</a>
                </li>
                <?php
                    $local = $_SERVER["PHP_SELF"];
                    $carrinho = $perfil = $cadastro = '';

                    if($local == "/cart.php"){ $carrinho = "active"; }
                    if($local == "/profile.php"){ $perfil = "active"; }
                    if($local == "/create.php"){ $cadastro = "active"; }

                    if(isset($_SESSION['user'])){
                        echo('
                            <li class="nav-item '. $carrinho .'">
                                <a class="nav-link" href="../../cart.php" >Cart</a>
                            </li>
                            <li class="nav-item '. $perfil .'">
                                <a class="nav-link" href="../../profile.php" >Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../valid/logout.php" >Log out</a>
                            </li>
                        ');
                    }else {
                        echo('
                            <li class="nav-item '. $carrinho .'">
                                <a class="nav-link" href="../../cart.php" >Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModal" >Sign In</a>
                            </li>
                            <li class="nav-item '. $cadastro .'">
                                <a class="nav-link" href="/create.php" >Sign Up</a>
                            </li>
                        ');
                    }
                ?>
            </ul>
        </div>
    </nav>
    
    <!-- ALERTS -->
    <?php include_once "includes/msg.php" ?>

<!-- Modal LOGIN -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../valid/login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" name="email" required
                            <?php
                                if(isset($_COOKIE["lembra"])){
                                    echo "value='". $_COOKIE["lembra"] ."'";
                                }
                            ?>
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="lembra" name="lembra"
                            <?php
                                if(isset($_COOKIE["lembra"])){
                                    echo "checked";
                                }
                            ?>
                        >
                        <div class="row">
                            <div class="col-8">
                                <label class="form-check-label" for="lembra">Remind</label>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">Sign in</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
