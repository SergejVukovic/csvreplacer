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

    <form>

    </form>

<table>
    <tr>
        <th>Word</th>
        <th>Counter</th>
        <th>Replace</th>
    </tr>
    <?php foreach ($result as $word=>$count):?>
    <tr>
        <form method="POST" action="controllers/wordReplacer.php">
            <?php echo "<td>".$word."</td><input type='hidden' name='word' value='$word'>" ?>
            <?php echo "<td>".$count."</td><input type='hidden' name='count' value='$count'>" ?>
            <?php echo "<td> <input type='checkbox' name='check_list[]' value='$word'></td>" ?>
        <?php endforeach; ?>
    </tr>
            <input type="hidden" name="col" value=<?php echo $col ?>>
            <input type="submit" name="submit" Value="Replace">
        </table>
</table>
<?php endif; ?>

</body>
</html>