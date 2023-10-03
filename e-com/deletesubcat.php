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
    $id=$_GET['id'];
    $ins="DELETE from subcategory where s_id=$id";
    $conn->query($ins);
    header('location:subcat.php');
    ?>
</body>
</html>