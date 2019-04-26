<?PHP

include '../config.php';
$ref=$_GET['IDpub'];
        
		$req="DELETE FROM pub WHERE `IDpub`='".$ref."'";
 $db = config::getConnexion();
        try{
        $liste=$db->query($req);
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }  
		header('Location: updatePub.php');

		//echo"<script>alert('saved succesffuly')</script>";



        
?>