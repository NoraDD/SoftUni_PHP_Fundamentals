<!DOCTYPE html>
<html>
<head>
    <title>10.Car Randomizer</title>
</head>
<body>
<form action="" method="get">
    <label>Enter cars</label>
    <input type="text" name="cars" required>
    <input type="submit" name="submit" value="Show result">
</form>

<?php
if (isset($_GET['submit']) && !empty($_GET['cars'])) {
    $inputArea = $_GET['cars'];
    $new = explode(', ', $inputArea);
    $color = array("red", "black", "green", "yellow", "pink");
}
?>
<?php if (isset($_GET['submit']) && !empty($_GET['cars'])): ?>
<table border="1">
    <thead>
    <th>Car</th>
    <th>Color</th>
    <th>Count</th>
    </thead>
    <tbody>
    <?php foreach ($new as $car): ?>
        <tr>
            <td><?= htmlentities($car); ?></td>
            <td><?= $color[array_rand($color, 1)]; ?></td>
            <td><?= rand(1, 5); ?></td>
        </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>
