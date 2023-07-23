<?php

require_once('classes\PHPExcel.php');

$excel = PHPExcel_IOFactory::load('test.xlsx');
$valueName = $excel->getActiveSheet()->getCell('A1');

echo $valueName;

?>