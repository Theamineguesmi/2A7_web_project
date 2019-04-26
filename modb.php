<?PHP
include "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Entities/blog.php";
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Cores/blogC.php";
include_once "../config.php";


$titleb=$_GET['titleb'];
$releasedDateb=$_GET['releasedDateb'];
$paragraph=$_GET['paragraph'];
$imgb=$_GET['imgb'];    
    $sql="UPDATE blog SET releasedDateb=:releasedDateb,paragraph=:paragraph,imgb=:imgb  WHERE titleb=:titleb"; 
        $db = config::getConnexion();
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{        
        $req=$db->prepare($sql);
        $req->bindValue(':releasedDateb',$releasedDateb);
        $req->bindValue(':paragraph',$paragraph);
        $req->bindValue(':imgb',$imgb);
        $req->bindValue(':titleb',$titleb);

        $s=$req->execute(); 
       header('Location: updatead.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
?>