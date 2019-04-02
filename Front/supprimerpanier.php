<?PHP
include "core/panierP.php";
$panierP=new panierP();
if (isset($_POST["id_produit"])){
	$panierP->supprimerpanier($_POST["id_produit"]);
	header('Location: tables-panier.php');
}

?>