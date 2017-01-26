<?php
ini_set('max_execution_time',3000);
require 'vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
$dataFfile = 'test1.xls';
$objPHPExcel = PHPExcel_IOFactory::load($dataFfile);
$sheet = $objPHPExcel->getActiveSheet();

$counter =0;
$collection = array();

thruTable('A');

echo $counter;

function thruTable($row){
    global $sheet;
    $column = 1;
    $cell = 'a';
    while ($cell !='') {
        $cell = $sheet->getCell($row . $column)->getValue();
        $word = explode(" ",$cell);
        addUniqeWord($word);
        if ($cell == '') {
            $cell = $sheet->getCell($row . ($column + 1))->getValue();
        }
        $column++;
    }
}

function addUniqeWord($neWord)
{
    global $collection;
    for($i = 0;$i<count($neWord);$i++) {
        $helper = checker($neWord[$i]);
       if($helper)
           array_push($collection,$neWord[$i]);

    }
}

function checker ($word)
{
    if(count_chars($word)<3)
        return false;
    $word = clean($word);
    $word = strtolower($word);
    global $collection,$counter;
    for ($i=0;$i<count($collection);$i++) {
        if ($collection[$i] == $word){
            return false;
        }
    }
    $counter++;
    return true;
}
function clean($string) {
    $string = str_replace(' ', '-', $string);
    $string = str_replace('.', '', $string);
    $string=rtrim($string,',');
    $string = str_replace('/[0-9]+/','',$string);
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
foreach ($collection as $line)
{
    if(!is_numeric($line))
        echo clean($line)."<br>";
}
