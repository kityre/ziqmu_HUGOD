<?php
require'fpdf/fpdf.php';
	ob_get_clean(); 
 	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',18);
	$pdf->Image('images/logo.jpg',30,0,150,100);
	$pdf->Ln(5);
	$pdf->Cell(1,190,"Fiche de participation: ");
	$pdf->Ln(5);
	$pdf->Cell(1,198,"Cour: ".$cour);
	$pdf->Ln(3);
	$pdf->Cell(1,206,"Nom participant: ".$infoPDF['nom']);
	$pdf->Ln(3);
	$pdf->Cell(1,214,"Prenom participant: ".$infoPDF['prenom']);
	$pdf->Ln(3);
	$pdf->Cell(1,222,"Jour: ".$infoPDF['jour']);
	$pdf->Ln(3);
	$pdf->Cell(1,230,"Heure: ".$infoPDF['heure']);
	$pdf->Ln(3);
	$pdf->Cell(1,238,"Enseignant: ".$infoPDF['prof']);
	$pdf->output();
	
	
?>