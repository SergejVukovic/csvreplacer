<?php
ini_set('max_execution_time',3000);

if(isset($_POST["column"]) && is_numeric($_POST["column"]))
{
    $col = $_POST["column"];
    $row = array();
    $counter = 0;
    $num=0;
    $collection = array();
    $file = fopen("csv/ogasi.csv","r");
    while(! feof($file))
    {
        $row[$counter] = fgetcsv($file)[$col];
        $words[$counter] = explode(" ",$row[$counter]);
        getWords($words[$counter]);
        $counter++;
    }
    fclose($file);
    $result = array_count_values($collection);
    arsort($result);
    include 'view/form.html.php';
}else
{
    include 'view/form.html.php';
}
function getWords($words)
{
    global $collection;
    global $num;
    for($i=0;$i<sizeof($words);$i++)
    {
        if((!is_numeric($words[$i])) && (strlen($words[$i])>4))
        {
            $words[$i]=str_replace(array(',','.'),"",$words[$i]);
            $collection[$num] = $words[$i];  //strtolower($words[$i]) (za spustanje svih slova ako bude ova opcija potrebno je i ocistitit slova tima Z S sa kvacicama
            $num++;
        }
    }
}

