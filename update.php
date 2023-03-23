<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php
    $id = "";
    require ('connection.php');
    session_start();
    require('nav-bar.php');
    ?>

    <form method="post" action="makeUpdate.php">
        <select name="idToUpd">
                <?php
                    $fields = $conn->query("SELECT * FROM TEST_GPS");

                    if ($fields->num_rows > 0) {
                        while ($row = $fields->fetch_assoc()) {
                            echo "<option class='option'>".$row["id"]."</option>";
                        }
                    }
                ?>
                </select>

            <button class="button">Submit</button>
    </form>
    <?php
        require('footer.php');
    ?>
</body>
</html>