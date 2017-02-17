<?php
declare(strict_types = 1);

$strInput = trim(fgets(STDIN));
echo isPalindrome($strInput);

function isPalindrome($str) {
    for ($i = 0; $i < strlen($str) / 2; $i++) {
        if ($str[$i] != $str[strlen($str) - $i - 1]) {
            return "false";
        }
    }
    return "true";
}
