<?php
ini_set('max_execution_time',3000);


$col = 1;
$row = array();
$counter = 0;
$num=0;
$collection = array();
$keywords = array();
$file = fopen("ogasi.csv","r");

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

foreach($result as $word => $count)
{
    echo $word." was found ".$count." time(s)<br/>";
}
function getWords($words)
{
    global $collection;
    global $num;
    for($i=0;$i<sizeof($words);$i++)
    {
        if((!is_numeric($words[$i])) && (strlen($words[$i])>3))
        {
            $collection[$num] = $words[$i];
            $num++;
        }
    }
}

