<?PHP
include "../core/panierC.php";
$panier1P=new panierP();
$listepanier=$panier1P->afficherpaniers();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>id_produit</td>
<td>image</td>
<td>prix</td>
<td>quantite</td>
<td>couleur</td>
</tr>

<?PHP
foreach($listepanier as $row){
  ?>
  <tr>
  <td><?PHP echo $row['id_produit']; ?></td>
  <td><?PHP echo $row['image']; ?></td>
  <td><?PHP echo $row['prix']; ?></td>
  <td><?PHP echo $row['quantite']; ?></td>
  <td><?PHP echo $row['couleur']; ?></td>
  <td>
    <form method="POST" action="supprimerpanier.php">
      <input type="hidden" value="<?= $row['id'] ?>" name="id">
  <input type="submit" name="supprimer" value="supprimer">
  
  </form>
  </td>
  <td><a href="tables-panier.html?id=<?PHP echo $row['id_produit']; ?>">
  Modifier</a></td>
  </tr>
  <?PHP
}
?>
</table>


