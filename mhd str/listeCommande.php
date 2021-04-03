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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
</head>
<body>
<div>
<nav role="navigation" class="primary-navigation">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="listeCommande.php">Liste des Commandes</a></li>
    <li><a href="listeProd.php">Liste des Produits</a></li>
    <li><a href="newProd.php">Nouveau Produit</a></li>
    <li><a href="logout.php">Log out</a></li>
  </ul>
</nav>
  <div class="card nvEtudiant">
  <div class="card-header  bg-primary text-white">Liste Commande</div>
  <div class="card-body">
  	<?php
	$liste=$dao->listeCommandes();
  	?>
	<table class="table">
		<thead>
			<th>Num Commande</th><th>date  commande</th><th>id client</th><th>Product name</th><th>Commande qte</th>
		</thead>
		<tbody>
			<?php
			foreach ($liste as $e) {
				echo "<tr><td>".$e[0]."</td><td>".$e[1]."</td><td>".$e[2]."</td><td>".$e[3]."</td><td>".$e[4]."</td></tr>";
			}

			?>
		</tbody>
	</table>
</div>
</div>
</div>
</body>
</html>