<?PHP
include "../config.php";
class produitC {
function afficherproduit ($produit){
		echo "imageP: ".$produit->getimageP()."<br>";
		echo "nomP: ".$produit->getnomP()."<br>";
		echo "descP: ".$produit->getdescP()."<br>";
		echo "qteP: ".$produit->getqteP()."<br>";
		echo "prixP: ".$produit->getprixP()."<br>";
		echo "categorieP: ".$produit->getcategorieP()."<br>";
		
	}
	
	function ajouterproduit($produit){
		$sql = "insert INTO `produit` (imageP,nomP,descP,qteP,prixP,categorieP) VALUES (:imageP,:nomP,:descP,:qteP,:prixP,:categorieP)";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':imageP',$produit->getimageP());
		$req->bindValue(':nomP',$produit->getnomP());
		$req->bindValue(':descP',$produit->getdescP());
		$req->bindValue(':qteP',$produit->getqteP());
		$req->bindValue(':prixP',$produit->getprixP());
		$req->bindValue(':categorieP',$produit->getcategorieP());
		try{
		$req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		
	}
	
	function afficherproduits(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.= a.imageP";
		$sql="SElECT * From produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerproduit($idP){
		$sql="DELETE FROM produit where idP= :idP";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idP',$idP);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierproduit($produit,$idP){
		$sql="UPDATE produit SET idP=:idPn, imageP=:imageP,nomP=:nomP,descP=:descP, qteP=:qteP,prixP=:prixP,categorieP=:categorieP WHERE idP=:idP";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
        $idPn=$produit->getidP();
        $imageP=$produit->getimageP();
        $nomP=$produit->getnomP();
        $descP=$produit->getdescP();
        $qteP=$produit->getqteP();
        $prixP=$produit->getprixP();
        $categorieP=$produit->getcategorieP();
		$datas = array(':idPn'=>$idPn, ':idP'=>$idP,':imageP'=>$imageP, ':nomP'=>$nomP,':descP'=>$descP, ':qteP'=>$qteP, ':prixP'=>$prixP,':categorieP'=>$categorieP);
		$req->bindValue(':idPn',$idPn);
		$req->bindValue(':idP',$idP);
		$req->bindValue(':imageP',$imageP);
		$req->bindValue(':nomP',$nomP);
		$req->bindValue(':descP',$descP);
		$req->bindValue(':qteP',$qteP);
		$req->bindValue(':prixP',$prixP);
		$req->bindValue(':categorieP',$categorieP);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererproduit($idP){
		$sql="SELECT * from produit where idP=$idP";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeproduit($idP){
		$sql="SELECT * from produit where idP=$idP";
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