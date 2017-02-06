<h3><?php if(isset($error)){echo $error;}?></h3>
<form action="?" method="post">
    <label>Enter which 2 columns you want to search:</label><br>
    <label>First Column</label><input type="text" name="column1"><label>Second Column:</label><input type="text" name="column2">
    <input type="hidden" name="filelocation" value="<?php echo $fileLocation ?>">
    <input type="hidden" name="fileuploaded" value=true>
    <button type="submit">Search</button>
    <p>hint(16,384 columns represented as letters from A - XFD (last column).)</p>
</form>