<?php
include_once "../config.php";


class clientC

{	function recupererclient($id)
	{
   		$sql="SELECT * from clients where idC=$id";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function mailcommande($mail,$somme,$date)
	{
		$msg="Votre commande chez Makhla est bien passé le ".$date."\nSomme de la commande : ".$somme." DT\n. Elle est en cours de traitemetn. Merci d'avoir choisi nos produits.";
		$msg=wordwrap($msg,70);
		mail($mail, $msg, $msg);
	}
}