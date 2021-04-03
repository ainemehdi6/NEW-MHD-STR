<?php
class DAO{
	public function __construct(){}
	public function connexion(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=mhdstr','root','20192020');
		return $pdo;
	}
	public function authentificationUser($login,$password){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from Users where login= ? and password = ?");
   		$reponse->execute([$login,$password]);
   		if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
	public function User($login){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from Users where login= ?");
   		$reponse->execute([$login]);
   		if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
	public function authentificationClient($login,$password){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from Client where login= ? and password = ?");
   		$reponse->execute([$login,$password]);
   		if ($ligne=$reponse->fetch()) return true;
   		else return false;
	}
	public function AddClient($id,$ftn,$ltn,$c,$ad,$st,$ci,$zip,$ph,$em,$log,$pass){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into Client values(?,?,?,?,?,?,?,?,?,?,?,?)");
   		$reponse->execute([$id,$ftn,$ltn,$c,$ad,$st,$ci,$zip,$ph,$em,$log,$pass]);
   		$reponse->closeCursor();  
	}
	public function AddProd($ref,$categ,$name,$price,$stock,$details,$fact,$img){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into products values(?,?,?,?,?,?,?,?)");
   		$reponse->execute([$ref,$categ,$name,$price,$stock,$details,$fact,$img]);
   		$reponse->closeCursor();  
	}
	public function AddProdImgs($ref,$img1,$img2){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into images values(?,?,?)");
   		$reponse->execute([$ref,$img1,$img2]);
   		$reponse->closeCursor();  
	}
	public function AddCommande($dateCmd,$idclient){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into commande(date_cmd,id_client) values(?,?)");
   		$reponse->execute([$dateCmd,$idclient]);
   		$reponse->closeCursor();  
		return true;
	}
	public function listeClients(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from Client");
   		$reponse->execute();
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function listeInfoClient($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from Client where id_client= ?");
   		$reponse->execute([$id]);
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],
					$ligne[7],$ligne[8],$ligne[9],$ligne[10],$ligne[11]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function listeProd($categorie){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from products where prod_categ= ?");
		$reponse->execute($categorie);
		$lst=[];
   		while($ligne=$reponse->fetch()){
			$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function listeCommandes(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT commande.num_cmd,commande.date_cmd,commande.id_client,
		products.prod_name,contient.qte from commande inner join contient inner join products
		 where commande.num_cmd=contient.num_cmd and contient.prod_ref=products.prod_ref;");
   		$reponse->execute();
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function listeCategories(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT DISTINCT prod_categ from products");
   		$reponse->execute();
   		$lst=[];
   		while($ligne=$reponse->fetch()){
  	  		$lst[]=[$ligne[0]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function afficheProd($ref){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from products where prod_ref= ?");
		$reponse->execute([$ref]);
		$lst=[];
   		while($ligne=$reponse->fetch()){
			$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function afficheProdImgs($ref){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT image1,image2 from images where prod_ref= ?");
		$reponse->execute([$ref]);
		$lst=[];
   		while($ligne=$reponse->fetch()){
			$lst[]=[$ligne[0],$ligne[1]];
  		}
   		$reponse->closeCursor();  
   		return $lst;
	}
	public function Command($ref,$qte){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into contient(prod_ref,qte) values(?,?)");
   		$reponse->execute([$ref,$qte]);
   		$reponse->closeCursor(); 
		return true;
	}
	public function DeleteProd($ref){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from Products where prod_ref= ?");
   		$reponse->execute([$ref]);
		$reponse->closeCursor();
	}
	public function DeleteProdImgs($ref){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from images where prod_ref= ?");
   		$reponse->execute([$ref]);
		$reponse->closeCursor();
	}
	public function DeleteUser($idUser){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from users where iduser= ?");
   		$reponse->execute([$idUser]);
		$reponse->closeCursor();
	}
	public function AddSub($email){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into clients_subs(emailSubs) values(?)");
   		$reponse->execute([$email]);
   		$reponse->closeCursor();  
		return true;
	}
	public function imageResize($imageSrc,$imageWidth,$imageHeight) {

		$newImageWidth =500;
		$newImageHeight =500;
	
		$newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
		imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
	
		return $newImageLayer;
	}
}
?>