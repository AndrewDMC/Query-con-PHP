<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giocatori</title>
</head>
<body>

    <?php
    require('db.php');
    require('nav-bar.php');
    $tableName = 'Giocatori';
    $columns = ['nome', 'cognome','squadra','procuratore'];
    $id = 0;

    $query = "SELECT nome, cognome, squadra, procuratore FROM giocatori ORDER BY squadra desc;";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    echo ("<div class='classifica'>");
    table($rows, $columns, $result); 
    echo "</div>";
    function table($rows, $columns, $result){
        if ($rows > 0) {
            echo "<table>";
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<th>$column</th>";
            }
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                foreach ($columns as $column) {
                        echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
    ?>
    
</body>
</html>