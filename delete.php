<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Delete</title>
</head>
<body>
    <?php
    $id = "";
    require ('connection.php');
    session_start();
    if (isset ($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
    }
    $sql = "DELETE FROM TEST_GPS WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    ?>
    <form action="post">
        <label for="id">ID</label>
        <input type="post" name="id">
        <input type="submit" value="Delete" class="button">
        <a href="index.html" class="button">Home</a>
    </form>
</body>
</html>