<!DOCTYPE html>
<html>
<head>
    <title>01.Print Tags</title>
    <meta charset="utf-8">
</head>
<body>
<form method="GET">
    <div>
        <label for="">Enter Tags:</label>
    </div>
    <br>
    <div>
        <input type="text" name="text">
        <input type="submit" name="submit" value="Submit">
    </div>
    <br>
</form>

<?php
if (!isset($_GET['submit']) && !isset($_GET['text'])) {
    throw new Exception("Data is not filled.");
}
$input = explode(", ", $_GET['text']);

for ($i = 0; $i < count($input); $i++) {
    echo $i . ":" . htmlentities($input[$i]) . "<br>";
}
?>
</body>
</html>

