<?PHP
include "../../config.php";
class livraisonC {
function afficherlivraison ($livraison){
		echo "cin: ".$livraison->getcin()."<br>";
		echo "nom: ".$livraison->getnom()."<br>";
		echo "Prénom: ".$livraison->getprenom()."<br>";
		echo "date fin: ".$livraison->getmail()."<br>";
		echo "ville: ".$livraison->getville()."<br>";
		echo "postal: ".$livraison->getpostal()."<br>";

	}

	function ajouterlivraison($livraison){
		$sql="insert into livraison (cin,nom,prenom,ville,mail,postal) values (:cin, :nom,:prenom,:ville,:mail,:postal)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $cin=$livraison->getcin();
        $nom=$livraison->getnom();
        $prenom=$livraison->getprenom();
        $ville=$livraison->getville();
		$mail=$livraison->getmail();
		$postal=$livraison->getpostal();
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':postal',$postal);

            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.cin= a.cin";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivraison($cin){
		$sql="DELETE FROM livraison where cin= :cin";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivraison($livraison,$cin){
		$sql="UPDATE livraison SET cin=:cinn, nom=:nom,prenom=:prenom,ville=:ville,mail=:mail,postal=:postal WHERE cin=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$cinn=$livraison->getcin();
        $nom=$livraison->getnom();
        $prenom=$livraison->getprenom();
        $ville=$livraison->getville();
		$mail=$livraison->getmail();
		$postal=$livraison->getpostal();
		$datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':ville'=>$ville,':mail'=>$mail ,':postal'=>$postal);
		$req->bindValue(':cinn',$cinn);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':postal',$postal);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivraison($cin){
		$sql="SELECT * from livraison where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivraisons($tarif){
		$sql="SELECT * from livraison where mail=$tarif";
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