<?php

function upload ($file)
{
    global $fileUploaded;
    $storagename = $file['name'];
    move_uploaded_file( $file['tmp_name'], "csv/upload/" . $storagename);
    $fileLocation = "csv/upload/" .  $file['name'];
    $fileUploaded = true;
    return $fileLocation;
}
function getWords($row)
{
    global $selectedColumn;
    global $num;
    for($i=0;$i<sizeof($row);$i++)
    {
        if((!is_numeric($row[$i])) && (strlen($row[$i])>4))
        {

            $row[$i] = str_replace(['.',','],"",$row[$i]);
            $row[$i] = cleanAccentedLetters($row[$i]);
            $selectedColumn[$num] = $row[$i];
            $num++;
        }
    }
}
function cleanAccentedLetters($word)
{
    $unwanted_array = array('Š'=>'s', 'š'=>'s', 'Ž'=>'z', 'ž'=>'z', 'À'=>'a', 'Á'=>'a', 'Â'=>'a', 'Ã'=>'a', 'Ä'=>'a', 'Å'=>'a', 'Æ'=>'a', 'Ç'=>'c', 'È'=>'e', 'É'=>'e',
        'Ê'=>'e', 'Ë'=>'e', 'Ì'=>'i', 'Í'=>'i', 'Î'=>'i', 'Ï'=>'i', 'Ñ'=>'n', 'Ò'=>'o', 'Ó'=>'o', 'Ô'=>'o', 'Õ'=>'o', 'Ö'=>'o', 'Ø'=>'o', 'Ù'=>'u',
        'Ú'=>'u', 'Û'=>'u', 'Ü'=>'u', 'Ý'=>'y', 'Þ'=>'b', 'ß'=>'ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','Č'=>'C','č'=>'c' );
    $str = strtr( $word, $unwanted_array );
    return $str;
}
function replaceWordsInColumn ($row,$searchWord,$replaceWords,$replaceCol)
{
    for($i = 0;$i<count($searchWord);$i++)
    {
        $row[$replaceCol] = strtolower($row[$replaceCol]);
        $row[$replaceCol] = cleanAccentedLetters($row[$replaceCol]);
        $row[$replaceCol] = str_replace($searchWord[$i],$replaceWords[$i],$row[$replaceCol]);
    }
    return $row;
}