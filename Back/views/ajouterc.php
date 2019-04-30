<?PHP
include "carteC.php";

if (isset($_GET['idClient'])){
	$carteC=new carteC();
    $result=$carteC->recuperercommande($_GET['idClient']);
	foreach($result as $row){
		$email=$row['email'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$idClient=$row['idClient'];
		$pointt=$row['montantcommande'];
}
$carte1=new carte($idClient,$email,$nom,$prenom,$pointt);

$carte1C=new carteC();
$carte1C->ajoutercarte($carte1);


      header('Location: affichercommandes2.php');
}
?>