<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
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

</body>
</html>