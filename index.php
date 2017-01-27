<?php
ini_set('max_execution_time',3000);

require 'vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
$dataFfile = 'ogasi.xls';
$objPHPExcel = PHPExcel_IOFactory::load($dataFfile);
$sheet = $objPHPExcel->getActiveSheet();

$uniqueCounter =0;
$collection = array();
if(isset($_POST['column']) && isset($_POST['limit']))
{
    thruTable($_POST['column'],$_POST['limit']);

}else
{
    $error = "please enter values in the field";
}

include 'form.html.php';
function thruTable($row,$limit){
    global $sheet;
    $column = 1;
    while ($column < $limit) {
        $cell = $sheet->getCell($row . $column)->getValue();
        $word = explode(" ",$cell);
        addUniqeWord($word);
        if ($cell == '' && ($sheet->getCell($row.($column+1))->getValue())== '') {
           return true;
        }
        if($column == $limit)
            return false;

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
    $word = clean($word);
    $word = strtolower($word);
    if(strlen($word)<=3)
    {
        return false;
    }
    global $collection,$uniqueCounter;
    for ($i=0;$i<count($collection);$i++) {
        if ($collection[$i] == $word){
            return false;
        }
    }
    $uniqueCounter++;
    return true;
}
function clean($string) {
    $string = str_replace(' ', '-', $string);
    $string = str_replace('.', '', $string);
    $string=rtrim($string,',');
    $string = str_replace('/[0-9]+/','',$string);
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
