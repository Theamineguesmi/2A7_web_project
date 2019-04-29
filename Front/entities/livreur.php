<?PHP
class livreur{
	private $id_livreur;
	private $nom;
	private $prenom;
	private $disponibilite;
	function __construct($id_livreur,$nom,$prenom,$disponibilite){
		$this->id_livreur=$id_livreur;
		$this->nom=$nom;
		$this->prenom=$prenom;		
		$this->disponibilite=$disponibilite;


	}
	
	function getid_livreur(){
		return $this->id_livreur;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getdisponibilite(){
		return $this->disponibilite;
	}
	
	function setnom($nom){
		$this->nom=$nom;
	}
	
	function setprenom($prenom){
		$this->prenom;
	}
	function setdisponibilite($disponibilite){
		$this->disponibilite=$disponibilite;
	}
	
}

?>