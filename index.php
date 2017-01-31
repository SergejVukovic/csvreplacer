<?php
ini_set('max_execution_time',3000);

if(isset($_POST["column"]) && is_numeric($_POST["column"]))
{
   $col = $_POST["column"];
    $row = array();
    $counter = 0;
    $num=0;
    $collection = array();
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
    include 'table.html.php';
}else
{
    $error = "Please enter which column you want to search!";
    include 'form.html.php';
}

function getWords($words)
{
    global $collection;
    global $num;
    for($i=0;$i<sizeof($words);$i++)
    {
        if((!is_numeric($words[$i])) && (strlen($words[$i])>4))
        {
            $collection[$num] = $words[$i];
            $num++;
        }
    }
}

