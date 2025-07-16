<?php
session_start();
require_once('tcpdf/tcpdf.php'); 

if (!isset($_SESSION['usuario'])) {
    die("No hay sesión activa.");
}

$nombre = $_SESSION['usuario'];
$fecha = date("Y-m-d H:i:s");
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('Helvetica', '', 12);
$html = <<<EOD
<h1>Bienvenido, $nombre</h1>
<p>Esta es tu información de acceso:</p>
<ul>
    <li><strong>Nombre de usuario:</strong> $nombre</li>
    <li><strong>Fecha de acceso:</strong> $fecha</li>
</ul>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('acceso_usuario.pdf', 'I'); 
?>