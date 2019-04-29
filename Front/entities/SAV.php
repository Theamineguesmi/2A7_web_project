<?PHP
class SAV{
	private $id_rec;
	private $sujet;
	private $description;
	
	function __construct($sujet,$description){
		$this->sujet=$sujet;
		$this->description=$description;
		

	}
	
	function getid_rec(){
		return $this->id_rec;
	}
	function getsujet(){
		return $this->sujet;
	}
	function getdescription(){
		return $this->description;
	}
	
	function setsujet($sujet){
		$this->sujet=$sujet;
	}
	function setdescription($description){
		$this->description=$description;
	}
	
	
}

?>

