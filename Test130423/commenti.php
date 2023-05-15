<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo '<meta charset="utf-8">
    <title>Partita '. $_GET['id'].'</title>';
    ?>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <?php
    require('db.php');
    require('nav-bar.php');
    $tableName = 'Commenti';
    $columns = ['utente', 'nota'];
    $id = 0;

    echo '<div class="form_commenti">

    <form name="commenti" action="" method="post">
        <input type="text" name="commento" placeholder="Inserisci un Commento" required />
        <input type="submit" name="submit" value="INVIA" class="button"/>';
    if (isset($_REQUEST['commento'])) {
        $query = "INSERT INTO $tableName (IP, timestamp, nota, partita, utente) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "', '". date("Y-m-d H:i:s") . "', '" . $_REQUEST['commento'] ."','". $_GET['id'] . "', '" . $_SESSION['nickname'] . "')";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<div class='form_commentoTrue' class='form'>
            <h3>Commento inviato con successo.</h3>
            <br/>Click qui per <a href='commenti.php?id=". $_GET['id'] ."'>aggiornare</a></div>";
        }

        $query = "SELECT " . implode(', ', $columns) . " FROM $tableName WHERE $tableName.partita = '" . $_GET['id'] . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        table($rows, $columns, $result); 
    }
    else{
        $query = "SELECT " . implode(', ', $columns) . " FROM $tableName WHERE $tableName.partita = '" . $_GET['id'] . "'";
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

    </form>
    <br/>Click qui per <a href='index.php'>Menu principale</a></div>
    



</body>
</html>