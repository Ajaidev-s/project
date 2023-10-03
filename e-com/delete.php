<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('connect.php');
    // require('navbar.php');
    // require('sidebar.php');
    $id=$_GET['id'];
    $ins="DELETE from category where c_id=$id";
    $conn->query($ins);
    header('location:category.php');
    ?>
</body>
</html>