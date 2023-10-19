<?php

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;



$content ="<!DOCTYPE html>
					<html lang='es'>
						<head>
							<meta charset='UTF-8'>
							<title>Document</title>
							<link rel='stylesheet'  href='programacionpilotos.css' type='text/css' media='all'>
						</head>
						<body style='text-align: center'; >
							<br><br><br><br><br><br><br><br><br><br> 
							<img class='logo' src='LOGO-FINAL-02.png'> <br>
							Programacion aun no disponible.
						</body>
					</html>";



$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', ''); // (Opcional) Configurar papel y orientación landscape
$dompdf->render(); // Generar el PDF desde contenido HTML
$pdf = $dompdf->output(); // Obtener el PDF generado
$filename = 'Programacion.pdf';
$dompdf->stream($filename); // Enviar el PDF generado al navegador
