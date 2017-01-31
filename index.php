<?php
ini_set('max_execution_time',3000);


$col = 0;
$row = array();
$counter = 0;
$collection = array();
$compare = array();
$file = fopen("ogasi.csv","r");

while(! feof($file))
{
    $row[$counter] = fgetcsv($file)[$col];
    $words[$counter] = explode(" ",$row[$counter]);
    cheker($words[$counter]);
    $counter++;
}
fclose($file);
var_dump($collection[0]);
function cheker($words)
{
   global $collection;
    for($i=0;$i<sizeof($words);$i++)
    {
        if((!is_numeric($words[$i])) && (strlen($words[$i])>3))
        {
            $collection[$i] = array('key'=>$i,'value'=>$words[$i]);
        }
    }
}

function addWords($collection)
{
    $repeater =0;
    global $compare;
        for($i=0;$i<sizeof($collection);$i++)
        {
            for ($j=$i+1;$j<sizeof($collection);$j++)
            {
                if($collection[$i] == $collection[$j])
                {
                    array_push($compare,[$collection[$i]=>$repeater++]);
                }
            }
        }
}

function clean($string) {
    $string = str_replace(' ', '-', $string);
    $string = str_replace('.', '', $string);
    $string=rtrim($string,',');
    $string = str_replace('/[0-9]+/','',$string);
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}