<?php session_start();
if (!isset($_SESSION['tagsCount'])) {
    $_SESSION['tagsCount'] = [];
}
?>
    <form>
        <div>
            <label for="">Enter Tags:</label>
        </div>
        <br>
        <div>
            <input type="text" name="input">
            <input type="submit" name="add" value="Submit">
            <a href="02.MostFrequentTag.php?clear=true">
                <button type="button">Clear</button>
            </a>
        </div>
    </form>

<?php
if (isset($_GET['add']) && isset($_GET['input'])) {
    $input = $_GET['input'];
    $input = explode(", ", $input);

    foreach ($input as $tag) {
        if (array_key_exists($tag, $_SESSION['tagsCount'])) {
            $_SESSION['tagsCount'][$tag]++;
        } else {
            $_SESSION['tagsCount'][$tag] = 1;
        }
    }

    arsort($_SESSION['tagsCount']);

    foreach ($_SESSION['tagsCount'] as $key => $value) {
        echo $key . " : " . $value . " times" . "<br>";
    }

    $mostFrequentTag = key($_SESSION['tagsCount']);
    echo "<br>Most frequent tag is: " . $mostFrequentTag;
} else {
    $_SESSION['tagsCount'] = [];
}


