<?PHP

include '../config.php';
$ref=$_GET['title'];
        
		$req="DELETE FROM testimonial WHERE `title`='".$ref."'";
 $db = config::getConnexion();
        try{
        $liste=$db->query($req);
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }  
		header('Location: UpdateTestimonial.php');

		//echo"<script>alert('saved succesffuly')</script>";



        
?>