<h3><?php if(isset($error)){echo $error;}?></h3>
<div class="col-md-2">
    <form action="" method="post">
        <label>Enter which 2 columns you want to search:</label><br>
        <label>First Column</label>
        <input type="text" name="column1" class="form-control">
        <label>Second Column:</label>
        <input type="text" name="column2" class="form-control">
            <input type="hidden" name="filelocation" value="<?php echo $fileLocation ?>">
            <input type="hidden" name="fileuploaded" value=true>
        <br/>
        <button type="submit" class="btn btn-success">Search</button>
        <p class="has-warning">hint:16,384 columns represented as letters from A - XFD (last column).</p>
    </form>
</div>