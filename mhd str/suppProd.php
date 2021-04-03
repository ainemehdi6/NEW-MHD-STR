<?php
	$ref=$_GET['ref'];
	include("DAO.php");
	$dao=new DAO();
	$dao->DeleteProdImgs($ref);
	$dao->DeleteProd($ref);
	$imgs=$dao->afficheProdImgs($ref);
	foreach($imgs as $m){
		wp_delete_post($m[0]);
		wp_delete_post($m[1]);
	}
	header("location:listeProd.php");
?>