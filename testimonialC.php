<?php
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Entities/testimonial.php";
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/config.php";

class TestimonialC {


	function addTestimonial($testimonial){
		$sql="insert into testimonial values ('$this->title','$this->releaseDate','$this->message','$this->image')";
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

	public static function getAllTestimonials(){
		$sql="select * from testimonial";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function deleteTestimonial($title){
		$sql="DELETE FROM testimonial where title= :title";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':title',$title);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function updateTestimonial($releaseDate,$message,$image)
	{
		if (isset($_POST['title'])){
		$req="UPDATE testimonial SET releaseDate=:releaseDate,message=:message, image=image WHERE title=:title";
        $db=config::getConnexion();
        $sql= $db->prepare($req);
		$sql->bindParam(':releaseDate',$releaseDate);
        $sql->bindParam(':message',$message);
        $sql->bindParam(':image',$image);
        $sql->bindParam(':NomOffre',$NomOffre);
        $sql->execute();
	}
	}

	}
?>