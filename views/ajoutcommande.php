<?PHP
include "../entities/commande.php";
include "../core/commandeC.php";

if (isset($_POST['id_client']) and isset($_POST['total'])){
$commande1=new commande($_POST['id'],$_POST['id_client'],$_POST['total']);
$commandeC1=new commandeC();
$commandeC1->ajoutercommande($commande1);
header('Location: tables-commande.php');
	
}
else{
	echo "vérifier les champs";
}

?>