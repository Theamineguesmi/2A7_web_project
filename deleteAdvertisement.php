<?PHP

include '../config.php';
$ref=$_GET['titleb'];
        
		$req="DELETE FROM blog WHERE `titleb`='".$ref."'";
 $db = config::getConnexion();
        try{
        $liste=$db->query($req);
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }  
		header('Location: Updatead.php');

		//echo"<script>alert('saved succesffuly')</script>";



        
?>