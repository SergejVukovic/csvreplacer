<?php
if(isset($_POST['submit'])) {
    if (!empty($_POST['check_list'])) {
        require '../DB/db.php';
        $searchWords = $_POST['check_list'];
        $replaceCol = $_POST["col"];
        $col = 0;
        $oldRow = array();
        $oldCounter = 0;
        include '../model/wordSearch.php';
        $res = dbSearch($searchWords, $link);
        $oldFile = fopen("D:/xampp2/htdocs/readexls/csv/ogasinov.csv", "r");
        $newFile = fopen("D:/xampp2/htdocs/readexls/csv/testing2.csv", "w+");
        while (!feof($oldFile)) {
            $oldRow[$oldCounter] = fgetcsv($oldFile)[0];
            $oldRow[$oldCounter] = str_replace(","," ",$oldRow[$oldCounter]);
            $oldRow[$oldCounter] = replaceWord($oldRow[$oldCounter], $res);
            fputs($newFile,$oldRow[$oldCounter]."\n");
            $oldCounter++;
            if($replaceCol<17)
                $replaceCol++;
        }
        fclose($oldFile);
        fclose($newFile);
    }else
    {
        echo "<b>Please Select Atleast One Option.</b>";
    }
}
function replaceWord($string,$dbresoult)
{

    foreach ($dbresoult as $resoult)
    {
       $string = str_replace($resoult["source"],$resoult["target"],$string);
    }
    return $string;
}


