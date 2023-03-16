<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
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
    require('nav-bar.php')
    ?>
    <form action="post">
        <input type="post" name="id">
    </form>
</body>
</html>