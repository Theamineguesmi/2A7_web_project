<?PHP
include "entities/panier.php";
include "core/panierP.php";

if (isset($_POST['id_produit']) and isset($_POST['image']) and isset($_POST['prix']) and isset($_POST['quantite']) and isset($_POST['couleur'])){
$panier1=new panier($_POST['id_produit'],$_POST['image'],$_POST['prix'],$_POST['quantite'],$_POST['couleur']);
$panierP1=new panierP();
$panierP1->ajouterpanier($panier1);
header('Location: cart.php');
    
}
else{
    echo "vérifier les champs";
}

?>