<?php
class Testimonial{

	private $title;
	private $releaseDate;
	private $message;
	private $image;

	//constructor

	function __construct($title, $releaseDate, $message, $image){
		$this->title=$title;
		$this->releaseDate=$releaseDate;
		$this->message=$message;
		$this->image=$image;
	}

	//getters

	function getTitle(){
		return $this->title;
	}

	function getreleaseDate(){
		return $this->releaseDate;
	}

	function getMessage(){
		return $this->message;
	}

	function getImage(){
		return $this->image;
	}

	//setters

	function setTitle($title){
		$this->title=$title;
	}

	function setreleaseDate($date){
		$this->releaseDatedate=$releaseDatedate;
	}

	function setMessage($message){
		$this->message=$message;
	}

	function setImage($image){
		$this->image=$image;
	}

	function addTestimonial(){
		$sql="insert into testimonial values ('$this->title','$this->releaseDate','$this->message','$this->image')";
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