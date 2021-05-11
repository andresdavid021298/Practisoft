<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
// require_once 'dompdf/autoload.inc.php';
require_once '../../vendor/autoload.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba
$html=file_get_contents_curl("http://localhost/Practisoft/View/Coordinator/informe_estudiantes.php");

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->setPaper("letter", "landscape");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->loadHtml($html);
 
// Renderizamos el documento PDF.
$pdf->render();

// Enviamos el fichero PDF al navegador.
$pdf->stream('informe_estudiantes.pdf');


function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}
