<?php
set_time_limit ('30000');
include '../addons/DataSource.php';
include '../addons/helperFunctions.php';
if(isset($_POST['submit'])) {
    if (!empty($_POST['check_list']) && isset($_POST["newfilename"])) {
        require '../DB/db.php';
        $searchWords = $_POST['check_list'];
        $replaceCol = $_POST["col1"];
        $replaceCol2 = $_POST["col2"];
        $newFileName = $_POST["newfilename"];
        $fileLocation = $_POST['filelocation'];
        $i = 0;
        include '../model/wordSearch.php';
        $res = dbSearch($searchWords, $link);
        $Oldcsv = new File_CSV_DataSource();
        $Oldcsv->load("../".$fileLocation);
        $newFile = fopen("../csv/download/".$newFileName.".csv", "w+");
        while (count($Oldcsv->getRow($i))>0)
        {
            $oldRow[$i] = $Oldcsv->getRow($i);
            $oldRow[$i] = replaceWordsInColumn($oldRow[$i],$res,$replaceCol);
            $oldRow[$i] = replaceWordsInColumn($oldRow[$i],$res,$replaceCol2);
            fputcsv($newFile,$oldRow[$i],',');
            $i++;
        }
        fclose($newFile);
        include '../view/download.html.php';
    }else
    {
        echo "<b>Please Select Atleast One Option.</b>";
    }
}