<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Insert</title>
</head>
<body>
    <?php
    $lat = "";
    $lon = "";
    $n = "";
    $classe = "";
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
    <div class="Section1">
    <form action="post">
        <label for="lat">Latitudine</label>
        <input type="post" name="lat">
        <label for="lon">Longitudine</label>
        <input type="post" name="lon">
        <label for="n">Numero</label>
        <input type="post" name="n">
        <label for="classe">Classe</label>
        <input type="post" name="classe">
        <input type="submit" value="Insert" class="button">
        <a href="index.html" class="button">Home</a>
    </form>
    </div>
</body>
</html>