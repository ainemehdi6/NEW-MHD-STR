<?php
$ftn=$_POST['ft_name'];
$ltn=$_POST['lt_name'];
$c=$_POST['country'];
$ad=$_POST['address'];
$st=$_POST['state'];
$ci=$_POST['city'];
$zip=$_POST['zip'];
$ph=$_POST['phone'];
$em=$_POST['email'];
$log=$_POST['login'];
$pass=$_POST['password'];


require('DAO.php');
$dao=new DAO();
$dao->AddClient($log,$ftn,$ltn,$c,$ad,$st,$ci,$zip,$ph,$em,$log,$pass);
header("location:login.php?erreur=1");





?>    