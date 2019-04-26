<?php
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Entities/pub.php";
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/config.php";

class pubC {

	function addpub($pub){
		$sql="insert into pub values ('$this->urlpub','$this->imgpub')";
		echo "<script>console.log(<?php echo $sql ?>)</script>";
		try{
		$db =config::getConnexion();
		$db->exec($sql);
		echo "<script>console.log('created succesfully')</script>";
			}
			catch(PDOException $e){
			echo "<script>console.log(".$e->getMessage().")</script>";
			}
		
	}

	public static function getAllpubs(){
		$sql="select * from pub";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function deletepub($IDpub){
		$sql="DELETE FROM pub where IDpub= :IDpub";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':IDpub',$IDpub);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function updatepub($urlpub,$imgpub)
	{
		if (isset($_POST['IDpub'])){
		$req="UPDATE pub SET urlpub=:urlpub, imgpub=:imgpub WHERE IDpub=:IDpub";
        $db=config::getConnexion();
        $sql= $db->prepare($req);
		$sql->bindParam(':urlpub',$urlpub);
        $sql->bindParam(':imgpub',$imgpub);
        $sql->bindParam(':IDpub',$IDpub);
        $sql->execute();
	}
	}
	}
?>