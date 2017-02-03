<html>
<head>
    <title>Search</title>
</head>
<body>
<?php if($fileUploaded == false): ?>
<table width="600">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

        <tr>
            <td width="20%">Select file</td>
            <td width="80%"><input type="file" name="file" id="file" /></td>
        </tr>

        <tr>
            <td>Submit</td>
            <td><input type="submit" name="submit" /></td>
        </tr>
    </form>
</table>
<?php endif; ?>
<?php if(isset($fileUploaded) && $fileUploaded != false): ?>
<h3><?php if(isset($error)){echo $error;}?></h3>
<form action="" method="post">
    <label>Enter which 2 columns you want to search:</label><br>
   <label>First Column</label><input type="text" name="column1"><label>Second Column:</label><input type="text" name="column2">
    <input type="hidden" name="filelocation" value="<?php echo $fileLocation ?>">
    <input type="hidden" name="fileuploaded" value=true>
    <button stype="submit">Search</button>
    <p>hint(16,384 columns represented as letters from A - XFD (last column).)</p>
</form>
<?php endif; ?>
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
            <input type="hidden" name="filelocation" value="<?php echo $fileLocation?>">
        <?php endforeach; ?>
    </tr>
            <input type="hidden" name="col1" value=<?php echo $col ?>>
            <input type="hidden" name="col2" value=<?php echo $col2 ?>>
            <?php if($fileUploaded == null): ?>
                <lable>Input the name of the new file:</lable><input type="text" name="newfilename">
            <?php endif; ?>
            <input type="submit" name="submit" Value="Replace">
        </table>
</table>
<?php endif; ?>
<table>

</body>
</html>