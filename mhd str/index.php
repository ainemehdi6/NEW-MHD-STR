<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>MEHDI STORE</title>
<link rel="shortcut icon"  href="images/logo.jpg">
<link rel="stylesheet" type="text/css" href="css/style1.css">
	<script src="https://kit.fontawesome.com/70a642cd7c.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="java/main.js"></script>
</head>
<body>
	<!--main-section-------------->
	<section class="main">
		<?php 
			include('main.php');
		?>
		<!--main-img------------------------->
		<div class="main-img">
		<img src="images/Gaming2.svg" alt=""/>	
		</div>	
		<!--main-text--------------------->
		<div class="main-text">
		<h1><font>Gamm</font>ing</h1>
		<h2>Collec<font>tion</font></h2>	
		<!--btn---->
		<a href="#" class="main-btn">Details</a>
		</div>				
	</section>
 	<!--product-------------------------------->
 	<?php
		include('DAO.php');
		session_start();
		$login=$_SESSION['login'];
		$dao=new DAO();
		$categ=$dao->listeCategories();
		foreach ($categ as $c){
			$liste=$dao->listeProd($c);
			echo"<section class='product'>
 			<!--heading-------------------->
 				<div class='p-heading'>
 					<h3>Gamming <font>".$c[0]."</font> Show Case</h3>	
 				</div>
				<div class='product-container'>"; 	
				foreach ($liste as $e)
            	{
					echo"
					<div class='p-box'>
						<img src='".$e[7]."' alt=''/>	
						<p>".$e[2]."</p>
						<a href='#' class='price'>$ ".$e[3]."</a>
						<a href='#' class='qte'><br>".$e[4]." (Available units)</a>";
						$_SESSION['login']=$login;echo"
						<a href='product.php?ref=".$e[0]."' class='buy-btn'>Details</a></div>";
				}
					echo"</div></section>";
		}
	?>
	<!--subscribe------------------->
	<section class="subscribe-container">
 		<!--heading---------->
 		<h3>Subscribe For New Product Notification</h3>
 		<!--input------------>
		<form class="subscribe-input" action="traite1.php" method="POST">
 			<input type="email" name="email" placeholder="Example@gmail.com" required/>
 			<!--btn-------------->
			<button type="submit" class="subscribe-btn">Submit</button>
		</form>
 	</section>
 	<!--footer----------------------------------->
 	<footer>
 		<h3>MHDSTR</h3>
 	</footer>
 	<!--copyright------------------>
 	<a href="#" class="copyright">Copyright 2020. MHDSTR By El Mehdi El Aine.</a>
</body>
</html>