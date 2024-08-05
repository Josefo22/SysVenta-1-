<?php
require('../../backend/fpdf/fpdf.php');
require '../../backend/config/Conexion.php';

$id = $_GET['id']; // ID de la falta asignada

// Obtener los datos de la falta asignada
$stmt = $connect->prepare("SELECT fa.id, fa.fecha_falta, 
                                  c.nocl AS nombre_cliente, c.apcl AS apellido_cliente, 
                                  f.descripcion AS falta_descripcion, f.valor AS falta_valor
                           FROM faltas_asignadas AS fa
                           INNER JOIN clientes AS c ON fa.cliente_id = c.idcli
                           INNER JOIN faltas AS f ON fa.falta_id = f.id
                           WHERE fa.id = ?");
$stmt->execute([$id]);
$falta = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$falta) {
    die("Falta no encontrada.");
}

// Crear directorio si no existe
$dir = '../../backend/facturas/';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Crear nuevo documento PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Configuración del título
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 10, 'Factura Electronica', 0, 1, 'C');
$pdf->Ln(10);

// Información del sistema
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'Sistema Administrativo' , 0, 1, 'C');
$pdf->Cell(0, 10, 'Villa Manuela' , 0, 1, 'C');
$pdf->Cell(130, 5, 'NIT: 901493434-6', 0, 0);
$pdf->Ln(10);

// Detalles de la factura
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Fecha de Falta: ' . $falta['fecha_falta'], 0, 1);
$pdf->Cell(0, 10, 'Cliente: ' . utf8_decode($falta['nombre_cliente'] . ' ' . $falta['apellido_cliente']), 0, 1);
$pdf->Cell(0, 10, 'Falta: ' . utf8_decode($falta['falta_descripcion']), 0, 1);
$pdf->Cell(0, 10, 'Valor: $' . number_format($falta['falta_valor'], 2, ',', '.'), 0, 1);
$pdf->Ln(10);

// Subtotal y Total
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(130, 10, 'Subtotal:', 0, 0);
$pdf->Cell(30, 10, number_format($falta['falta_valor'], 2, ',', '.'), 0, 1, 'R');

$pdf->Cell(130, 10, 'Total:', 0, 0);
$pdf->Cell(30, 10, number_format($falta['falta_valor'], 2, ',', '.'), 0, 1, 'R');

// Guardar el archivo PDF
$pdf_file = $dir . 'factura_' . $falta['id'] . '.pdf';
$pdf->Output('F', $pdf_file);

// Opcional: Ofrecer la opción de descarga
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="factura_' . $falta['id'] . '.pdf"');
readfile($pdf_file);
?>
