<?php
ini_set('display_errors', 1); error_reporting(~0);
include "addons/DataSource.php";

if(isset($_POST["column"]) && is_numeric($_POST["column"])) {
    $col = $_POST["column"];
    $csv = new File_CSV_DataSource();
    $i = 0;
    $num=0;
    $data=array();
    $selectedColumn = array();
    $csv->load('csv/ogasi.csv');
    while(count($csv->getRow($i))>0)
    {
        $data[$i] = $csv->getRow($i);
        $words[$i] = explode(" ",$data[$i][$col]);
        getWords($words[$i]);
        $i++;
    }
    $result = array_count_values($selectedColumn);
    arsort($result);
        include 'view/form.html.php';
}else
{
    include 'view/form.html.php';
}
function getWords($words)
{
    global $selectedColumn;
    global $num;
    for($i=0;$i<sizeof($words);$i++)
    {
        if((!is_numeric($words[$i])) && (strlen($words[$i])>4))
        {
            $selectedColumn[$num] = $words[$i];  //strtolower($words[$i]) (za spustanje svih slova ako bude ova opcija potrebno je i ocistitit slova tima Z S sa kvacicama
            $num++;
        }
    }
}
