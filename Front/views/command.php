<?php
   
  include_once "../entities/produit.php";
  include_once "../core/produitC.php";
  include_once "../core/commandeC.php";
  include_once "../entities/commande.php";

  include_once "../core/clientC.php";
  include_once "../entities/clients.php";

  require ('fpdf/fpdf.php');
session_start();
if(isset($_SESSION['id']))
{
  

  $produitC=new produitC();
  $produit1=$produitC->recupererpanier($_SESSION['id']);
  
  $tab=array();
  $somme=0;

  foreach ($produit1 as $row) 
  {
    array_push($tab,$row['prix']*$row['quantite']);
    $somme+=$row['prix']*$row['quantite'];
  }
  
  if(isset($_POST['validercommande']) && !empty($_POST['secteur']) )
  {
    $secteur=$_POST['secteur'];
    $dateactuelle = date("Y-m-d");

    $commande1C=new commandeC();
    $commande1= new commande($dateactuelle,$somme,'en cours',$secteur,5,$_SESSION['id']);
    $commande1C->ajoutercommande($commande1);

    $lastID=$commande1C->recupererdernierID();
    $max=$lastID->fetch();
    $max_row=$max["max"];
    

    $clientC=new clientC();
    $client1=$clientC->recupererclient($_SESSION['id']);
    $client=$client1->fetch();
    $mail=$client["Email"];
   

    //$clientC->mailcommande($mail,$somme,$dateactuelle);

    $produit1=$produitC->recupererpanier($_SESSION['id']);

    
    foreach($produit1 as $row)
    {
      $produit2=new produit($row["id"],$row["nom"],$row["prix"],$row["quantite"],"Test");
      $produitC->ajoutercontenupanier($produit2,$max_row,$_SESSION['id']);
    }
     header('Location: session2.html');;
  } 
?>


<!DOCTYPE html>
<html lang="en">
 <head>
    <title>Makhla</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Makhla</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
              </div>
            </li>
	          <li class="nav-item"><a href="wishlist.php" class="nav-link">Wishlist</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="session.html" class="nav-link">Administrateur</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart">
			  											     <?php
					          $produit=new produitC;
					          $count=$produit->countpanier($_SESSION['id']);
					          foreach($count as $row)
					            {
					              echo $row["cnt"];
					            }
                         ?>
</span>        </a></li>
 <div><?php if (isset($_SESSION['l']) && isset($_SESSION['p'])) 
{ 

     echo ' <b> '.$_SESSION['l'].'</b> <br>';  
    echo '<a href="./logout.php">Se Déconnecter</a>';

}?></div>
	        </ul>
          
	      </div>
	    </div>

	  </nav>
    <!-- END nav -->
		
		<div class="hero-wrap hero-bread" style="background-image: url('images/produit3.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread"><font color="white"><strong>My Cart</strong></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html"><font color="white"><strong>Home</strong></a></span> <span><a href="command.php"><font color="white"><strong>Shop</font></a></strong></font></span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th></th>
						      </tr>
                  
						    </thead>
						    <tbody>

				<?php
				    $c=intval($row["cnt"]);
				    if($c==0)
				     {
				?>
				<tr class="text-center">
				<h1>VIDE</h1>
				</tr>
				<?php  
				                             }
					 				if($c!=0)
			                                 {
									$produit=new produitC();
				                    $listeproduits=$produit->afficherproduits();
                                    foreach($listeproduits as $row){
                                    $id=$row['id'];
                                    $chemin="picproduct/produit".$id.".jpg"
				                        ?>
						      <tr class="text-center">
						        <td class="product-remove">
								<form method="POST" action="supprimerproduit.php">
								<button name="supprimer" class="btn btn-primary py-3 px-4"><span class="ion-ios-close"></span></button>
								        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
								</form>
								</td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(<?php echo $chemin; ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?PHP echo $row['nom']; ?></h3>
						        </td>
						        
						        <td class="price"><?PHP echo $row['prix']; ?></td>
						        	 <form method="POST" action="modifierproduit.php">
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantite" class="quantity form-control input-number" value="<?PHP echo $row['quantite']; ?>" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">
<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id"> 
							<button name="Modifier" class="btn btn-primary py-3 px-4">modifer</button>
								</td>
									 </form>
						      </tr><!-- END TR-->
							  						  <?PHP
				}}
?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
        <div class="row justify-content-end">
          <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
        <h5 class="m-text20 p-b-24">
         Total Chariot
        </h5>

        <!--  -->
        <div class="flex-w flex-sb-m p-b-12">
          <span class="s-text18 w-size19 w-full-sm"><font color="pink">
            Total Net:
          </span>

          <span class="m-text21 w-size20 w-full-sm">
             <?php echo $somme." DT"; ?>
          </span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">


          <div class="w-size20 w-full-sm">

            <div class=" m-t-8 m-b-12">
             <span class="s-text19">TVA : </span>
             <?php echo ($somme*0.19)." DT"; ?>
            </div>
            <div class=" m-t-8 m-b-12">
             <span class="s-text19">DATE : </span>
              <?php $date = new DateTime(); echo $date->format('Y-m-d H:i:s');?>
            </div>
            <div class=" m-t-8 m-b-12">
             <span class="s-text19">Secteur de livraison : </span>
             <form method="POST" action="command.php">
                <select name="secteur">
                  <option value="Ariana">
                    Ariana
                  </option>
                  <option value="Ghazela">
                    Ghazela
                  </option>
                  <option value="Le Bardo">
                    Le Bardo
                  </option>
                  <option value="El Manar">
                    El Manar
                  </option>
                  <option value="El Menzah">
                    El Menzah
                  </option>
                </select>
           
            </div>

          </div>
        </div>

        <!--  -->
        <div class="flex-w flex-sb-m p-t-26 p-b-30">
          <span class="m-text22 w-size19 w-full-sm">
            Total:
          </span>

          <span class="m-text21 w-size20 w-full-sm">
            <?php echo ($somme*1.19)." DT"; ?>
          </span>
        </div>

        <div class="size15 trans-0-4">
            </div><br>



<button class="btn btn-primary py-3 px-4" name="validercommande">
            Valider
          </button>
          </div>
    		</div>
			</div>
		</section>

    

		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h1 class="big">Subscribe</h1>
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Modist</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>
<?php

}

?>