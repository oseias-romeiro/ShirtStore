<?php
    include_once "partials/HEAD.php";

    if(!isset($_SESSION["user"])){
        header("Location: ../");
        die();
    }

    /* DB */
    include_once "./includes/DB.php";

    $id = $_SESSION["user"];
    perfil($id);
?>
<div class="container" style="margin-top: 80px">
    <br>
    <h2>Edit</h2>
    <hr>

    <div class="forms">
        <form action="/valid/edita.php" method="post">
            <input type="text" id="id" name="id" value='<?php echo $id; ?>' hidden>
            <div class="form-group">
                <label for="nome">NAME</label>
                <input type="text" class="form-control" placeholder="Nome" name="nome" required value='<?php echo $nome; ?>'>
            </div>
            <div class="form-group">
                <label for="email">EMAIL</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="email" name="email" readonly value='<?php echo $email; ?>'>
            </div>
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" class="form-control" placeholder="Senha" name="password" required>
            </div>
            <div class="form-group">
                <label for="password2">CONFIRM PASSWORD</label>
                <input type="password" class="form-control" placeholder="Senha" name="password2" required>
            </div>
            <div class="center" style='text-align: center'>
                <button type="submit" class="btn btn-success" name="edita" style='min-width: 40%;'>EDIT</button>
            </div>
        </form>
    </div>  
    
</div>

<style>
    h2 {
        text-align: center;
    }
    .forms {
        margin-left: 20%;
        margin-right: 20%;
    }
    @media only screen and (max-width: 770px) {
        .forms {
            margin-left: 0;
            margin-right: 0;
        }
    }
</style>

<?php include_once "./partials/FOOT.php"; ?>