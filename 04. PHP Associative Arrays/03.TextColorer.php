<form>
    <textarea name="input" id="" cols="30" rows="3" required></textarea><br>
    <input type="submit" name="submit-textarea" value="Color text">
</form>
<?php
if (isset($_GET['input'])) {
    $str = trim($_GET['input']);
    $strWithoutEmptySpaces = preg_replace('/\s+/', '', $str);
    $strLength = strlen($strWithoutEmptySpaces);

    for ($i = 0; $i < $strLength; $i++) {
        if ((ord($strWithoutEmptySpaces[$i])) % 2 == 0) {
            echo "<font color='red'>{$strWithoutEmptySpaces[$i]} </font>";
        } else {
            echo "<font color='blue'>{$strWithoutEmptySpaces[$i]} </font>";
        }
    }
}

