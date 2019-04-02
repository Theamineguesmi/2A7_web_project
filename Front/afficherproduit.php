<?PHP
include "../core/produitC.php";
$produit1C=new produitC();
$listeproduit=$produit1C->afficherproduits();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>imageP</td>
<td>idP</td>
<td>nomP</td>
<td>descP</td>
<td>qteP</td>
<td>prixP</td>
<td>categorieP</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeproduit as $row){
  ?>
  <tr>
  <td> <img src="images/<?php echo $row['imageP']; ?> "height=100px></td>
  <td><?PHP echo $row['idP']; ?></td>
  <td><?PHP echo $row['nomP']; ?></td>
  <td><?PHP echo $row['descP']; ?></td>
  <td><?PHP echo $row['qteP']; ?></td>
  <td><?PHP echo $row['prixP']; ?></td>
  <td><?PHP echo $row['categorieP']; ?></td>


  <td>
    <form method="POST" action="supprimerproduit.php">
      <input type="hidden" value="<?= $row['idP'] ?>" name="idP">
  <input type="submit" name="supprimer" value="supprimer">
  
  </form>
  </td>
  <td><a href="tables-produits.html?idP=<?PHP echo $row['idP']; ?>">
  Modifier</a></td>
  </tr>
  <?PHP
}
?>
</table>


