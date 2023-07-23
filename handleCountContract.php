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

$contract = mysqli_query($link, "SELECT * FROM `contract`");
$i = 2;
$totalCount = 0;
$objExcel->setActiveSheetIndex(0)->mergeCells('A1:G1')->setCellValue('A1', 'Договоры')->getStyle()->getFont()->setSize(20);
$objExcel->setActiveSheetIndex(0)->getStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objExcel->setActiveSheetIndex(0)->setCellValue("A$i", "Номер")->getStyle("A$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("B$i", "Поставщик")->getStyle("B$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("C$i", "Магазин")->getStyle("C$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("D$i", "Дата заключения")->getStyle("D$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("E$i", "Дата окончания")->getStyle("E$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("F$i", "Описание")->getStyle("F$i")->getFont()->setBold(true);


$objExcel->setActiveSheetIndex(0)->setCellValue("G$i", "Статус")->getStyle("G$i")->getFont()->setBold(true);

$i = 3;
while ($con = mysqli_fetch_assoc($contract))
{
    // $name = $с['name'];
    
    $conId = $con['contract_id'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("A$i", "$conId")->getColumnDimension('A')->setWidth(20);

    // $price = $fur['price'];
    $prId = $con['provider_id'];
    $provider = mysqli_query($link,"SELECT * FROM `provider` WHERE `provider_id` = $prId");
    $pr = mysqli_fetch_assoc($provider);
    $prName = $pr['name'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("B$i", "$prName")->getColumnDimension('B')->setWidth(20);

    $shId = $con['shop_id'];
    $shop = mysqli_query($link,"SELECT * FROM `shop` WHERE `shop_id` = $shId");
    $sh = mysqli_fetch_assoc($shop);
    $shName = $sh['name'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("C$i", "$shName")->getColumnDimension('C')->setWidth(20);

    $dateOfCon = $con['date_of_conclusion'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("D$i", "$dateOfCon")->getColumnDimension('D')->setWidth(20);

    $dateOfExp = $con['date_of_expiration'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("E$i", "$dateOfExp")->getColumnDimension('E')->setWidth(20);

    $shortText = $con['short_text'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("F$i", "$shortText")->getColumnDimension('F')->setWidth(50);

    $status = $con['status'];
    $objExcel->setActiveSheetIndex(0)->setCellValue("G$i", "$status")->getColumnDimension('G')->setWidth(20);

    $i++;
}
$i = $i+1;
// $objExcel->setActiveSheetIndex(0)->setCellValue("F$i", "Всего: $totalCount")->getColumnDimension('F')->setWidth(20);
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

$objWriter->save('Отчет_договоры.xlsx');

$_SESSION['message'] = "<script>alert('Отчет загружен')</script>";

header ('Location: report.php');