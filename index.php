<?php
ini_set('upload_max_filesize',2048);
ini_set('display_errors', 1); error_reporting(~0);
include "addons/DataSource.php";
$fileUploaded = null;
if ( isset($_POST["submit"]) ) {
    if ( isset($_FILES["file"])) {
        //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {
            //Print file details
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
                //Store file in directory "upload" with the name of "uploaded_file.txt"
                $storagename = $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"], "csv/upload/" . $storagename);
                echo "Stored in: " . "csv/upload/" . $_FILES["file"]["name"] . "<br />";
                $fileUploaded = true;
                $fileLocation = "csv/upload/" . $_FILES["file"]["name"];
        }
    } else {
        $fileUploaded = false;
        echo "No file selected <br />";
    }
}
if(isset($_POST["column1"]) && is_numeric($_POST["column1"]) && isset($_POST["filelocation"])) {
    $col = $_POST["column1"];
    $col2 = $_POST["column2"];
    $fileLocation = $_POST["filelocation"];
    $csv = new File_CSV_DataSource();
    $i = 0;
    $num=0;
    $data=array();
    $selectedColumn = array();
    $csv->load($fileLocation);
    while(count($csv->getRow($i))>0)
    {
        $data[$i] = $csv->getRow($i);
        $words[$i] = explode(" ",$data[$i][$col]);
        $second[$i] = explode(" ",$data[$i][$col2]);
        getWords($words[$i]);
        getWords($second[$i]);
        $i++;
    }
    $result = array_count_values(array_map('strtolower', $selectedColumn));
    arsort($result);
    global $fileUploaded;
}
include 'view/form.html.php';
function getWords($words)
{
    global $selectedColumn;
    global $num;
    for($i=0;$i<sizeof($words);$i++)
    {
        if((!is_numeric($words[$i])) && (strlen($words[$i])>4))
        {

            $words[$i] = str_replace(['.',','],"",$words[$i]);
            $words[$i] = cleanAccentedLetters($words[$i]);
            $selectedColumn[$num] = $words[$i];
            $num++;
        }
    }
}
function cleanAccentedLetters($word)
{
    $unwanted_array = array(    'Š'=>'s', 'š'=>'s', 'Ž'=>'z', 'ž'=>'z', 'À'=>'a', 'Á'=>'a', 'Â'=>'a', 'Ã'=>'a', 'Ä'=>'a', 'Å'=>'a', 'Æ'=>'a', 'Ç'=>'c', 'È'=>'e', 'É'=>'e',
        'Ê'=>'e', 'Ë'=>'e', 'Ì'=>'i', 'Í'=>'i', 'Î'=>'i', 'Ï'=>'i', 'Ñ'=>'n', 'Ò'=>'o', 'Ó'=>'o', 'Ô'=>'o', 'Õ'=>'o', 'Ö'=>'o', 'Ø'=>'o', 'Ù'=>'u',
        'Ú'=>'u', 'Û'=>'u', 'Ü'=>'u', 'Ý'=>'y', 'Þ'=>'b', 'ß'=>'ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','Č'=>'C','č'=>'c' );
    $str = strtr( $word, $unwanted_array );
    return $str;
}