<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=calcio_tpi", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Errore di connessione al database: " . $e->getMessage();
    die();
}

?>

