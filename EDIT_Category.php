<?php
	include "../entities/category.entities.php";
include "../core/category.core.php";
$category_core=new CategoryCore();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MAKHLA</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


 <script>
   function submitForm() {
	   var form = document.form_control;
	   if (form.name.value == ""){
          alert("name is empty");
          return false;
        }else{
	        
	       if (form.desc_cat.value == ""){
          alert("ProductCatId is empty");
          return false;
        }else{
	      	        
	             if(confirm("Sure you wanna Submit the form?")){
       return true;
     }
     else{
       return false;
     }
        }
        }         
        }
   
</script>
  <style>
  .star{
    display: inline-block;
    width: 20px;
    height: 20px;
    cursor: pointer;
    background-image: url('public/star-blank.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  }
  .star.over{
    background-image: url('public/star.png');
  }
  /*Carousel*/
.carrousel {
  text-align: center;
  padding: 0em 0;
  max-width: 750px;
  margin: auto;
  position: relative;
  overflow: hidden;
}
.carrousel h2 {
  margin: 0;
  margin-top: -1.7em;
  padding: 0;
  font-size: 1em;
  text-align: center;
  color: #bbbbbb;
}
.carrousel .slides {
  width: 400%;
  left: 0;
  padding-left: 0;
  padding-top: 1em;
  overflow: hidden;
  list-style: none;
  position: relative;

  -webkit-transition: transform .5s;
  -moz-transition: transform .5s;
  -o-transition: transform .5s;
  transition: transform .5s;
}
.carrousel .slides li {
  width: 25%;
  position: relative;
  float: left;
}
.carrousel li p{
  margin-top: 0;  
}
.carrousel li q {
  max-width: 90%;
  margin: auto;
  color: #666666;
  font-size: 1.3em;
  font-weight: bold;
}
.carrousel li img {
  width:20em;
  margin-left: -1.5em;
  margin-right: 0.5em;
  vertical-align: middle;
  border: 10px solid #fff;
}
.carrousel li span.author {
  margin-top:0.5em;
  font-size: 1.2em;
  color: #777777;
  display: block;
}
.carrousel .slidesNavigation {
  display: block;
  list-style: none;
  text-align: center;
  bottom: 1em;
  padding-top:1em; 
  /*--- Centering trick---*/
    /* Absolute positioning*/
    position: absolute; 
    /* Abosulte positioning*/
    width: 104px; /*This width  is the addition of the width of all the navigations dots - So in this case is   104 because the navigation dots are 26px (width:10px and 6px marginleft + 6 px marginright) and there are 4 dots so 4x26=104 */
    left: 50%; /*Centering de element*/
    margin-left: -52px; /*adjusting the centering by applying a negative margin of half of the width*/
}
.carrousel input {
  display: none;
}
.carrousel .slidesNavigation label {
  float: left;
  margin: 6px;
  display: block;
  height: 10px;
  width: 10px;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  border: solid 2px #2980b9;
  font-size: 0;
}
/* You have to repeat this with each slide
TODO: make it easier with SCSS
25% movement 100/slides-num
*/
#radio-1:checked ~ .slides {
  transform: translateX(0%);
}
#radio-2:checked ~ .slides {
  transform: translateX(-25%);
}
#radio-3:checked ~ .slides {
  transform: translateX(-50%);
}
#radio-4:checked ~ .slides {
  transform: translateX(-75%);
}


.carrousel .slidesNavigation label:hover {
   cursor: pointer;
}
/* You have to repeat this with each slide/dot */
.carrousel #radio-1:checked ~ .slidesNavigation label#dotForRadio-1,
.carrousel #radio-2:checked ~ .slidesNavigation label#dotForRadio-2,
.carrousel #radio-3:checked ~ .slidesNavigation label#dotForRadio-3,
.carrousel #radio-4:checked ~ .slidesNavigation label#dotForRadio-4 {
  background: #2980b9;
}

@media  (max-width: 796px) {
  .carrousel{
    height: 8.5em;
  }
}
@media  (max-width: 480px) {
  .carrousel li p {
    padding-left: 0.5em;
    padding-right: 0.5em;
  }
  .carrousel li q {
      font-size: 1em;
  }
  .carrousel li img {
     width:2em;
     margin-left: -1em;
     margin-right: 0.25em;
  }
}
  </style>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><h3>MAKHLA</h3></a>
                <a class="navbar-brand hidden" href="./"><h3>M</h3></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Products</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="tables-data.php">Product's list</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="Category.php">Category</a></li>
                        </ul>
                    </li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Category</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <?php
    if (($_GET['id'])){
    $result=$category_core->category_details($_GET['id']);
    foreach($result as $row){
	    
?>
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">CATEGORY ID : <?PHP echo $row['id']; ?></h3>
                                        </div>
                                        <hr>
                                        <form method="POST" name="form_control">
                                            <div class="form-group text-center">
       <h3><?PHP echo $row['name']; ?></h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">CATEGORY ID</label>
                                                <input id="cc-pament" name="ProductCatId" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?PHP echo $row['id']; ?>" disabled>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">NAME</label>
                                                    <input id="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?PHP echo $row['name']; ?>" name="name">
                                                </div>
                                                <div class="form-group">
                    <label for="cc-number" class="control-label mb-1">DESCRIPTION</label>
                    <input id="cc-number" name="desc_cat" type="tel" class="form-control cc-number identified visa" value="<?PHP echo $row['desc_cat']; ?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                                                                                   </div>

                                                <div>
<input type="submit" name="modifier" value="modifier" onclick="return submitForm()">
<input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>">
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->


                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->

<?PHP 
	} 
if (isset($_POST['modifier'])){
$category=new category($_POST['name'],$_POST['desc_cat']);
	$category_core->edit_category($category,$_POST['id_ini']);
    echo("<script>location.reload();</script>");
}
	
	}  ?>
                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
