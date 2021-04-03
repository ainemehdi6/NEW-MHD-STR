<html>
<head>
<meta charset="utf-8">
<title>MEHDI STORE</title>
<link rel="shortcut icon"  href="images/logo.jpg">
<link rel="stylesheet" type="text/css" href="subStyle.css">
</head>
    <body>
        <div id="overlay" class="overlay">
            <div class="popup">
                <?php
                    if(isset($_GET['request'])){
                        if($_GET['request'] == '1'){
                            echo "<h5>Your Subscription was successful</h5>";
                            echo "<p>Thanks for your Subscription</p>"; 
                        }
                        if($_GET['request'] == '2'){
                            echo "<h3>ERROR</h3>";
                            echo "<p>Your Subscription has not been completed. Please retry again or contact our Support.</p>";
                        }
                    }
                ?>
                <a href="index.php" class="home-btn">Returne home</a>
            </div>
        </div>
        
       
    </body>
</html>