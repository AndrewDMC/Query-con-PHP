<?php

require "connection.php";

// Recupero dei dati inviati dal form
$squadraCasa = $_POST['squadra_casa'];
$squadraOspite = $_POST['squadra_ospite'];
$golCasa = $_POST['gol_casa'];
$golOspite = $_POST['gol_ospite'];

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
}
else{
  echo "Query eseguita con successo";
  echo "<a href='classifica.php'>Torna alla classifica</a>";
}
?>
