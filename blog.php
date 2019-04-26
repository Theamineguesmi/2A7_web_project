<?php
class blog{

	private $titleb;
	private $releasedDateb;
	private $paragraph;
	private $imgb;

	//constructor

	function __construct($titleb, $paragraph, $imgb, $releasedDateb){
		$this->titleb=$titleb;
		$this->paragraph=$paragraph;
		$this->releasedDateb=$releasedDateb;
		$this->imgb=$imgb;
	}

	//getters

	function getTitleb(){
		return $this->titleb;
	}

	function getreleasedDateb(){
		return $this->releasedDateb;
	}

	function getParagraph(){
		return $this->paragraph;
	}

	function getImgb(){
		return $this->imgb;
	}

	//setters

	function setTitleb($titleb){
		$this->titleb=$titleb;
	}

	function setreleasedDateb($releasedDateb){
		$this->releasedDateb=$releasedDateb;
	}

	function setParagraph($paragraph){
		$this->paragraph=$paragraph;
	}

	function setImgb($imgb){
		$this->imgb=$imgb;
	}

	function addblog(){
		$sql="insert into blog values ('$this->titleb','$this->paragraph','$this->imgb','$this->releasedDateb')";
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