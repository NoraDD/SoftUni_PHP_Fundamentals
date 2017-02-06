<!DOCTYPE html>
<html>
<head>
    <title>09.Square Root Sum</title>
</head>
<body>
<table border="1">
    <thead>
    <tr>
        <th>Number</th>
        <th>Square</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sum = 0;
    for ($number = 0; $number <= 100; $number+=2) {
        echo "<tr><td>$number</td><td>" . round(sqrt($number),2) . "</td></tr>";
        $sum += sqrt($number);
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td><strong>Total:</strong></td>
        <td><?php echo round($sum, 2)?></td>
    </tr>
    </tfoot>
</table>
</body>
</html>

