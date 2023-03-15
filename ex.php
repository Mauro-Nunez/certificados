<?php
require('WriteHTML.php');
//$nombre= $_GET['alumno'];
$nombre= 'Gera';
$rol= 'Mentor';
//$rol= $_GET['rol'];
$pdf=new PDF_HTML('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','','14');
$pdf->Image('img/certif.png',0,0,300);
$pdf->Ln(85);
$pdf->WriteHTML(utf8_decode('<div style="margin-bottom:1em;">Certifico que <strong>'.$nombre.'</strong> participó como '.$rol.' del programa: "I Hackathon Ambiental 
2020" (modalidad virtual) desde el edificio central del Honorable Concejo Deliberante de la ciudad de Posadas, 
durante los días 27, 28, 29, 30 del mes de noviembre y los días 1 y 2 del mes de diciembre de 2020, en el marco 
del Programa Municipal Hackathon Ambiental, establecido por la Ordenanza VI N°49.</div>
<br><br><p align="center">Posadas, Misiones, Argentina. Diciembre de 2020.</p>'));
$pdf->Output();
?>
