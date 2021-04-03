<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div>
  <div class="card login">
  <div class="card-header  bg-default">Admin Authentification</div>
  <div class="card-body">
  	
	<form action="adminConx.php" method="post" enctype="multipart/form-data". >
	  <div class="form-group">
	    <label for="login">Login :</label>
	    <input type="text" name="login" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label for="password">Password :</label>
	    <input type="password" name="password" class="form-control" required>
	  </div>
	  <div style="color:red">
	  	<?php
		    if(isset($_GET['erreur'])&&($_GET['erreur']==1)) echo "Please login first!!!";
	  		if(isset($_GET['erreur'])&&($_GET['erreur']==2)) echo "Login or Password invalid!!!";
	  	?>
	  </div>
	  <button type="reset" class="reset">Reset</button>
	  <button type="submit" name="submit" class="enregistrer">Connexion</button>
	</form>
  </div>

</div>


</div>
</body>