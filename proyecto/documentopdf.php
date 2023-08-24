<?php
require('fpdf/fpdf.php');
include('conexion2.php');

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->SetFillColor(255, 192, 203); // Color de fondo del encabezado
        $this->Cell(0, 10, 'Informe de Resultados', 0, 1, 'C', 1); // 1 indica que debe tener fondo
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    function Content($nombresCarr, $porcentajesCarr) {
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(255); // Color de fondo de las celdas
        $this->SetTextColor(0); // Color del texto
        $this->Ln(10);

        for ($i = 0; $i < count($nombresCarr); $i++) {
            $this->Cell(120, 10, $nombresCarr[$i], 'TB', 0, 'L', 1);
            $this->Ln();
        }
    }
}


// Consulta a la base de datos para obtener los nombres de las carreras
$query = "SELECT CarNom FROM carrera";
$result = mysqli_query($conn, $query);

$nombresCarr = array();
while ($row = mysqli_fetch_assoc($result)) {
    $nombresCarr[] = $row['CarNom'];
}

// Crear una instancia del PDF
$pdf = new PDF();
$pdf->AddPage();

// Agregar contenido al PDF
$pdf->Content($nombresCarr, '1');

$pdf->Output();
// Generar y mostrar el
