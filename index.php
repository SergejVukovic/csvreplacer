<?php
include "addons/DataSource.php";
include "addons/helperFunctions.php";
$num=0;
$fileUploaded = null;
if ( isset($_POST["submit"]) ) {
    if ( isset($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {
           $fileLocation = upload($_FILES["file"]);
        }
    } else {
        $fileUploaded = false;
        echo "No file selected <br />";
    }
}
if((isset($_POST['column2']) && is_numeric($_POST['column2']))&&(isset($_POST["column1"]) && is_numeric($_POST["column1"])) && isset($_POST["filelocation"])) {
    $col = $_POST["column1"];
    $col2 = $_POST["column2"];
    $fileLocation = $_POST["filelocation"];
    $csv = new File_CSV_DataSource();
    $i = 0;
    $row=array();
    $selectedColumn = array();
    $csv->load($fileLocation);
    while(count($csv->getRow($i))>0)
    {
        $row[$i] = $csv->getRow($i);
        $firstColumn[$i] = explode(" ",$row[$i][$col]);
        $secondColumn[$i] = explode(" ",$row[$i][$col2]);
        getWords($firstColumn[$i]);
        getWords($secondColumn[$i]);
        $i++;
    }
    $result = array_count_values(array_map('strtolower', $selectedColumn));
    arsort($result);
}
include 'view/form.html.php';