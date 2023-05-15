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
    <div class="dashboard_page">
    <div class="dashboard">
        <?php
        require('db.php');
        require('nav-bar.php');
        
        $tableName = 'Partite';
        $columns = ['ID', 'squadra_casa', 'squadra_ospite', 'risultato', 'data'];
        $id = 0;

        echo '<div class="form_data">
        <h1>Partite del</h1>
        <form name="partite" action="" method="post">
            <input type="text" name="data" placeholder="yyyy-mm-gg hh:mm:ss" required />
            <input type="submit" name="submit" value="INVIA" class="button"/>';

        if (isset($_REQUEST['data'])) {

            $query = "SELECT " . implode(', ', $columns) . " FROM $tableName WHERE $tableName.data LIKE '" . $_REQUEST['data'] . "%'";
            $result = mysqli_query($con, $query);
            $rows = mysqli_num_rows($result);

            table($rows, $columns, $result);
        }
        else{
            $query = "SELECT " . implode(', ', $columns) . " FROM $tableName";
            $result = mysqli_query($con, $query);
            $rows = mysqli_num_rows($result);

            table($rows, $columns, $result); 
        }

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
                        if ($column == 'ID') {
                            echo "<td><a href='commenti.php?id=" . $row[$column] . "'>".$row[$column]."</a></td>";
                            $id = $row[$column];
                        } else{
                            echo "<td>" . $row[$column] . "</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        }
        ?>

    <a href="logout.php" class="logout">Logout</a>
    </div>

        
    </div>
</body>

</html>