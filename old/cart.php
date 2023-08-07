<?php
    include_once "partials/HEAD.php";
    include_once "includes/db.php";

?>

<div class="container" style="margin-top: 80px">
    <h2>Cart</h2>
    <hr>
    <div class="table-responsive">
        <table class='table table-bordered'>
        
    <?php
        if(isset($_SESSION['carrinho'])){

            $produtos = $_SESSION['carrinho'];

            foreach($produtos as $key => $value){
                $id = $key;
                $qtd = $value['quantidade'];
                $tam = $value['tamanho'];

                $r = produto($id);

                foreach($r as $r){
                    $img = explode(',',  $r[1]);
                    echo ("
                        <tr>
                            <td style='text-align: center;'>
                                <img src='../public/img/". $img[0] ."' alt='foto' style='width: 8rem;'>
                                <p>". $r[2] ."<br>Size ". $tam ."</p>
                            </td>
                            <td style='text-align: center; padding-top: 9%'>
                                <h5>$ ". $r[3] ."</h5>
                                <p>Unit: ". $qtd ."</p>
                            </td>
                            <td style='text-align: center; padding-top: 9%'>
                                <a href='../config/apagaProduto.php?". $r[0] ."'><button class='btn btn-danger'>Remove</button></a>
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
        }else {
            echo "<br><h5>Cart is empty :(</h5><br>";
        }
    ?>
<br>
<a href='./shopping.php'><button class='btn btn-primary'>Check Out</button></a>
</div>
<br><br>

<?php include_once "partials/FOOT.php" ?>