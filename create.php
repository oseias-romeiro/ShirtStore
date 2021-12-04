<?php include_once "partials/HEAD.php" ?>

<br>
<div class="container" style='margin-top: 70px;'>

    <h1>Create Account</h1>
    <hr><br>
    <div class="forms">
        <form action="/valid/cadastro.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Full Name" name="nome" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm password" name="password2" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style='width: 60%;'>Create</button>
            <br>
        </form>
    </div>

</div>

<style>
    .container {
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

<?php include_once "partials/FOOT.php" ?>