<?php
	$login=$_POST['login'];
	$password=$_POST['password'];
	require('DAO.php');
	$dao=new DAO();
	if($dao->authentificationClient($login,$password)){
		session_start();
		$_SESSION['login']=$login;
		header("location:index.php");
		die();	
	}else{
		header("location:login.php?erreur=2");
		die();
	}

?>