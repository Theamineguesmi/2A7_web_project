<?PHP
class Admin{
	private $userName;
	private $Email;
	private $Password;
	
	function __construct($user,$email,$Password){
		$this->userName=$user;
		$this->Email=$email;
		$this->Password=$Password;
		
	}
	
	function getuserName(){
		return $this->userName;
	}
	function getEmail(){
		return $this->Email;
	}
	function getPassword(){
		return $this->Password;
	}
	

	function setuserName($nom){
		$this->userName=$nom;
	}
	function setEmail($email){
		$this->Email=$email;
	}
	function setPassword($Password){
		$this->Password=$Password;
	}
	
	
}

?>