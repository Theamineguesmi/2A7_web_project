<?php

include '../Entities/pub.php';
include '../Cores/pubC.php';

if ((isset($_POST['URLpub']))) 
{
     $urlpub=$_POST['URLpub'];
	 $imgpub=$_FILES['image']['name'];
	 $pub=new pub($imgpub,$urlpub); 
	 $pub->addpub();
	 header('Location: updatePub.php');

}

?>