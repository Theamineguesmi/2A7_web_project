<?PHP
include "../config.php";
class panierP {
function afficherpanier ($panier){
		echo "id_produit: ".$panier->getid_produit()."<br>";
		echo "image: ".$panier->getimage()."<br>";
		echo "prix: ".$panier->getprix()."<br>";
		echo "quantite: ".$panier->getquantite()."<br>";
		echo "couleur: ".$panier->getcouleur()."<br>";
		
	}
	
	function ajouterpanier($panier){
		$sql = "insert INTO `panier` (id_produit,image,prix,quantite,couleur) VALUES (:id_produit, :image,:prix,:quantite,:couleur)";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_produit',$panier->getid_produit());
		$req->bindValue(':image',$panier->getimage());
		$req->bindValue(':prix',$panier->getprix());
		$req->bindValue(':quantite',$panier->getquantite());
		$req->bindValue(':couleur',$panier->getcouleur());
		try{
		$req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		
	}
	
	function afficherpaniers(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.= a.imageP";
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerpanier($id_produit){
		$sql="DELETE FROM panier where id_produit= :id_produit";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_produit',$id_produit);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}  
	function modifierpanier($panier,$idP){
		$sql="UPDATE panier SET id_produit=:id_produitn, quantite=:quantite, couleur=:couleur WHERE id_produit=:id_produit";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
        $id_produit=$panier->getid_produit();
        $image=$panier->getimage();
        $prix=$panier->getprix();
        $quantite=$panier->getquantite();
        $couleur=$panier->getcouleur();
		$datas = array(':id_produitn'=>$id_produitn, ':id_produit'=>$id_produit,':image'=>$image, ':prix'=>$prix,':quantite'=>$quantite, ':couleur'=>$couleur);
		$req->bindValue(':id_produitn',$id_produitn);
		$req->bindValue(':id_produit',$id_produit);
		$req->bindValue(':image',$image);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':couleur',$couleur);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererpanier($id_produit){
		$sql="SELECT * from panier where id_produit=$id_produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListepanier($id_produit){
		$sql="SELECT * from panier where id_produit=$id_produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>