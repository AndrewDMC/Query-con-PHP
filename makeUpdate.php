<!DOCTYPE html>
<html>
<head>
    <title>Queries</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        require('connection.php');
        require('nav-bar.php');
    
        if (isset($_POST["idToUpd"]) == true) {
            $UPDATE_ID = $_POST["idToUpd"];
        }
    ?>

    <div>
        <form method="POST" action="makeUpdate.php">
            <?php
                if (isset($_POST["idToUpd"]) == true && 
                isset($_POST["lat"]) == true && 
                isset($_POST["lon"]) == true && 
                isset($_POST["alt"]) == true && 
                isset($_POST["time"]) == true) {
                    $id = $_POST["idToUpd"];
                    $lat = $_POST["lat"];
                    $lon = $_POST["lon"];
                    $alt = $_POST["alt"];
                    $time = $_POST["time"];

                    $result = $conn->query("UPDATE TEST_GPS SET LAT = $lat, LON = $lon, ALT = $alt, DATA = $time WHERE id = $id");
            
                    if ($result == true) {
                        echo "Updated successfully<br/>";
                    } else {
                        echo "Update failed<br/>";
                    }
                }

                $results = $conn->query("SELECT * FROM TEST_GPS WHERE id = $UPDATE_ID");
    
                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        echo "<input type='text' name='idToUpd' value='".$row["id"]."'/><br/>";
                        echo "<input type='text' name='lat' value='".$row["LAT"]."'/><br/>";
                        echo "<input type='text' name='lon' value='".$row["LON"]."'/><br/>";
                        echo "<input type='text' name='alt' value='".$row["ALT"]."'/><br/>";
                        echo "<input type='text' name='time' value='".$row["DATA"]."'/><br/>";
                    }
                } else {
                    echo "No results";
                }
                
            ?>
    
            <button name="btnUpdate" class="button">Submit</button>
            <a href="index.php" type="button" class="button">Home</a>
        </form>
    </div>
    <?php
        require('footer.php');
    ?>
</body>