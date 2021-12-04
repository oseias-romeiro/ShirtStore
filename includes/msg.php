<?php
    if(isset($_SESSION['msg'])){
        echo ('
            <div style="height: 55px"></div>
            <a href="../config/apagaMSG.php/?'. $_SERVER['PHP_SELF'] .'" style="text-decoration: none; color: black;">
                <div id="alertMSG" class="alert alert-success" role="alert" style="margin-bottom: -15px;">'. $_SESSION['msg'] . "</div>
            </a>
        ");
    }
?>
