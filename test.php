<?php
require'fpdf/fpdf.php';
$pdf=new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(30,0,"");
		$pdf->Cell(1,20,"Fiche de participation: ");
		$pdf->Image('images/image_entete.jpg',20,150,150,100);
		$pdf->Cell(15,100,"Numero Cour: ");
		$pdf->Cell(1,115,"Nom participant: ");
		$pdf->Cell(1,130,"Prenom participant: ");
		$pdf->Cell(1,145,"Jour: ");
		$pdf->Cell(1,160,"Heure: ");
		$pdf->Cell(1,175,"Enseignant: ");
		$pdf->output();
?>