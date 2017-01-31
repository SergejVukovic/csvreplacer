<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
<h3><?php if(isset($error)){echo $error;}?></h3>
<h3>Number of unique word:</h3>
<form action="" method="post">
    <label>Enter the number of column you want to search:</label><br>
    <input type="text" name="column">
    <button stype="submit">Search</button>
    <p>hint(16,384 columns represented as letters from A - XFD (last column).)</p>
</form>
</body>
</html>