<?PHP
include "carteC.php";

if (isset($_GET['email'])){
	$carteC=new carteC();
    $result=$carteC->recuperercarte($_GET['email']);
	foreach($result as $row){
		$email=$row['email'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$idClient=$row['id_client'];
}
$carte1=new carte($idClient,$email,$nom,$prenom,0);

$carte1C=new carteC();
$carte1C->ajoutercarte($carte1);


      header('Location: profile.php');
}
?>