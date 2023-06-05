<?php
require "connection.php";

// Calcolo della classifica
$query = "SELECT squadra_casa, squadra_ospite, gol_casa, gol_ospite FROM risultati";
$stmt = $pdo->query($query);
$risultati = $stmt->fetchAll(PDO::FETCH_ASSOC);

$classifica = array();
foreach ($risultati as $risultato) {
  $squadraCasa = $risultato['squadra_casa'];
  $squadraOspite = $risultato['squadra_ospite'];
  $golCasa = $risultato['gol_casa'];
  $golOspite = $risultato['gol_ospite'];

  // Aggiornamento punteggi squadra di casa
  if (!isset($classifica[$squadraCasa])) {
    $classifica[$squadraCasa] = 0;
  }
  if ($golCasa > $golOspite) {
    $classifica[$squadraCasa] += 3; 
  } elseif ($golCasa == $golOspite) {
    $classifica[$squadraCasa] += 1; 
  }

  // Aggiornamento punteggi squadra ospite
  if (!isset($classifica[$squadraOspite])) {
    $classifica[$squadraOspite] = 0;
  }
  if ($golOspite > $golCasa) {
    $classifica[$squadraOspite] += 3;
  } elseif ($golOspite == $golCasa) {
    $classifica[$squadraOspite] += 1; 
  }
}

// Ordinamento classifica per punteggio decrescente
arsort($classifica);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Classifica</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/style_classifica.css">
</head>
<body>
    <?php
    require "nav-bar.php";
      ?>
  <h1>Classifica</h1>
  <table>
    <tr>
      <th>Squadra</th>
      <th>Punteggio</th>
    </tr>
    <?php foreach ($classifica as $squadra => $punteggio): ?>
      <tr>
        <td><?php echo $squadra; ?></td>
        <td><?php echo $punteggio; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
