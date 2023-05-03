<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
    <title>ADMIN DASHBOARD</title>
</head>
<body>
<?php

use LDAP\Result;

    require('db.php');
    // If form submitted, insert values into the database.
    if($_SESSION['nickname'] != 'admin' && $_SESSION['nickname'] != 'admin'){
        header("Location: index.php");
    }
    else{
        if (isset($_REQUEST['query'])) {
            $query = $_REQUEST['query'];
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>alert('Query eseguita con successo');</script>";
            }
        }
        else{}?>
            <div class="form">
                <h1>ADMIN</h1>
                <form name="QUERY" action="" method="post">
                    <input type="text" name="query" placeholder="Query" required />
                    <input type="submit" name="submit" value="INVIA" class="button"/>
                </form>
            </div>
        <?php } ?>
    
</body>
</html>