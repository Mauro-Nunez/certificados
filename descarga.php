<?php
include "fpdf/fpdf.php";
//require("WriteHTML.php");
//$cedula= $_GET['dni'];
//$apellido= $_GET['apellido'];

$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
//$rol= $_GET['rol'];
//$institucion= $_GET['institucion'];
//$distincion= $_GET['distincion'];
//$estable= $_GET['estable'];
//$escuela = "Escuela";
//$puntos = strpos($cedula, ".");
//$pos = strpos($institucion, $escuela);
//$nombres = $nombre." "."         "."DNI: ".$cedula;

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->Image('img/certificado.jpeg', 0, 0, 300);
$pdf->SetFont("Arial", "", "28");

//  $pdf->cell(10,10,"Posisiob  ".$pos);
$pdf->Ln(78);



$pdf->SetFont("Arial", "", "20");
/*if ($pos===false){
    if ($puntos===false){
        $pdf->MultiCell(275,10,"El Honorable Concejo Deliberante de Posadas distingue al estudiante: ".utf8_decode($nombre).
        ", D.N.I: ".number_format($cedula,0,'','.').", ".utf8_decode($distincion)." de la insignia patria del ".utf8_decode($institucion).", en reconocimiento 
        a su " .utf8_decode('dedicación'). " en el estudio, se le otorga el presente diploma.", 0,'C');
    }
    else
    {
        $pdf->MultiCell(275,10,"El Honorable Concejo Deliberante de Posadas distingue al estudiante: ".utf8_decode($nombre).
        ", D.N.I: ".$cedula.", ".utf8_decode($distincion)." de la insignia patria del ".utf8_decode($institucion).", en reconocimiento 
        a su " .utf8_decode('dedicación'). " en el estudio, se le otorga el presente diploma.", 0,'C');
    }
}
else
{
    if ($puntos===false){
        $pdf->MultiCell(275,10,"El Honorable Concejo Deliberante de Posadas distingue al estudiante: ".utf8_decode($nombre).
        ", D.N.I: ".number_format($cedula,0,'','.').", ".utf8_decode($distincion)." de la insignia patria de la ".utf8_decode($institucion).", en reconocimiento 
        a su " .utf8_decode('dedicación'). " en el estudio, se le otorga el presente diploma.", 0,'C');
    }
    else
    {
        $pdf->MultiCell(275,10,"El Honorable Concejo Deliberante de Posadas distingue al estudiante: ".utf8_decode($nombre).
        ", D.N.I: ".$cedula.", ".utf8_decode($distincion)." de la insignia patria de la ".utf8_decode($institucion).", en reconocimiento 
        a su " .utf8_decode('dedicación'). " en el estudio, se le otorga el presente diploma.", 0,'C');
    }
}*/

$pdf->MultiCell(270, 3, utf8_decode(strtoupper($nombre)) . ' ' . utf8_decode(strtoupper($apellido)), 0, 'C');
//$pdf->Cell (270, 128, utf8_decode($nombres), 0,0,"C");

$pdf->output();
