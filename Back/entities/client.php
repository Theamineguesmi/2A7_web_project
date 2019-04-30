<?PHP
class client{
	private $nom;
	private $prenom;
	private $email;
	private $date;
	private $mdp;
	function __construct($nom,$prenom,$email,$date,$mdp){
	$this->nom=$nom;
	$this->prenom=$prenom;
	$this->email=$email;
	$this->date=$date;
	$this->mdp=$mdp;

	}
	
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getemail(){
		return $this->email;
	}
	function getdate(){
		return $this->date;
	}
	function getmdp(){
		return $this->mdp;
	}



	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->fprenom=$prenom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setdate($date){
		$this->date=$date;
	}
	function setmdp($mdp){
		$this->mdp=$mdp;
	}

	
}

?>