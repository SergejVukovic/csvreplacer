<?php
ini_set('display_errors', 1); error_reporting(~0);
set_time_limit ('30000');
include '../addons/DataSource.php';
if(isset($_POST['submit'])) {
    if (!empty($_POST['check_list']) && isset($_POST["newfilename"])) {
        require '../DB/db.php';
        $searchWords = $_POST['check_list'];
        $replaceCol = $_POST["col1"];
        $replaceCol2 = $_POST["col2"];
        $newFileName = $_POST["newfilename"];
        $fileLocation = $_POST['filelocation'];
        $i = 0;
        $oldRow = array();
        $oldCounter = 0;
        include '../model/wordSearch.php';
        $res = dbSearch($searchWords, $link);
        $Oldcsv = new File_CSV_DataSource();
        $Oldcsv->load("../".$fileLocation);
        $newFile = fopen("../csv/download/".$newFileName.".csv", "w+");
        while (count($Oldcsv->getRow($i))>0)
        {
            $oldRow[$i] = $Oldcsv->getRow($i);
            $oldRow[$i] = replaceWordsInColumn($oldRow[$i],$res,$replaceCol);
            $oldRow[$i] = replaceWordsInColumn2($oldRow[$i],$res,$replaceCol2);
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
function replaceWordsInColumn($stringArray,$dbresoult,$replaceCol)
{
    foreach ($dbresoult as $resoult)
    {
        $stringArray[$replaceCol] = cleanAccentedLetters($stringArray[$replaceCol]);
        $stringArray[$replaceCol] = str_replace($resoult["source"],$resoult["target"],$stringArray[$replaceCol]);
    }
    return $stringArray;
}

function replaceWordsInColumn2($stringArray,$dbresoult,$replaceCol2)
{
    foreach ($dbresoult as $resoult)
    {
        $stringArray[$replaceCol2] = cleanAccentedLetters($stringArray[$replaceCol2]);
        $stringArray[$replaceCol2] = str_replace($resoult["source"],$resoult["target"],$stringArray[$replaceCol2]);
    }
    return $stringArray;
}

function cleanAccentedLetters($word)
{
    $word = strtolower($word);
    $unwanted_array = array(    'Š'=>'s', 'š'=>'s', 'Ž'=>'z', 'ž'=>'z', 'À'=>'a', 'Á'=>'a', 'Â'=>'a', 'Ã'=>'a', 'Ä'=>'a', 'Å'=>'a', 'Æ'=>'a', 'Ç'=>'c', 'È'=>'e', 'É'=>'e',
        'Ê'=>'e', 'Ë'=>'e', 'Ì'=>'i', 'Í'=>'i', 'Î'=>'i', 'Ï'=>'i', 'Ñ'=>'n', 'Ò'=>'o', 'Ó'=>'o', 'Ô'=>'o', 'Õ'=>'o', 'Ö'=>'o', 'Ø'=>'o', 'Ù'=>'u',
        'Ú'=>'u', 'Û'=>'u', 'Ü'=>'u', 'Ý'=>'y', 'Þ'=>'b', 'ß'=>'ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','Č'=>'C','č'=>'c' );
    $str = strtr( $word, $unwanted_array );
    return $str;
}