<?PHP
include "../../entities/SAV.php";
include "../../core/SAVC.php";

if (isset($_POST['id_rec']) and isset($_POST['sujet']) and  isset($_POST['description'])){
	
	
	
	
$SAV1=new SAV($_POST['id_rec'],$_POST['sujet'],$_POST['description']);

//Partie2
/*
var_dump($SAV1);
}
*/
//Partie3
$SAV1C=new SAVC();
$SAV1C->ajouterSAV($SAV1);
header('Location: index.html');



}else{
	echo "vérifier les champs";
}
//*/

?>