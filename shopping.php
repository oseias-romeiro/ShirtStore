<?php
    include_once "./partials/HEAD.php";
    include_once "./includes/db.php";
    
    if(!isset($_SESSION['user']) or !isset($_SESSION['carrinho'])){
        $_SESSION['msg'] = 'Do login or create account!';
        header('Location: /');
        die();
    }
?>

<div class="container">
    <br><br><br><br>
    <h2>Shopping</h2>
    <div class="table-responsive">
        <table class='table table-bordered'>
<?php
    $produtos = $_SESSION['carrinho'];
    $total = 0;

    foreach($produtos as $key => $value){
        $id = $key;
        $qtd = $value['quantidade'];
        $tam = $value['tamanho'];

        $r = produto($id); // dados do DB

        foreach($r as $r){
            $valor = (float) $r[3];
            $quantidade = (int) $qtd;

            $total += ($valor * $quantidade); //total

            $img = explode(',',  $r[1]);
            echo ("
                <tr>
                    <td style='text-align: center;'>
                        <img src='../public/img/". $img[0] ."' alt='foto' style='width: 8rem;'>
                        <p>". $r[2] ."<br>Size: ". $tam ."</p>
                    </td>
                    <td style='text-align: center; padding-top: 9%'>
                        <h5>$ ". $r[3] ."</h5>
                        <p>Unit: ". $qtd ."</p>
                    </td>
                </tr>
            ");
        }
    }
    echo "
            </table>
        </div>
        <hr>
    ";
    echo "<h3>Total: $total</h3>";
?>
    <form action="" method="post">
        <div class="form-group">
            <label for="address">Adress</label>
            <input type="text" class="form-control" id="address" placeholder="" name="address">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <select id="state" class="form-control" name="state">
                <option selected>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="zip">ZIP</label>
                <input type="text" class="form-control" id="zip" name="zip">
            </div>
        </div>
        <button type="submit" class="btn btn-success" style='min-width: 100px'>SAVE</button>
    </form>
    <hr>
    <h3>Payment</h3>
</div>
<br>

<?php include_once "./partials/FOOT.php"; ?>