<?PHP
include "../config.php";
class commandeC {
function affichercommande ($commande){
		
		echo "id_client: ".$commande->getid_client()."<br>";
		echo "total: ".$commande->gettotal()."<br>";		
	}
	
	function ajoutercommande($commande){
		$sql = "insert INTO `commande` (id_client,total) VALUES (:id_client,:total)";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_client',$commande->getid_client());
		$req->bindValue(':total',$commande->gettotal());
		try{
		$req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		
	}
	
	function affichercommandes(){
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercommande($id){
		$sql="DELETE FROM commande where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercommande($commande,$id){
		$sql="UPDATE commande SET id=:idn, id_client=:id_client, total=:total WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
        $idn=$commande->getid();
        $id_client=$commande->getid_client();
        $total=$commande->gettotal();
		$datas = array(':idn'=>$idn,':id'=>$id, ':id_client'=>$id_client,':total'=>$total);
		$req->bindValue(':idn',$idn);
		$req->bindValue(':id',$id);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':total',$total);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercommande($id){
		$sql="SELECT * from commande where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListecommande($idP){
		$sql="SELECT * from commande where id=$id";
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