<?PHP
include "clientC.php";
$clientC=new clientC();
if (isset($_POST["email"])){
	$clientC->deleteclient($_POST["email"]);
	header('Location: afficherclient.php');
}

?>