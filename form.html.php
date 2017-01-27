<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
<h3>Number of unique word:<?php if($uniqueCounter > 1) { echo $uniqueCounter; }?></h3>
<form action="" method="post">
    <label>Enter the name of column you want to search:</label>
    <input type="text" name="column">
    <button stype="submit">Search</button>
</form>

</body>
</html>