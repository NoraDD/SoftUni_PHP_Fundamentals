<?php
$input = 145;

if ($input < 100) {
    echo 'no';
} else {
    $result = '';
    for ($i = 102; $i <= $input; $i++) {
        if ($i < 1000) {
            $firstDigit = (int)($i % 10);
            $secondDigit = (int)(($i / 10) % 10);
            $thirdDigit = (int)($i / 100);

            if ($firstDigit != $secondDigit && $firstDigit != $thirdDigit && $secondDigit != $thirdDigit) {
                $result = $result . $i . ', ';
            }
        }
    }
    echo rtrim($result, ', ');
}
