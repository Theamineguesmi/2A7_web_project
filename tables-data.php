<?PHP
include "../core/product.core.php";
//start a session
session_start();
$userName=$_SESSION['user_name'];
if(empty($userName))
{
	//redirect to Login page
	header('Location:login.php');
}
$product_core=new ProductCore();
$product_list=$product_core->DisplayProduct();
$category_list=$product_core->DisplayCategory();
if (isset($_POST["id"])){
	$product_core->supprimerEmploye($_POST["id"]);
	   ob_start();
       header("Location:tables-data.php");
       exit();
}
//var_dump($listeEmployes->fetchAll());
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
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
 <script>
   function submitForm() {
	   var form = document.form_control;
	   if (form.ProductCatId.value == ""){alert("ProductCatId is empty");return false;}
	   else{
       if (form.name.value == ""){alert("name is empty");return false;}
       else{
	   if (form.description.value == ""){alert("description is empty");return false;}
	   else{
       if ( document.getElementById("uploadImage").files.length == 0 ){alert("select images");return false;}
       else{
	   if ( form.Photographer_name.value == "" ){alert("Photographer_name is empty");return false;}      
       }
	   }
	   }
       }
}
</script>
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
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> <?php echo $userName; ?></a>


                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
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
                            <li ><a href="#"><?php echo dirname($_SERVER["PHP_SELF"]);?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                                <button  class="btn btn-outline-success float-right" data-toggle="modal" data-target="#largeModal">ADD PRODUCT</button> 
<a  class="btn btn-outline- float-right" href="invoice-db.php">PRINT LIST AS PDF</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped ">
                                    <thead>
                                        <tr>
	                                        <th>FUNCTIONS</th>
                                            <th>ID</th>
                                            <th>REFERENCE</th>
                                            <th>NAME</th>
                                            <th>DESCRIPTION</th>
                                            
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
<?PHP foreach($product_list as $row){ ?>
                                        <tr>
	                                        <td>
<form method="POST" action="">
<button class="btn btn-outline-danger btn-sm " type="submit" name="DELETE" ><i class="fa fa-remove fa-lg"></i></button>
<a  class="btn btn-outline-success btn-sm" href="EDIT_product.php?reference=<?PHP echo $row['reference']; ?>" name="EDIT" ><i class="fa fa-edit fa-lg"></i></a>
<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
</form>		                                        
		                                    </td>
                                            <td><?PHP echo $row['id']; ?></td>
                                            <td><?PHP echo $row['reference']; ?></td>
                                            <td><?PHP echo $row['name']; ?></td>
                                            <td><?PHP echo $row['description']; ?></td>
                                        </tr>
<?PHP } ?>
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
<!--************************************************************************************-->
       <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	         <form method="POST" action="ADD_Product.php" name="form_control" enctype="multipart/form-data">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Products</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                        <div class="card-title">
                                            <h3 class="text-center">ADD PRODUCT</h3>
                                        </div>
                                        <hr>
  <div class="form-group">
    <label for="input">ProductCatId</label>
<select name="ProductCatId" id="select" class="form-control">
	<?PHP foreach($category_list as $row){ ?>
    <option value="<?PHP echo $row['id']; ?>"><?PHP echo $row['name']; ?></option>
    <?php } ?>
</select>
    <small id="emailHelp" class="form-text text-muted">We'll never share ProductCatId with anyone else.</small>
  </div>
  
    <div class="form-group">
    <label for="input">NAME</label>
    <input type="text" class="form-control" aria-describedby="NAMEHelp" name ="name" placeholder="Enter NAME">
  </div>
  
  
      <div class="form-group">
    <label for="input">PRICE</label>
    <input type="text" class="form-control" aria-describedby="PRICEHelp" name ="price" placeholder="Enter PRICE">
  </div>
  
      <div class="form-group">
    <label for="input">DESCRIPTION</label>
    <input type="text" class="form-control" aria-describedby="DESCRIPTIONHelp" name ="description" placeholder="Enter DESCRIPTION">
  </div>
        <div class="form-group">
    <label for="input">UNITS IN STOCK</label>
    <input type="text" class="form-control" aria-describedby="units_in_stockSHelp" name ="units_in_stock" placeholder="Enter UNITS IN STOCK">
  </div>
  
       <div class="form-group">
    <label for="input">UPLOAD PRODUCT'S PHOTO  : </label>
    <input type="file" class="btn-warning"  name="files[]" id="uploadImage" multiple>
    <input type="text" class="form-control" aria-describedby="PHTOGRAPHERHelp" name ="Photographer_name" placeholder="Enter PHTOGRAPHER NAME">
    <small id="emailHelp" class="form-text text-muted">We'll share PHTOGRAPHER'S NAME with anyone.</small>
  </div>
  
  

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     
                                <input type="submit" onclick="return submitForm()"class="btn btn-primary" name="ajouter" value="ajouter">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
<!--************************************************************************************-->
</body>

</html>
