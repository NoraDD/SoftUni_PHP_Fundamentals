<?php
$numToDivideTo = trim(fgets(STDIN));

try {
    echo division($numToDivideTo) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "Finally is always executed";
}

function division($x) {
    if (!is_numeric($x)) {
        throw new Exception(('Wrong type'));
    } else if ($x == 0) {
        throw new Exception(('Division by zero.'));
    }
    return 1 / $x;
}

