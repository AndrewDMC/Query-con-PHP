<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="form">
        <p>Ciao <?php echo $_SESSION['nickname']; ?>!</p>
        <p>Benvenuto nella dashboard della Serie A</p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>