<?php
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Entities/blog.php";
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/config.php";

class blogC {


	function addblog($blog){
		$sql="insert into blog values ('$this->titleb','$this->paragraph','$this->imgb','$this->releasedDateb')";
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

	public static function getAllblogs(){
		$sql="select * from blog";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function deleteblog($titleb){
		$sql="DELETE FROM blog where titleb= :titleb";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':titleb',$titleb);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function updateblog($releasedDateb,$paragraph,$imgb)
	{
		if (isset($_POST['titleb'])){
		$req="UPDATE blog SET paragraph=:paragraph, imgb=:imgb,releasedDateb=:releasedDateb WHERE titleb=:titleb";
        $db=config::getConnexion();
        $sql= $db->prepare($req);
		$sql->bindParam(':paragraph',$paragraph);
        $sql->bindParam(':imgb',$imgb);
        $sql->bindParam(':releasedDateb',$releasedDateb);
        $sql->bindParam(':titleb',$titleb);
        $sql->execute();
	}
	}
	}
?>