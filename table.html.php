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
        <?php echo "<td>".$word."</td>" ?>
        <?php echo "<td>".$count."</td>" ?>
        <?php echo "<td> <button>Click me!</button></td>" ?>
        <?php endforeach; ?>
    </tr>
</table>

</body>
</html>