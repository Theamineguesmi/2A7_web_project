<?PHP
	
include "../entities/product.entities.php";
include "../core/product.core.php";
if (isset($_POST['ProductCatId']) and isset($_POST['name']) and isset($_POST['description'])and isset($_POST['price'])){
	
if (!empty($_POST['ProductCatId']) or !empty($_POST['name']) or !empty($_POST['description']) or !empty($_POST['units_in_stock']) or !empty($_POST['Photographer_name'])or !empty($_POST['price'])){
		
		
$reference = uniqid('MAKHLA_');


$product=new product($_POST['ProductCatId'],$_POST['name'],$_POST['description'],$_POST['units_in_stock'],$_POST['Photographer_name'],$_POST['price']);

$product_core=new ProductCore();
$product_core->add_product($product_core,$product,$reference);

       ob_start();
       header("Location:tables-data.php");
       exit();
	
}else{
	echo "vérifier les champs";
}
}
//*/

?>