<html>
<head>
    <title>Download</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="col-md-4">
    <form action="../controllers/download.php" method="post">
        <label>Press button to download your new file!</label>
        <input type="hidden" name="filename" value="<?php echo $newFileName ?>">
        <button type="submit" class="btn btn-success">Download</button>
    </form>
</div>
</body>
</html>