<?PHP
class panier{
	private $id_produit;
	private $image;
	private $quantite;
	private $prix;
	private $couleur;

	function __construct($id_produit,$quantite,$prix,$couleur){
		$this->id_produit=$id_produit;
		$this->quantite=$quantite;
		$this->prix=$prix;
		$this->couleur=$couleur;
		$this->image=$image;
	}
	
	function getid_produit(){
		return $this->id_produit;
	}
	function getquantite(){
		return $this->quantite;
	}
	function getprix(){
		return $this->prix;
	}
	function getcouleur(){
		return $this->couleur;
	}
	function getimage(){
		return $this->image;
	}

	
    function setquantite($quantite){
		$this->quantite=$quantite;
	}
	    function setcouleur($couleur){
		$this->couleur=$couleur;
	}	
	
}

?>
