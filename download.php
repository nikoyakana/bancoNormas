<?php
if(empty($_GET['name'])){
    echo 'Arquivo inválido';
    return;
}
preg_match('/^(?<tipo>NA|PL)-(?<numero>\d{3})-(?<classe>[A-Z]{2})$/', $_GET['name'], $matches);
if(!$matches) {
    echo 'Formato inválido';
    return;
}
$filename = 'statics/'.$_GET['name'].'.pdf';
if(!file_exists($filename)) {
    echo 'Arquivo não encontrado';
    return;
}
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="'.$_GET['name'].'.pdf"');
echo file_get_contents($filename);