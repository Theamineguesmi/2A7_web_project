<?php
require('fpdf.php');

//db connection


//get invoices data
include "../core/product.core.php";

$sql="
		SELECT *   
FROM Product  
INNER JOIN product_component  
ON Product.reference collate utf8_general_ci = product_component.reference collate utf8_general_ci;
";
		$db = config::getConnexion();
	
		$liste=$db->query($sql);
		$pdf = new FPDF('P','mm','A4');

		$pdf->AddPage();	
		//Cell(width , height , text , border , end line , [align] )
		$pdf->SetFont('Arial','B',14);
		$i=0;
$pdf->Cell(130	,5,'MAKHLA',0,0);

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(102	,5,'name',1,0);
$pdf->Cell(25	,5,'desc',1,0);
$pdf->Cell(34	,5,'ref',1,1);//end of line

$pdf->SetFont('Arial','',12);
$i=0;
foreach($liste as $invoice){

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm


$nomimage=$invoice['name'];
$image1 = "uploads/_105192rg29_o16p_10P_0j.1_PW_MAKHLA.jpg";
$pdf->Cell(59	,5,'',0,1);
//set font to arial, bold, 14pt




//Numbers are right-aligned so we give 'R' after new line parameter

//items


//display the items
$pdf->Cell( 102, 75, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 50.90), 1, 0);


	//add thousand separator using number_format function
	$pdf->Cell(25	,75,$invoice['name'],1,0);
	$pdf->Cell(34	,75,$invoice['description'],1,1,'M');//end of line
	//accumulate tax and amount
	

//summary

}
$pdf->Output();

?>
