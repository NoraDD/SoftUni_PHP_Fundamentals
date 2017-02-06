<?php
$largestNum = 0;

while ($number = intval(fgets(STDIN))) {
    if ($number > $largestNum) {
        $largestNum = $number;
    }
}
echo "Max: $largestNum";