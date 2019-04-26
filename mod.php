<?PHP
include "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Entities/testimonial.php";
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Cores/testimonialC.php";
include_once "../config.php";


$title=$_GET['title'];
$releaseDate=$_GET['releaseDate'];
$message=$_GET['message'];
$image=$_GET['image'];    
    $sql="UPDATE testimonial SET releaseDate=:releaseDate,message=:message,image=:image  WHERE title=:title"; 
        $db = config::getConnexion();
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{        
        $req=$db->prepare($sql);
        $req->bindValue(':releaseDate',$releaseDate);
        $req->bindValue(':message',$message);
        $req->bindValue(':image',$image);
        $req->bindValue(':title',$title);

        $s=$req->execute(); 
       header('Location: updateTestimonial.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
?>