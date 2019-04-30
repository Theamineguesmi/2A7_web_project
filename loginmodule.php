<!Doctype html>
<html>
<head><title>LoginModule to create a session</title>
</head>
<body>
<?php
//create a connection with session database in MYSQLi

$conn=mysqli_connect("localhost","root","root","test");
if(!$conn)
{
	die("error in establishing the connection :". mysqli_connect_error());
}
//check the user
if(isset($_POST['login']))
{
	//removing special charachter from username and password field of Login form in order to free from sql injection 
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	
	$sql="select * from login where username='".$username."' AND password='".$password."'";
	
	$run_query=mysqli_query($conn,$sql);
	//check user
	if((mysqli_num_rows($run_query))>0)
	{
		//create a session
        session_start();
		//store the username in SESSION global variable
		$_SESSION['user_name']=$username;
		
		$session=$_SESSION['user_name'];
		
		//redirect to HOME page
echo "<script type='text/javascript'>window.location.href = 'tables-data.php';</script>";
        exit();
	}
	else
	   echo "wrong username or password";
	
}

?>
<!--php code ends-->
</body>
</html>