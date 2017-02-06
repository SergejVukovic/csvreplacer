<h3>Number of words found:<?php echo count($result); ?></h3>
<table class="table hover-table">
    <tr>
        <th>Word</th>
        <th>Counter</th>
        <th>Replace</th>
        <th>New Word</th>
    </tr>
    <?php $k=0; foreach ($result as $word=>$count):?>
    <tr>
        <form method="POST" action="controllers/wordReplacer.php">
            <?php echo "<td>".$word."</td><input type='hidden' name='word' value='$word'>" ?>
            <?php echo "<td>".$count."</td><input type='hidden' name='count' value='$count'>" ?>
            <?php echo "<td><input type='checkbox' name='check_list[]' value='$word'></td>" ?>
            <?php echo "<td><input type='text' name='replace_words[]'></td>" ?>
            <input type="hidden" name="filelocation" value="<?php echo $fileLocation?>">
            <?php if($k == 100){break;} $k++; ?>
            <?php endforeach; ?>
    </tr>
    <input type="hidden" name="col1" value=<?php echo $col ?>>
    <input type="hidden" name="col2" value=<?php echo $col2 ?>>
    <?php if($fileUploaded == null): ?>
        <lable>Input the name of the new file:</lable><input type="text" name="newfilename">
    <?php endif; ?>
    <input type="submit" name="submit" Value="Replace">
</table>