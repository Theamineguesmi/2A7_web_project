<?php
include "../config.php";
$db=config::getConnexion();
if (isset($_GET['del'])) {
	$idP = $_GET['del'];
	$emps=$db->query("DELETE FROM produit WHERE idP=$idP");
	
	header('location: tables-produits.php');
}
