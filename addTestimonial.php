<?php

include '../Entities/testimonial.php';
include '../Cores/testimonialC.php';

if ((isset($_POST['testimonialTitle'])) and (isset($_POST['testimonialDate'])) and (isset($_POST['testimonialMessage']))) 
{
     $title=$_POST['testimonialTitle'];
	 $releaseDate=$_POST['testimonialDate'];
	 $message=$_POST['testimonialMessage'];
	 $image=$_FILES['image']['name'];
	 $Testimonial=new Testimonial($title, $releaseDate, $message, $image); 
	 $Testimonial->addTestimonial();
	 header('Location: UpdateTestimonial.php');

}

?>