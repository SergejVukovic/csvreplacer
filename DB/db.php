<?php
$link = mysqli_connect('localhost', 'massrp', 'jdD58Mvjfdl3');
if (!$link)
{
    $error = 'Unable to connect to the database server.';
    return false;
}

if (!mysqli_set_charset($link, 'utf8'))
{
    $output = 'Unable to set database connection encoding.';
    return false;
}

if (!mysqli_select_db($link, 'massreplace_db'))
{
    $error = 'Unable to locate database.';
    return false;
}

