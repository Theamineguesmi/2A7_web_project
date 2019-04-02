<?php

include "../config.php";
 $id_client=$_POST['id_client'];
 $id = $_POST['ide'];
 $total=$_POST['total'];


$db=config::getConnexion();
$result=$db->prepare("UPDATE commande SET `id_client`='$id_client' , `total`='$total' WHERE `commande`.`id`='$id' ");
$result->execute();
header('location: tables-commande.php');


  ?>


