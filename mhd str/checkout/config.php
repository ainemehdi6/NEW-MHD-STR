<?php

Include('../DAO.php');

session_start();
$login=$_SESSION['login'];
$ref=$_POST['ref'];
$qte = $_POST['qte'];
$date = date('Y-m-d H:i:s');

$dao = new DAO();
?>
<html>
<head>
<meta charset="utf-8">
<title>MEHDI STORE</title>
<link rel="shortcut icon"  href="../images/logo.jpg">
<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="https://kit.fontawesome.com/70a642cd7c.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<script type="text/javascript" src="/java/main.js"></script>

</head>
    <body>
        <div id="overlay" class="overlay">
            <div class="popup">
                <?php
                    if($dao->AddCommande($date,$login) and $dao->Command($ref,$qte)){
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

