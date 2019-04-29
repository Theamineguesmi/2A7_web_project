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
            </span></a></li></ul></div></div></nav><br><br><br>

            <div align="center"><h1>Choisisez votre méthode de paiement:</h1></div><br><br><br>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" align="center"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $somme*1.19; ?>
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>
<?php
}
?>