<?php
	if(!isset($_POST["submit"])){
		header("location:admin.php?erreur=1");
		die();
	}
	$login=$_POST['login'];
	$password=$_POST['password'];
	include('DAO.php');
	$dao=new DAO();
	if($dao->authentificationUser($login,$password)){
		session_start();
		$_SESSION['login']=$login;
		header("location:listeProd.php");
		die();	
	}else{
		header("location:admin.php?erreur=2");
		die();
	}

?>