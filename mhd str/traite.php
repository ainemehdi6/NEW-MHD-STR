<?php

$ref=$_POST["prod_ref"];
$name=$_POST["prod_name"];
$categ=$_POST["prod_categ"];
$price=$_POST["prod_price"];
$stock=$_POST["prod_qte"];
$fact=$_POST["prod_fact"];
$details=$_POST["prod_details"];

$main_img=$_FILES["prod_main_img"]["tmp_name"];
$dest="images/".$ref.".png";
move_uploaded_file($main_img,$dest);
$sec_img=$_FILES['prod_sec_img']['tmp_name'];
$dest1="images/".$ref."1.jpg";
move_uploaded_file($sec_img,$dest1);
$sec_img=$_FILES['prod_th_img']['tmp_name'];
$dest2="images/".$ref."2.jpg";
move_uploaded_file($sec_img,$dest2);


include("DAO.php");
$dao=new DAO();
	$dao->AddProd($ref,$categ,$name,$price,$stock,$details,$fact,$dest);
	$dao->AddProdImgs($ref,$dest1,$dest2);
    header("location:listeProd.php");
?>