<?PHP
include "../entities/category.entities.php";
include "../core/category.core.php";
if (isset($_GET['name']) and isset($_GET['desc'])){
	
	if (!empty($_GET['name']) or !empty($_GET['desc'])){
$category=new category($_GET['name'],$_GET['desc']);
$category_core=new CategoryCore();
$category_core->add_category($category);
       ob_start();
       header("Location:category.php");
       exit();
	
}else{
	echo "vérifier les champs";
}
}
//*/

?>