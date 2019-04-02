<?PHP
include "../../entities/livraison.php";
include "../../core/livraisonC.php";

if (isset($_POST['cin']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['ville']) and isset($_POST['mail'])){
$livraison1=new livraison($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['ville'],$_POST['mail'],$_POST['postal']);
//Partie2
/*
var_dump($livraison1);
}
*/
//Partie3
$livraison1C=new livraisonC();
$livraison1C->ajouterlivraison($livraison1);

	
}else{
	echo "vérifier les champs";
}
//*/

?>