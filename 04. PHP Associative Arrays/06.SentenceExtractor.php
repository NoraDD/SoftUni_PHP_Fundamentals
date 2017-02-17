<?php
$text=trim(fgets(STDIN));
$word=trim(fgets(STDIN));
$sentence = "";
$WordsInSentence = [];

for ($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] == "." || $text[$i] == "?" || $text[$i] == "!") {
        $sentence .= $text[$i];
        $WordsInSentence = preg_split("/([^a-zA-Z])/", $sentence , -1 , PREG_SPLIT_NO_EMPTY);
        if (in_array($word,$WordsInSentence)) {

            echo "$sentence\n";
        }
        $sentence = "";
    }
    else {
        $sentence .= $text[$i];
    }
}
