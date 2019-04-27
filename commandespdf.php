<?php
include "../core/commandeC.php";
require ('db.php');


ob_start();
?>
<page backtop="20mm">
	 <h1> Commandes en cours:  </h1>
		<table style="wiDTh:100%;border: 2px dashed " >
		<tr>

														  <th scope="col" style="text-align: center;">Commande</th>
													      <th scope="col" style="text-align: center;">Date</th>
													      <th scope="col" style="text-align: center;">Montant HT</th>
													      <th scope="col" style="text-align: center;">TVA</th>
													      <th scope="col" style="text-align: center;">Montant TTC</th>
													      <th scope="col" style="text-align: center;">Etat </th>
													      <th scope="col" style="text-align: center;">Lieu</th>
													      <th scope="col" style="text-align: center;">Prix Livraison</th>
													      <th scope="col" style="text-align: center;">Total à payer</th>
													  
													      
													    
													</tr>
													
		<?php
	$commandess=new commandeC();
$listcommandes=$commandess->recuperercommandes();
		foreach($listcommandes as $row) {
			?>
		  <tr>
												    <td scope="col" style="text-align: center;"> N°<?php echo $row["idCommande"] ; ?></td> 
												    <td scope="col" style="text-align: center;"> <?php echo $row["dateCommande"] ; ?></td> 
												    <td scope="col" style="text-align: center;"> <?php echo $row["montantCommande"] ; ?> DT</td> 
												    <td scope="col" style="text-align: center;"> <?php echo $row["montantCommande"]*0.19 ; ?> DT</td> 
												    <td scope="col" style="text-align: center;"> <?php echo $row["montantCommande"]*1.19 ; ?> DT</td> 
												    <td scope="col" style="text-align: center;"> <?php echo $row["etatCommande"] ; ?></td> 
                                                    <td scope="col" style="text-align: center;"> <?php echo $row["lieuLivraison"] ; ?></td> 
												    <td scope="col" style="text-align: center;"> <?php echo $row["prixLivraison"] ; ?> DT</td> 
												    <td scope="col" style="text-align: center;"> <?php echo $row["montantCommande"]*1.19+5 ; ?> DT</td> 


 												      
												   
												              
												    </tr>
			<?php  
		}

?>
	</table>


</page>

<?php
$content= ob_get_clean();
require('html2pdf/html2pdf.class.php');
try{
$pdf=new html2pdf('p','A4','fr','true','UTF-8');
$pdf->pdf->SetDisplayMode('fullpage');

$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(true)');
$pdf->Output('test.pdf');
}
catch(HTML2PDF_exception $e)
{
	die($e);
}

?>