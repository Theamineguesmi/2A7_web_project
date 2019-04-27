<?php
include "../entities/produit.php";
include "../core/produitC.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
if(isset($_POST['ajouterproduit1']) && (isset ($_POST['q1'])))
{ 
  $q1=$_POST['q1'];
  $id_display=$_GET["ida"];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit_ajout($id_display);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>";
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>";
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
  
}

if(isset($_POST['ajouterwishlist2']))
{ 
  $id_display=$_GET["wishlist"];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit_ajout($id_display);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja en tant que favori\")</script>"; 
    }
    
  }
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
            <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
	          <li class="nav-item"><a href="wishlist.php" class="nav-link">Wishlist</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="session.html" class="nav-link">Administrateur</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>

			  											     <?php
				          $produit=new produitC;
				          $count=$produit->countpanier($_SESSION['id']);
				          foreach($count as $row)
				            {
				              echo $row["cnt"];
				            }
				          ?>
			  </a></li>
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
            <h1 class="mb-0 bread"><font color="white"><strong>Shop</strong></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html"><font color="white"><strong>Home</strong></a></span> <span><a href="cart.php"><font color="white"><strong>Cart</strong></span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row">
													<?PHP
					$produit1C=new produitC();
					$listeproduits=$produit1C->recupererproduit();

					foreach($listeproduits as $row)
					{
					    $id=$row['id'];
                        $chemin="picproduct/produit".$id.".jpg"
				    ?>
    			<div class="col-sm col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $chemin; ?>" alt="Colorlib Template">
    					<!--	<span class="status">00%</span> -->
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#"><?PHP echo $row['nom']; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc"><?PHP echo $row['prix']; ?> dt</span><span class="price-sale"><?PHP echo $row['prix']; ?></span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    							</p>
	    						</div>
	    					</div>
	    					<hr>
							<form method="POST" action="?ida=<?PHP echo $row['id']; ?>">
							<input min="1"  required="required" type="number" name="q1" placeholder="QUANTITE">
    						<p class="bottom-area d-flex"><br>
    							<button class="btn btn-primary py-3 px-4" name="ajouterproduit1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
    						</p>
							</form>
							<form method="POST" action="?wishlist=<?PHP echo $row['id']; ?>">
							<button href="#" class="btn btn-primary py-3 px-4" class="ml-auto" name="ajouterwishlist2"><span><i class="ion-ios-heart-empty"></i></span></button>
							</form>
    					</div>
    				</div>
    			</div>
					  <?PHP
					}
					?>
    		</div>





    </section>





		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	               
            	    <!-- debut chatbot html-->
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                          <div id="main">
            <div><font color="black">user: <span id="user"></span></div>
            <div><font color="black">Mamino: <span id="chatbot"></span></div>
            <div><input id="input" type="text" placeholder="say anything..." autocomplete="off"/></div>
                    <!-- fin chatbot html-->

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
        </div
        >


        <div class="row">
          <div class="col-md-12 text-center">
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
    <!--debut chatbot script -->
    <script >
var trigger = [
    ["bonjour","salut","hello","hey"],
    ["comment vas tu", "ca va", "comment vas la vie"],
    ["que pourrais je acheter","quoi acheter", "j achete quoi"],
    ["trente"],
    ["cinquante"],
    ["quatre vingt"],
    ["qui es tu"],
    ["es tu un bot"],
    ["es tu un humain ou un bot"],
    ["es tu humain"],
    ["qui tas cree", "qui tas fait"],
    ["je taime"],
    ["je vais bien"],
    ["je ne vais pas bien"],
    ["raconte moi une blague"],
    ["haha","hahahaha","hahaha","hahahahahaha","hahahahaha"],
    ["bye","au revoir","adieu"],
    ["comment pouvoir acheter"],
    ["daccord"],
    ["dis moi plus sur ce site","cest quoi ce site","vous vendez quoi"],
    ["benti ki bentii"]

];
var reply = [
    ["Bonjour","Salut","Bienvenue"],
    ["Bien", "Très Bien, merci", "Fantastique"],
    ["Ça dépend de ton budget"],
    ["Tu peux prendre le sac classique"],
    ["Tu peux prendre le sac classique ou le sac revisité"],
    ["Tu peux prendre n'importe quel sac"],
    ["On m'appelle Mamino"],
    ["Certains m'appellent comme ça, Oui"],
    ["Un bot"],
    ["Surement pas"],
    ["Biter Hamza"],
    ["Je n'ai pas de sentiment, pardon", "J'aimerai ressentir la même chose, mais je ne peux pas"],
    ["Content de l'apprendre"],
    ["Pourquoi? il faut positiver dans la vie"],
    ["Nous n'avons pas le même humour, moi ce qui me fait rire, c'est les bits"],
    ["J'ai réussi à te faire rire askip"],
    ["Bye","Au revoir","A la prochaine"],
    ["En t'inscrivant"],
    ["J'espère t'avoir aidé"],
    ["C'est le site de vente en ligne de l'entreprise Makhla, qui vend des sacs écologiques faits à partir de palmiers."],
    ["Waaah"]

];
var alternative = ["Je ne pourrais vous répondre", "Demandez à Google, il est légérement plus intelligent"];
document.querySelector("#input").addEventListener("keypress", function(e){
    var key = e.which || e.keyCode;
    if(key === 13){ //Enter button
        var input = document.getElementById("input").value;
        document.getElementById("user").innerHTML = input;
        output(input);
    }
});
function output(input){
    try{
        var product = input + "=" + eval(input);
    } catch(e){
        var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and
        text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(/please /g, "").replace(/ please/g, "");
        if(compare(trigger, reply, text)){
            var product = compare(trigger, reply, text);
        } else {
            var product = alternative[Math.floor(Math.random()*alternative.length)];
        }
    }
    document.getElementById("chatbot").innerHTML = product;
    speak(product);
    document.getElementById("input").value = ""; //clear input value
}
function compare(arr, array, string){
    var item;
    for(var x=0; x<arr.length; x++){
        for(var y=0; y<array.length; y++){
            if(arr[x][y] == string){
                items = array[x];
                item =  items[Math.floor(Math.random()*items.length)];
            }
        }
    }
    return item;
}
function speak(string){
var utterance = new SpeechSynthesisUtterance();
utterance.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Agnes";})[0];
utterance.text = string;
utterance.lang = "fr-EU";
utterance.volume = 1; //0-1 interval
utterance.rate = 1;
utterance.pitch = 2; //0-2 interval
speechSynthesis.speak(utterance);
}
</script>
    <!--fin chatbot script -->
  </body>
</html>
<?php

}

?>