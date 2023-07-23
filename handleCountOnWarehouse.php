<?php
session_start();

require_once('classes\PHPExcel.php');
require "includes\config.php";

echo 'Сайт работает' . '<br>';

// $excel = PHPExcel_IOFactory::load('test.xlsx');
// $value1 = $excel->getActiveSheet()->getCell('A1');
// $value2 = $excel->getActiveSheet()->getCell('B1');
// $value3 = $excel->getActiveSheet()->getCell('C1');

// echo $value1 . $value2 . $value3;

$objExcel = new PHPExcel();
// $objExcel->setActiveSheetIndex(0)->setCellValue('A1','я люблю аниме')->getColumnDimension('A')->setWidth(30);
// for ($i = 0; $i<10; $i++)
// {
//     $objExcel->setActiveSheetIndex(0)->setCellValue("A$i",'я люблю аниме')->getColumnDimension('A')->setWidth(30);
// }

$furniture = mysqli_query($link, "SELECT * FROM `furniture` WHERE `employee_id` IS NULL AND `warehouse_id` IS NOT NULL");
$i = 2;
$totalCount = 0;
$objExcel->setActiveSheetIndex(0)->mergeCells('A1:F1')->setCellValue('A1', 'Количество товара на складах')->getStyle()->getFont()->setSize(20);
$objExcel->setActiveSheetIndex(0)->getStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objExcel->setActiveSheetIndex(0)->setCellValue("A$i", "Название")->getStyle("A$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("B$i", "Цена")->getStyle("B$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("C$i", "Цвет")->getStyle("C$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("D$i", "Вид")->getStyle("D$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("E$i", "Размеры")->getStyle("E$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("F$i", "Количество")->getStyle("F$i")->getFont()->setBold(true);

$objExcel->setActiveSheetIndex(0)->setCellValue("G$i", "Склад")->getStyle("G$i")->getFont()->setBold(true);

$i = 3;
while ($fur = mysqli_fetch_assoc($furniture))
{
    $name = $fur['name'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("A$i", "$name")->getColumnDimension('A')->setWidth(50);
    $price = $fur['price'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("B$i", "$price")->getColumnDimension('B')->setWidth(20);
    $color = $fur['color'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("C$i", "$color")->getColumnDimension('C')->setWidth(20);
    $type = $fur['type'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("D$i", "$type")->getColumnDimension('D')->setWidth(20);
    $size = $fur['size'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("E$i", "$size")->getColumnDimension('E')->setWidth(20);
    $count = $fur['count'];
    $totalCount = $totalCount + $count;
    $objExcel->setActiveSheetIndex(0)->setCellValue("F$i", "$count")->getColumnDimension('F')->setWidth(20);
    $warId = $fur['warehouse_id'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("G$i", "$warId")->getColumnDimension('F')->setWidth(20);
    $i++;
}
$i = $i+1;
$objExcel->setActiveSheetIndex(0)->setCellValue("F$i", "Всего: $totalCount")->getColumnDimension('F')->setWidth(20);
$objExcel->setActiveSheetIndex(0)->getStyle("A2:G$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objExcel->setActiveSheetIndex(0);

$border = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000')
        )
    )
);

$i = $i - 2;
$objExcel->getActiveSheet()->getStyle("A2:G$i")->applyFromArray($border);

$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');

$objWriter->save('Отчет_товара_на_складе.xlsx');

$_SESSION['message'] = "<script>alert('Отчет загружен')</script>";

header ('Location: report.php');