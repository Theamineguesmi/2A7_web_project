<?PHP
include "../entities/produit.php";
include "../core/produitC.php";

if (isset($_POST['imageP']) and isset($_POST['nomP']) and isset($_POST['descP']) and isset($_POST['qteP']) and isset($_POST['prixP']) and isset($_POST['categorieP']) ){
$produit1=new produit($_POST['imageP'],$_POST['idP'],$_POST['nomP'],$_POST['descP'],$_POST['qteP'],$_POST['prixP'],$_POST['categorieP']);

$produit1C=new produitC();
$produit1C->ajouterproduit($produit1);
header('Location: tables-produits.php');
	
}
else{
	echo "vérifier les champs";
}

?>