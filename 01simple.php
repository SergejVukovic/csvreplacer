<?php

require 'vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
$dataFfile = 'ogasi.xls';
$objPHPExcel = PHPExcel_IOFactory::load($dataFfile);
$sheet = $objPHPExcel->getActiveSheet();


$kolona = 1;
$cell = 'a';
$testCell ='a';
while ($cell !='')
{
    $cell = $sheet->getCell('A'.$kolona)->getValue();
    echo $cell."<br>";
    $kolona++;
    if($cell == '')
    {
        $cell = $sheet->getCell('A'.($kolona+1))->getValue();
        if($cell == '')
        {
            $cell='a';
            $kolona = 1;
            while ($cell != '')
            {
                $cell = $sheet->getCell('B'.$kolona)->getValue();
                echo $cell."<br>";
                $kolona++;
                if($cell == '') {
                    $cell = $sheet->getCell('B' . ($kolona + 1))->getValue();
                }
            }
        }
    }
}
