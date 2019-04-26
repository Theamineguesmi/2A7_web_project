<?php

include '../Entities/blog.php';
include '../Cores/blogC.php';

if ((isset($_POST['blogTitle'])) and (isset($_POST['blogDate'])) and (isset($_POST['blogMessage']))) 
{
     $titleb=$_POST['blogTitle'];
	 $releasedDateb=$_POST['blogDate'];
	 $paragraph=$_POST['blogMessage'];
	 $imgb=$_FILES['image']['name'];
	 $blog=new blog($titleb, $paragraph,$imgb, $releasedDateb); 
	 $blog->addblog();
	 header('Location: Updatead.php');

}

?>