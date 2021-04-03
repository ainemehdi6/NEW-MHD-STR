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
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div>
<nav role="navigation" class="primary-navigation">
  <ul>
    <li><a href="./index.php">Home</a></li>
    <li><a href="listeCommande.php">Liste des Commandes</a></li>
    <li><a href="listeProd.php">Liste des Produits</a></li>
    <li><a href="newProd.php">Nouveau Produit</a></li>
    <li><a href="logout.php">Log out</a></li>
  </ul>
</nav>
  <div class="card nvEtudiant">
  <div class="card-header  bg-primary text-white">Liste Products</div>
  <div class="card-body">
  	<?php
    $categ=$dao->listeCategories();
  	?>
	<table class="table">
		<thead>
			<th>Ref product</th><th>Categorie</th><th>Name</th><th>Price</th><th>Qte Stock</th><th>Image</th><th>Modification</th>
		</thead>
		<tbody>
			<?php
            foreach ($categ as $c){
            $liste=$dao->listeProd($c);
			foreach ($liste as $e) {
				echo "<tr><td>".$e[0]."</td><td>".$e[1]."</td><td>".$e[2]."</td><td>".$e[3]."</td><td>".$e[4]."
				</td><td><img width='100px' src='".$e[7]."'></td><td><td><a class='trash' 
				href='suppProd.php?ref=".$e[0]."'>SUPP</a></td></tr>";
			}
            }
			?>
		</tbody>
	</table>

	



  </div>

</div>


</div>
</body>
</html>