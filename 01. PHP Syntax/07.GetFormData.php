<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 7. Form Data</title>
</head>
<body>
<form action="#" method="GET">
    <div><input type="text" name="name" required placeholder="Name..."></div>
    <div><input type="text" name="age" required placeholder="Age..."></div>
    <div><input type="radio" name="gender" id="male" value="male" required> Male</div>
    <div><input type="radio" name="gender" id="female" value="female"> Female</div>
    <input type="submit" value="Submit">
</form>
<?php
if(isset($_GET['name']) && !empty($_GET['name'])) {
    echo  "My name is {$_GET['name']}. I am {$_GET['age']} years old. I am {$_GET['gender']}.";
}
?>
</body>
</html>