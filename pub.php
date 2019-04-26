<?php
class pub{

	private $urlpub;
	private $imgpub;

	//constructor

	function __construct( $imgpub, $urlpub){

		$this->imgpub=$imgpub;
		$this->urlpub=$urlpub;
	}

	//getters



	function getUrlpub(){
		return $this->urlpub;
	}

	function getImgpub(){
		return $this->imgpub;
	}

	//setters



	function setUrlpub($urlpub){
		$this->urlpub=$urlpub;
	}

	function setImgpub($imgpub){
		$this->imgpub=$imgpub;
	}

	function addpub(){
		$sql="insert into pub values (NULL, '$this->urlpub','$this->imgpub')";
		echo "<script>console.log(<?php echo $sql ?>)</script>";
		try{
		$db =config::getConnexion();
		$db->exec($sql);
		echo "<script>console.log('created succesfully')</script>";
			}
			catch(PDOException $e){
			echo "<script>console.log(".$e->getMessage().")</script>";
			}
		
	}
}

?>