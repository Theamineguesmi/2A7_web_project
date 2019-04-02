<?php
class command_list
{	
	var $id;
	var $id_produit;
	var $id_commande;
	var $quantite;

	function __construct($id_produit,$id_commande,$quantite)
	{

		$this->id_produit=$id_produit;
		$this->id_commande=$id_commande;
		$this->quantite=$quantite;

	}

	function get_idproduit()
	{
		return $id_produit;
	}

	function get_idcommande()
	{
		return $id_commande;
	}

	function get_quantite()
	{
		return $quantite;
	}

	function set_id($id)
	{
		$this->id=$id;
	}

	function set_idproduit($id_produit)
	{
		$this->id_produit=$id_produit;
	}

	function set_idcommande($id_commande)
	{
		return $this->id_client=$id_client;
	}

	function set_quantite($quantite)
	{
		return $this->quantite=$quantite;
	}


	public static function afficher()
	{
		$sql="SELECT * FROM command_list C INNER JOIN produit P ON C.id_produit = P.id ";
		$db =config::getconnexion();
		try
		{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(execption $e)
		{
			die('erreur lors de l\'affichage de la liste des commandes'); 
		}
	}

	function ajouter()
	{

		$sql="insert into command_list (id_produit,id_commande,quantite) values (:id_produit,:id_commande,:quantite)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		$req->bindValue(':id_produit',$this->id_produit); 
		$req->bindValue(':id_commande',$this->id_commande); 
		$req->bindValue(':quantite',$this->quantite); 
        $req->execute();
           
        }
        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
		

	}

	function modifier($id)
	{
		$sql="UPDATE command_ SET id_client=:id_client, total=:total WHERE id=:id";
		
		$db = config::getConnexion();
		try{		
		        $req=$db->prepare($sql);

		        $total=$prix*$qte;
				$req->bindValue(':id_client',$this->id_client);
				$req->bindValue(':total',$this->total);
				$req->bindValue(':id',$id);
				$req->execute();
					
		    }

        catch (Exception $e)
        	{
            	echo " Erreur ! ".$e->getMessage();
       		}
	}

	public static function supprimer($id)
	{

		$req="DELETE FROM commande WHERE id=:id";
		$db =config::getconnexion();
		$req->bindValue(':id',$id);
		$req->execute();
	}
}
?>