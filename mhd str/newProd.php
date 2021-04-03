<?php
session_start();
$login=$_SESSION['login'];
include("DAO.php");
$dao=new DAO();
if( !isset($_SESSION['login']) || !$dao->User($login) ){
	header("location:admin.php?erreur=1");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Nouveau Produit</title>
</head>
<body>
<div class="main">
<nav role="navigation" class="primary-navigation">
  <ul>
    <li><a href="./index.php">Home</a></li>
    <li><a href="listeCommande.php">Liste des Commandes</a></li>
    <li><a href="listeProduit.php">Liste des Produits</a></li>
    <li><a href="nouveauProduit.php">Nouveau Produit</a></li>
    <li><a href="logout.php">Log out</a></li>
  </ul>
</nav>
<div class="card nvProduit">
  <div class="card-header  bg-primary text-white">Nouveau Produit</div>
  <div class="card-body">
	<form action="traite.php" method="post" enctype="multipart/form-data">
	  <div class="form-group">
	    <label>Product Ref :</label>
	    <input type="text" name="prod_ref" class="form-control" required>
	  </div> 
	  <div class="form-group">
	    <label>Catégorie :</label>
	    <input type="text" name="prod_categ" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Product name :</label>
	    <input type="text" name="prod_name" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label>Product price :</label>
	    <input type="text" name="prod_price" class="form-control" required>
	  </div>
      <div class="form-group">
	    <label>Product stock :</label>
	    <input type="text" name="prod_qte" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Product details :</label>
		<textarea name="prod_details" id="prod_details" class="form-control" rows="6"></textarea>
	  </div>
	  <div class="form-group">
	    <label>Product facture :</label>
	    <input type="text" name="prod_fact" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Main image :</label>
        <div class="image-input">
	        <input type="file" name="prod_main_img" class="form-control" required >
        </div>
	  </div>
	  <div class="form-group">
	    <label>More images (2 min) :</label>
        <div class="image-input">
	        <input type="file" name="prod_sec_img" class="form-control" required >
			<input type="file" name="prod_th_img" class="form-control" required >
        </div>
	  </div>
	  <button type="reset" class="reset">Annuler</button>
	  <button type="submit" name="ajouter" class="enregistrer">Ajouter</button>
	</form>
</div>
</div>
</body>
</html>