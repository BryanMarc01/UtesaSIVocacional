<?php

// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "inscripcion");

// Consulta a la base de datos para obtener los datos de la tabla usuarios
$resultado = mysqli_query($conn, "SELECT * FROM usuarios");

// Creación del objeto FPDF
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->SetTitle('Reporte de Usuarios - UTESA');


// Agregar página
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(0, 20, 'Universidad Tecnologica de Santiago (UTESA)', 0, 1, 'R');
// Logo de Utesa
$pdf->Image('../Login/img/Captura.png',10,10,50);

// Título del reporte
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,60,'Reporte de Usuarios del Sistema Automatizado de Inscripcion ',0,1,'C');

// Separador
$pdf->Ln(4);

// Configuración de colores y fuentes
$pdf->SetFillColor(0, 150, 136);
$pdf->SetTextColor(255);
$pdf->SetFont('', 'B');

// Encabezados de la tabla
$pdf->Cell(40, 10, 'ID', 1, 0, 'C', 1);
$pdf->Cell(60, 10, 'Usuario', 1, 0, 'C', 1);
$pdf->Cell(65, 10, 'Correo', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Rol', 1, 1, 'C', 1);

// Configuración de colores y fuentes
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetFont('');

// Iterar sobre los resultados de la consulta y agregar cada fila a la tabla
while($fila = mysqli_fetch_array($resultado)) {
    $pdf->Cell(40, 10, $fila['id'], 1, 0, 'C', 1);
    $pdf->Cell(60, 10, $fila['usuario'], 1, 0, 'C', 1);
    $pdf->Cell(65, 10, $fila['correo'], 1, 0, 'C', 1);
    $pdf->Cell(30, 10, $fila['rol'], 1, 1, 'C', 1);
}

// Salida del documento
$pdf->Output();

?>
  