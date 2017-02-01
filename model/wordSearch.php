<?php
function dbSearch($searchwords,$link)
{
    $search = '';
    foreach ($searchwords as $searchword)
    {
        $search .= "'".$searchword."',";
    }
    $search = rtrim($search,",");
    $sql = 'SELECT * FROM massr WHERE source IN ('.$search.');';
    $result = mysqli_query($link, $sql);
    $finalres = array();
    if (!$result) {
        return false;
    }
    while ($row = mysqli_fetch_array($result)) {
        $finalres[] = array('source' => $row['source'],'target'=>$row['target']);
    }
    return $finalres;
}