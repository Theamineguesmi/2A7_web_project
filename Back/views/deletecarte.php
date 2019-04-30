<?PHP
include "carteC.php";
$carteC=new carteC();
if (isset($_POST["email"])){
	$carteC->deletecarte($_POST["email"]);
	header('Location: affichercarte.php');
}

?>