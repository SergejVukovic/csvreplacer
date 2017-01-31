<?php
function dbSearch($searchword,$link)
{
    $sql = 'SELECT * FROM  `massr` WHERE source ="' . $searchword . '";';
    $result = mysqli_query($link, $sql);
    $finalres = array();
    if (!$result) {
        $error = 'Error fetching list of authors.';
        return false;
    }
    while ($row = mysqli_fetch_array($result)) {
        $finalres[] = array('source' => $row['source'],'target'=>$row['target']);
    }
    return $finalres;
}