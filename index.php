<?php
ini_set('max_execution_time',3000);


$col = 0;
$row = array();
$counter = 0;
$collection = array();
$file = fopen("ogasi.csv","r");

while(! feof($file))
{
    $row[$counter] = fgetcsv($file)[$col];
    $words[$counter] = explode(" ",$row[$counter]);
    cheker($words[$counter]);
    array_push($collection,$words[$counter]);
    $counter++;
}
fclose($file);



function cheker($words)
{
    global $collection;
    for ($i=0;$i<sizeof($words);$i++)
    {
        if(!(is_numeric($words[$i])) && sizeof($words[$i]>2))
        {
            if(sizeof($collection)<1)
            {
                array_push($collection)
            }
            for ($j=0;$j<sizeof($collection);$j++)
            {

            }
        }
        echo "<br>";
    }

//    global $collection;
//    $words = explode(" ",$words);
//    if(sizeof($collection)<0){
//        array_push($collection,$words[0]);
//    }
//    for ($i=1;$i<sizeof($words);$i++)
//    {
//        for ($j=0;$j<sizeof($collection);$j++)
//            {
//                if(sizeof($words[$i])>3)
//                {
//                    if($collection[$j] == $words[$i])
//                    {
//                        return false;
//                    }
//                    array_push($collection,$words[$i]);
//                }
//            }
//    }
}

function clean($string) {
    $string = str_replace(' ', '-', $string);
    $string = str_replace('.', '', $string);
    $string=rtrim($string,',');
    $string = str_replace('/[0-9]+/','',$string);
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}