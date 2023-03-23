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
    ?>

    <div>
        <form action="">
            <?php 
                $results = $conn->query("SELECT * FROM TEST_GPS");
                
                echo'<table border="0" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Arial">ID</font> </td> 
                    <td> <font face="Arial">Latitudine</font> </td> 
                    <td> <font face="Arial">Longitudine</font> </td> 
                    <td> <font face="Arial">Altutudine</font> </td> 
                    <td> <font face="Arial">Tempo</font> </td> 
                </tr>';

                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["LAT"]."</td>";
                        echo "<td>".$row["LON"]."</td>";
                        echo "<td>".$row["ALT"]."</td>";
                        echo "<td>".$row["DATA"]."</td>";
                        echo "</tr>";
                        
                    }
                } else {
                    echo "No results";
                }
                echo "</table>";
            ?>

            
        </form>
    </div>
</body>