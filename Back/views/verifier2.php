<?PHP
include "C:/wamp64/www/projet_web/Back/entities/admin2.php";
include "C:/wamp64/www/projet_web/Back/core/Admin2C.php";

if (isset($_POST['Password']) and isset($_POST['Email']))
{
if (!empty($_POST['Password']) and !empty($_POST['Email']))
{$admin1C=new AdminC();
$email = $_POST['Email'];
$Password = $_POST['Password'];

$verif = $admin1C->recupererAdmin($email,$Password);
if ($verif)
{
		header('Location: historique2.php'); 
	echo "<script>alert(\"Connectez vous\")</script>";
}
		else
		{

					header('Location: session2.html'); 
						echo "<script> alert(\"vérifier les champs\")</script>";

		}

}
}

else
{


	echo "<script> alert(\"vérifier les champs\")</script>";
}


?>