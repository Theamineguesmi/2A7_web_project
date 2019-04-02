<?PHP
class SAV{
	private $id_rec;
	private $sujet;
	private $description;
	
	function __construct($id_rec,$sujet,$description){
		$this->id_rec=$id_rec;
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

