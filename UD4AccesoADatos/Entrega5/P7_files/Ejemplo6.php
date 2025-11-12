<?php
require_once 'fpdf186/fpdf.php';

$contenido = file('notas.txt');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

foreach ($contenido as $linea) {
   $pdf->Cell(0, 10, mb_convert_encoding(trim($linea), 'ISO-8859-1', 'UTF-8'), 0, 1);
}

$pdf->Output('I', 'notas.pdf');
?>