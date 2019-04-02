<?php

include "../config.php";
 $id_produit=$_POST['id_produit'];
 $image = $_POST['image'];
 $prix=$_POST['prix'];
 $quantite=$_POST['quantite'];
 $couleur=$_POST['couleur'];


$db=config::getConnexion();
$result=$db->prepare("UPDATE panier SET `couleur`='$couleur' , `quantite`='$quantite' WHERE `panier`.`id_produit`='$id_produit' ");
$result->execute();
header('location: tables-panier.php');


  ?>


