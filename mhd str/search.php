<?php

$link = mysqli_connect('mysql:host=0.0.0.0;dbname=..','root','Password');
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_REQUEST["term"])){
    $sql = "SELECT * FROM products WHERE prod_name LIKE ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        $param_term = $_REQUEST["term"] . '%';

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<a href="product.php?ref='. $row["prod_ref"] .'"><img src="'.$row["prod_main_img"].'">';
                    echo "<p>" . $row["prod_name"] . "</p></a>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    mysqli_stmt_close($stmt);
}
 
mysqli_close($link);
?>