<html>
<head>
    <title>Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php if(($fileUploaded == false) &&(!isset($result))){include 'upload.html.php';}?>
<?php if(isset($fileUploaded) && $fileUploaded != false){include 'SearchForm.html.php';} ?>
<?php if(isset($result)){include 'wordsTable.html.php';} ?>
</body>
</html>