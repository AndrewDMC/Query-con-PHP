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
    ?>
  <h1>Inserimento risultati partite</h1>
  <form action="aggiorna_risultato.php" method="post">
    <label for="squadra_casa">Squadra di casa:</label>
    <select name="squadra_casa" id="squadra_casa">
      <option value="Squadra A">Squadra A</option>
      <option value="Squadra B">Squadra B</option>
    </select>

    <label for="squadra_ospite">Squadra ospite:</label>
    <select name="squadra_ospite" id="squadra_ospite">
      <option value="Squadra C">Squadra C</option>
      <option value="Squadra D">Squadra D</option>
    </select>

    <label for="gol_casa">Gol squadra di casa:</label>
    <input type="number" name="gol_casa" id="gol_casa" min="0" max="99" required>

    <label for="gol_ospite">Gol squadra ospite:</label>
    <input type="number" name="gol_ospite" id="gol_ospite" min="0" max="99" required>

    <input type="submit" value="Salva risultato">
  </form>
</body>
</html>
