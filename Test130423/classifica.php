<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classifica</title>
</head>
<body>

    <?php
    require('db.php');
    require('nav-bar.php');
    $tableName = 'Squadre';
    $columns = ['nome', 'punteggio'];
    $id = 0;

    $query = "SELECT nome, punteggio FROM squadre ORDER BY punteggio DESC;";
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