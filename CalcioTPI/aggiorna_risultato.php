<?php

require "connection.php";

// Recupero dei dati inviati dal form
$squadraCasa = $_POST['squadra_casa'];
$squadraOspite = $_POST['squadra_ospite'];
$golCasa = $_POST['gol_casa'];
$golOspite = $_POST['gol_ospite'];

if ($squadraCasa == $squadraOspite) {
  echo "Le squadre non possono essere uguali";
  echo "<a href='index.php'>Torna al inserimento</a>";
  die();
} 

else {
  // Inserimento del risultato nel database
  $sql = "INSERT INTO risultati (squadra_casa, squadra_ospite, gol_casa, gol_ospite) VALUES (:squadra_casa, :squadra_ospite, :gol_casa, :gol_ospite)";
  $stmt = $pdo->prepare($sql);
  $params = [
    'squadra_casa' => $squadraCasa,
    'squadra_ospite' => $squadraOspite,
    'gol_casa' => $golCasa,
    'gol_ospite' => $golOspite
  ];
  $result = $stmt->execute($params);

  if ($result === false) {
    echo "Errore nell'esecuzione della query";
    die();
  } else {
    header("Location: classifica.php");
  }
}


?>

<head>
  <link rel="stylesheet" href="style/style.css">
</head>