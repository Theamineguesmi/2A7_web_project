<?PHP
include "../core/commandeC.php";
$commande1C=new commandeC();
$listecommande=$commande1C->affichercommandes();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>id</td>
<td>id_client</td>
<td>total</td>
</tr>

<?PHP
foreach($listecommande as $row){
  ?>
  <tr>
  <td><?PHP echo $row['id']; ?></td>
  <td><?PHP echo $row['id_client']; ?></td>
  <td><?PHP echo $row['total']; ?></td>

  <td>
    <form method="POST" action="supprimercommande.php">
      <input type="hidden" value="<?= $row['id'] ?>" name="id">
  <input type="submit" name="supprimer" value="supprimer">
  
  </form>
  </td>
  <td><a href="tables-commande.html?id=<?PHP echo $row['id']; ?>">
  Modifier</a></td>
  </tr>
  <?PHP
}
?>
</table>


