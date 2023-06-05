<!DOCTYPE html>
<html>
<head>
  <title>Gestione risultati partite di calcio</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/style_inserimento.css">

</head>
<body>
  <?php
  require "nav-bar.php";
  require "connection.php";
  $query = "SELECT nome FROM Squadre";
  $stmt = $pdo->query($query);
  $risultati = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
  <h1>Inserimento risultati partite</h1>
  <form action="aggiorna_risultato.php" method="post">
    <label for="squadra_casa">Squadra di casa:</label>
    <select name="squadra_casa" id="squadra_casa">
      <?php foreach ($risultati as $risultato): ?>
        <option value= <?php echo $risultato['nome']?> > <?php echo $risultato['nome']?> </option>
      <?php endforeach; ?>
    </select>

    <label for="squadra_ospite">Squadra ospite:</label>
    <select name="squadra_ospite" id="squadra_ospite">
        <?php foreach ($risultati as $risultato): ?>
          <option value= <?php echo $risultato['nome']?> > <?php echo $risultato['nome']?> </option>
        <?php endforeach; ?>
    </select>

    <label for="gol_casa">Gol squadra di casa:</label>
    <input type="number" name="gol_casa" id="gol_casa" min="0" max="99" required>

    <label for="gol_ospite">Gol squadra ospite:</label>
    <input type="number" name="gol_ospite" id="gol_ospite" min="0" max="99" required>

    <input type="submit" value="Salva risultato">
  </form>
</body>
</html>