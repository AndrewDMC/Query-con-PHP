<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    require ('connection.php');
    session_start();
    if (isset ($_REQUEST['lat'])) {
        $lat = $_REQUEST['lat'];
        $lon = $_REQUEST['lon'];
        $n = $_REQUEST['n'];
        $classe = $_REQUEST['classe'];
    }
    $sql = "INSERT INTO TEST_GPS (lat, lon, n, classe) VALUES ('$lat', '$lon', '$n', '$classe');";
    $result = mysqli_query($conn, $sql);
    ?>
    <form action="post">
        <input type="post" name="lat">
        <input type="post" name="lon">
        <input type="post" name="n">
        <input type="post" name="classe">
    </form>
</body>
</html>