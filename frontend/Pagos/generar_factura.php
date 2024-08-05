<?php
require('../../backend/fpdf/fpdf.php');
require '../../backend/config/Conexion.php';

// Obtener ID del pago desde la URL
$id = $_GET['id'];

$stmt = $connect->prepare("SELECT p.id, p.fecha_pago, c.nocl AS nombre_cliente, c.apcl AS apellido_cliente, p.descripcion AS descripcion_pago, p.monto AS monto_pago
                           FROM pagos_administracion AS p
                           INNER JOIN clientes AS c ON p.cliente_id = c.idcli
                           WHERE p.id = ?");
$stmt->execute([$id]);
$pago = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pago) {
    die("Pago no encontrado.");
}

// Crear directorio si no existe
$dir = '../../backend/facturas/';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71, 10, '', 0, 0);
$pdf->Cell(59, 10, 'Factura Electronica', 0, 1, 'C');
$pdf->Cell(59 ,1,utf8_decode('Villa Manuela'),0,100);
$pdf->Cell(59, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(71, 5, 'Sistema Administrativo', 0, 0);
$pdf->Cell(59, 5, '', 0, 0);
$pdf->Cell(59, 5, 'Detalles', 0, 1);
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(130, 5, 'NIT: 901493434-6', 0, 0);
$pdf->Cell(25, 5, 'Fecha:', 0, 1);
$pdf->Cell(130, 5, 'Ciudad Bolivar', 0, 0);
$pdf->Cell(34, 5, $pago['fecha_pago'], 0, 1);

$pdf->Cell(50, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(130, 5, 'Nombre del Cliente:', 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(34, 5, utf8_decode($pago['nombre_cliente'] . ' ' . $pago['apellido_cliente']), 0, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(130, 5, 'Descripción del Pago:', 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(34, 5, utf8_decode($pago['descripcion_pago']), 0, 1);

$pdf->Cell(50, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(20, 80);
$pdf->SetFillColor(128, 128, 128);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(180, 10, "Detalles del Pago", 1, 0, "C", true);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(20, 90);
$pdf->MultiCell(180, 10, utf8_decode("Descripcion del pago registrado."), 1, "L");

$pdf->SetX(120);
$pdf->Cell(50, 10, "Subtotal:", 1, 0, "C");
$pdf->Cell(30, 10, number_format($pago['monto_pago'], 2, ',', '.'), 1, 1, "R");
$pdf->SetX(120);
$pdf->Cell(50, 10, "Total:", 1, 0, "C");
$pdf->Cell(30, 10, number_format($pago['monto_pago'], 2, ',', '.'), 1, 1, "R");

$pdf_file = $dir . 'factura_' . $pago['id'] . '.pdf';
$pdf->Output('F', $pdf_file);

// Opcional: Ofrecer la opción de descarga
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="factura_' . $pago['id'] . '.pdf"');
readfile($pdf_file);
?>
