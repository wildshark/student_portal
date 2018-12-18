<?php
include ("plugin/tcpdf/tcpdf.php");


//TTCPDF Object
$pdf = new TCPDF('p','mm','A4');

//remover header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//add page
$pdf->AddPage();

$pdf->Cell(190,10,'test form',1,1,'C');
$pdf->WriteHTMLCell(190,0,'','',"


");

$pdf->Output();
?>