<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
<h3>Number of unique word:<?php if($uniqueCounter > 1) { echo $uniqueCounter; }?></h3>
<form action="" method="post">
    <label>Enter the name of column you want to search:</label><br>
    <input type="text" name="column">
    <br><label>How many rows do you want to search:</label><br>
    <input type="number" name="limit">
    <button stype="submit">Search</button>
</form>

        <?php foreach ($collection as $word): ?>

            <?php echo $word."<br>"; ?>

        <?php endforeach; ?>

</body>
</html>