<!DOCTYPE html>
<html>
<head>
    <title>05.Text Filter</title>
    <meta charset="utf-8">
</head>
<body>
<form method="GET">
    <input type="text" name="text">
    <input type="text" name="banlist">
    <input type="submit">
</form>
<?php
if (isset($_GET['text']) && isset($_GET['banlist'])) {
    $text = $_GET['text'];
    $banlist = $_GET['banlist'];

    $banlist = explode(', ', $banlist);

    foreach ($banlist as $banword) {
       $asteriks = '';
        for ($i = 0; $i < strlen($banword); $i++) {
            $asteriks.= '*';
        }
        $text = str_replace($banword, $asteriks, $text);
    }

    echo $text;
}
?>
</body>
</html>