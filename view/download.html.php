<html>
<head>
    <title>Search</title>
</head>
<body>
    <form action="../controllers/download.php" method="post">
        <label>Press button to download your new file!</label>
        <input type="hidden" name="filename" value="<?php echo $newFileName ?>">
        <button type="submit">Download</button>
    </form>
</body>
</html>