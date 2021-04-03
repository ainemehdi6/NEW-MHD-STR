<?php
$email = $_POST["email"];

include('DAO.php');
$dao= new DAO();


if($dao->AddSub($email)){
    header("Location: subPage.php?request=1");
    mysqli_close($link);
    exit;
}    
else{
    header("Location: subPage.php?request=2");
    mysqli_close($link);
    exit;
}
?>