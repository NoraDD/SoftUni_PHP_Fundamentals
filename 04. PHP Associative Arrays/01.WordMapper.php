<!DOCTYPE html>
<html>
<head>
    <title>01.Word Mapping</title>
</head>
<body>
<form method="get">
    <textarea cols="30" rows="3" name="input" title="text" required></textarea>
    <br>
    <input type="submit" name="countWords" value="Count Words">
</form>
<?php
if (isset($_GET['input'])) {
    $stringInput = strtolower($_GET['input']);
    $inputArrOnlyWords = str_word_count($stringInput, 1); //returns an array containing all the words found inside the string.//
    $resultArr = [];

    foreach ($inputArrOnlyWords as $key => $value) {
        if (!array_key_exists($value, $resultArr)) {
            $resultArr[$value] = 1;
        } else {
            $resultArr[$value] += 1;
        }

    }

    echo "<table border='2'>";
    foreach ($resultArr as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>