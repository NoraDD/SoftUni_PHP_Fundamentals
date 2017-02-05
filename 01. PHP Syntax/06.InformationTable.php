<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 6. HTML Table</title>
</head>
<body>
<?php
$name = 'Gosho';
$phoneNumber = '0882-321-423';
$age = 24;
$address = 'Hadji Dimityr';
?>
<table border="1">
    <tr>
        <td bgcolor="orange" align="left" >Name</td>
        <td align="right"><?php echo $name;?></td>
    </tr>
    <tr>
        <td bgcolor="orange" align="left">Phone number</td>
        <td align="right"><?php echo $phoneNumber;?></td>
    </tr>
    <tr>
        <td bgcolor="orange" align="left">Age</td>
        <td align="right"><?php echo $age;?></td>
    </tr>
    <tr>
        <td bgcolor="orange" align="left">Address</td>
        <td align="right"><?php echo $address;?></td>
    </tr>
</table>
</body>
</html>