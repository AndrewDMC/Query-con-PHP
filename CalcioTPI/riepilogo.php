<?php
require_once "connection.php";

//Risultati delle partite precedenti
$query = "SELECT squadra_casa, squadra_ospite, gol_casa, gol_ospite FROM risultati";
$stmt = $pdo->query($query);
$risultati = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Riepilogo</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/style_riepilogo.css">
</head>
<body>
  <?php
  require "nav-bar.php";
    ?>
  <h1>Riepilogo</h1>
  <table>
    <tr>
      <th>Squadra di casa</th>
      <th>Squadra ospite</th>
      <th>Risultato</th>
    </tr>
    <?php foreach ($risultati as $risultato): ?>
      <tr>
        <td><?php echo $risultato['squadra_casa']; ?></td>
        <td><?php echo $risultato['squadra_ospite']; ?></td>
        <td><?php echo $risultato['gol_casa'] . ' - ' . $risultato['gol_ospite']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
