<?php

include('checkout.php');
include('DAO.php');

session_start();
$login=$_SESSION['login'];
$ref=$_POST['ref'];
$qte = $_POST['qte'];
$date = date('Y-m-d H:i:s');

$dao = new DAO();
?>
<html>
    <body>
        <div id="overlay" class="overlay">
            <div class="popup">
                <?php
                    if($dao->AddCommande($date,$login) && $dao->Command($ref,$qte)){
                        echo "<h5>Thanks for your trust</h5><p>Your purchase was successful</p>"; 
                    }    
                    else{
                        echo "<h3>ERROR</h3>
                        <p>Your purchase has not been completed. Please contact our Support.</p>";
                    }
                ?>
                <a href="../index.php" class="home-btn">Returne home</a>
            </div>
        </div>
        
       
    </body>
</html>

