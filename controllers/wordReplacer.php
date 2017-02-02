<?php
ini_set('display_errors', 1); error_reporting(~0);
include '../addons/DataSource.php';
if(isset($_POST['submit'])) {
    if (!empty($_POST['check_list'])) {
        require '../DB/db.php';
        $searchWords = $_POST['check_list'];
        $replaceCol = $_POST["col"];
        $i = 0;
        $oldRow = array();
        $oldCounter = 0;
        include '../model/wordSearch.php';
        $res = dbSearch($searchWords, $link);
        $Oldcsv = new File_CSV_DataSource();
        $Oldcsv->load('../csv/ogasi.csv');
        $newFile = fopen("../csv/LastHope.csv", "w+");
        while (count($Oldcsv->getRow($i))>0)
        {
            $oldRow[$i] = $Oldcsv->getRow($i);
            $oldRow[$i] = replaceWord($oldRow[$i],$res,$replaceCol);
            fputcsv($newFile,$oldRow[$i],',');
            $i++;
        }
        fclose($newFile);
    }else
    {
        echo "<b>Please Select Atleast One Option.</b>";
    }
}
function replaceWord($stringArray,$dbresoult,$replaceCol)
{
    foreach ($dbresoult as $resoult)
    {
       $stringArray[$replaceCol] = str_replace($resoult["source"],$resoult["target"],$stringArray[$replaceCol]);
    }
    return $stringArray;
}