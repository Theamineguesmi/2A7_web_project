<?PHP
include "../../config.php";
class livreurC {
function afficherlivreur ($livreur){
		echo "id_livreur: ".$livreur->getid_livreur()."<br>";
		echo "nom: ".$livreur->getnom()."<br>";
		echo "Prénom: ".$livreur->getprenom()."<br>";
		echo "disponibilite: ".$livreur->getdisponibilite()."<br>";
		

	}

	function ajouterlivreur($livreur){
		$sql="insert into livreur (id_livreur,nom,prenom,disponibilite) values (:id_livreur, :nom,:prenom,:disponibilite)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_livreur=$livreur->getid_livreur();
        $nom=$livreur->getnom();
        $prenom=$livreur->getprenom();
        $disponibilite=$livreur->getdisponibilite();
		
		$req->bindValue(':id_livreur',$id_livreur);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':disponibilite',$disponibilite);
		

            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivreurs(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.id_livreur= a.id_livreur";
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivreur($id_livreur){
		$sql="DELETE FROM livreur where id_livreur= :id_livreur";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_livreur',$id_livreur);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivreur($livreur,$id_livreur){
		$sql="UPDATE livreur SET id_livreur=:id_livreurn, nom=:nom,prenom=:prenom,disponibilite=:disponibilite WHERE id_livreur=:id_livreur";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_livreurn=$livreur->getid_livreur();
        $nom=$livreur->getnom();
        $prenom=$livreur->getprenom();
        $disponibilite=$livreur->getdisponibilite();
		
		$datas = array(':id_livreurn'=>$id_livreurn, ':id_livreur'=>$id_livreur, ':nom'=>$nom,':prenom'=>$prenom,':disponibilite'=>$disponibilite);
		$req->bindValue(':id_livreurn',$id_livreurn);
		$req->bindValue(':id_livreur',$id_livreur);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':disponibilite',$disponibilite);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivreur($id_livreur){
		$sql="SELECT * from livreur where id_livreur=$id_livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivreurs($tarif){
		$sql="SELECT * from livreur where mail=$tarif";
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