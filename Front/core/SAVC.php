<?PHP
include "../../config.php";
class SAVC {
function afficherSAV ($SAV){
		echo "id_rec: ".$SAV->getid_rec()."<br>";
		echo "sujet: ".$SAV->getsujet()."<br>";
		echo "Présujet: ".$SAV->getdescription()."<br>";
		

	}

	function ajouterSAV($SAV){
		$sql="insert into sav (id_rec,sujet,description) values (:id_rec,:sujet,:description)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_rec=$SAV->getid_rec();
        $sujet=$SAV->getsujet();
        $description=$SAV->getdescription();
        
		$req->bindValue(':id_rec',$id_rec);
		$req->bindValue(':sujet',$sujet);
		$req->bindValue(':description',$description);
		

            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherSAVs(){
		//$sql="SElECT * From SAV e inner join formationphp.SAV a on e.id_rec= a.id_rec";
		$sql="SElECT * From sav";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerSAV($id_rec){
		$sql="DELETE FROM sav where id_rec= :id_rec";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_rec',$id_rec);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierSAV($SAV,$id_rec){
		$sql="UPDATE sav SET id_rec=:id_rec, sujet=:sujet,description=:description WHERE id_rec=:id_rec";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_recn=$SAV->getid_rec();
        $sujet=$SAV->getsujet();
        $description=$SAV->getdescription();
        
		$datas = array(':id_rec'=>$id_rec, ':sujet'=>$sujet,':description'=>$description,':ville'=>$ville,':mail'=>$mail ,':postal'=>$postal);
		;
		$req->bindValue(':id_rec',$id_rec);
		$req->bindValue(':sujet',$sujet);
		$req->bindValue(':description',$description);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererSAV($id_rec){
		$sql="SELECT * from sav where id_rec=$id_rec";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeSAVs($tarif){
		$sql="SELECT * from sav where mail=$tarif";
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