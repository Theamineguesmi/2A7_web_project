<?php
incude "../../config.php";

class commande
{
	var $id;
	var $id_client;
	var $total;

	function __construct($id_client="1",$total)
	{

		$this->total=$total;
		$this->id_client=$id_client;

	}

	function get_id()
	{
		return $id;
	}

	function get_idclient()
	{
		return $id_client;
	}

	function get_total()
	{
		return $total;
	}

	function set_id($id)
	{
		$this->id=$id;
	}

	function set_idclient($id_client)
	{
		return $this->id_client=$id_client;
	}

	function set_total($total)
	{
		return $this->total=$total;
	}



	public static function afficher()
	{
		$sql="SELECT * FROM command C INNER JOIN client Cl ON C.id_client = Cl.id";
		$db =config::getconnexion();
		try
		{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(execption $e)
		{
			die('erreur lors de l\'affichage des commandes'); 
		}
	}

	function ajouter()
	{

		$sql="insert into command (id_client,total) values (:id_client,:total)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		$req->bindValue(':id_client',$this->id_client); 
		$req->bindValue(':total',$this->total); 
        $req->execute();
           
        }
        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
		

	}

	function modifier($id_commande)
	{
		$sql="UPDATE command_list SET id_produit=:id_produit, quantite=:quantite WHERE id_commande=:id_commande";
		
		$db = config::getConnexion();
		try{		
		        $req=$db->prepare($sql);

		        $total=$prix*$qte;
				$req->bindValue(':id_produit',$this->id_produit);
				$req->bindValue(':quantite',$this->quantite);
				$req->bindValue(':id_commande',$id_commande);
				$req->execute();
					
		    }

        catch (Exception $e)
        	{
            	echo " Erreur ! ".$e->getMessage();
       		}
	}

	public static function supprimer($id)
	{

		$req="DELETE FROM command WHERE id=:id";
		$db =config::getconnexion();
		$req->bindValue(':id',$id);
		$req->execute();
	}

	public static function supprimerListe($id_command)
	{

		$req="DELETE FROM command WHERE id_commande=:id_commande";
		$db =config::getconnexion();
		$req->bindValue(':id_commande',$id_commande);
		$req->execute();
	}

}

?>