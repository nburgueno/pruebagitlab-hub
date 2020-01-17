<?php
$fichero = $_GET['archivo'];
echo "aqui";
if (file_exists($fichero)) {
echo "si existe";
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($fichero));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fichero));
    ob_clean();
    flush();
	echo "a bajar";
    readfile($fichero);
    exit;
}
?>