<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
<h3><?php if(isset($error)){echo $error;}?></h3>
<form action="" method="post">
    <label>Enter the number of column you want to search:</label><br>
    <input type="text" name="column">
    <button stype="submit">Search</button>
    <p>hint(16,384 columns represented as letters from A - XFD (last column).)</p>
</form>
<?php if(isset($result)): ?>
<h3>Number of words found:<?php echo count($result); ?></h3>

<table>
    <tr>
        <th>Word</th>
        <th>Counter</th>
        <th>Replace</th>
    </tr>

    <?php foreach ($result as $word=>$count):?>
    <tr>
        <form method="GET" action="">
            <?php echo "<td>".$word."</td><input type='hidden' name='word' value='$word'>" ?>
            <?php echo "<td>".$count."</td><input type='hidden' name='count' value='$count'>" ?>
            <?php echo "<td> <input type='submit' value='Replace this word'></td>" ?>
        </form>
        <?php endforeach; ?>
    </tr>

</table>
<?php endif; ?>

<?php foreach ($res as $row): ?>
<? echo $row['target']; ?>
<?php endforeach; ?>
</body>
</html>