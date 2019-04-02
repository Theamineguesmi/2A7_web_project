<?PHP
class commande{
	private $id;
	private $id_client;
	private $total;
    
    function __construct($id,$id_client,$total)
    {
		$this->id=$id;
		$this->id_client=$id_client;
		$this->total=$total;
	}
	
	function getid(){
		return $this->id;
	}
	function getid_client(){
		return $this->id_client;
	}
	function gettotal(){
		return $this->total;
	}
	
    function setid_client($id_client){
		$this->id_client=$id_client;
	}
	function set_total($total){
		$this->total=$total;
	}
	
	
}

?>
