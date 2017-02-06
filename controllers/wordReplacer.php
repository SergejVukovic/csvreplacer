<?php
set_time_limit ('30000');
include '../addons/DataSource.php';
include '../addons/helperFunctions.php';
if(isset($_POST['submit'])) {
    if (!empty($_POST['check_list']) && isset($_POST["newfilename"])) {
        $searchWords = $_POST['check_list'];
        $replaceWords = $_POST['replace_words'];
        $replaceCol = $_POST["col1"];
        $replaceCol2 = $_POST["col2"];
        $newFileName = $_POST["newfilename"];
        $fileLocation = $_POST['filelocation'];
        $i = 0;
        $Oldcsv = new File_CSV_DataSource();
        $Oldcsv->load("../".$fileLocation);
        $newFile = fopen("../csv/download/".$newFileName.".csv", "w+");
        while (count($Oldcsv->getRow($i))>0)
        {
            $oldRow[$i] = $Oldcsv->getRow($i);
            $oldRow[$i] = replaceWordsInColumn($oldRow[$i],$searchWords,$replaceWords,$replaceCol);
            $oldRow[$i] = replaceWordsInColumn($oldRow[$i],$searchWords,$replaceWords,$replaceCol2);
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