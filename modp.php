<?PHP
include "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Entities/pub.php";
include_once "C:/wamp64/www/Makhla/sufee-admin-dashboard-master/Cores/pubC.php";
include_once "../config.php";


$IDpub=$_GET['IDpub'];
$urlpub=$_GET['urlpub'];
$imgpub=$_GET['imgpub'];    
    $sql="UPDATE pub SET urlpub=:urlpub,imgpub=:imgpub  WHERE IDpub=:IDpub"; 
        $db = config::getConnexion();
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{        
        $req=$db->prepare($sql);
        $req->bindValue(':urlpub',$urlpub);
        $req->bindValue(':imgpub',$imgpub);
        $req->bindValue(':IDpub',$IDpub);

        $s=$req->execute(); 
       header('Location: updatePub.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
?>