<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Calcio-Registration</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['nickname'])) {
        $nickname = stripslashes($_REQUEST['nickname']);
        $nickname = mysqli_real_escape_string($con, $nickname);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);
        $nome = stripslashes($_REQUEST['nome']);
        $nome = mysqli_real_escape_string($con, $nome);
        $cognome = stripslashes($_REQUEST['cognome']);
        $cognome = mysqli_real_escape_string($con, $cognome);
        $cf = stripslashes($_REQUEST['cf']);
        $cf = mysqli_real_escape_string($con, $cf);
        $query = "INSERT INTO `Utenti` (nickname, email, nome, cognome, codice_fiscale, password) VALUES ('$nickname', '$email', '$nome', '$cognome', '$cf', '$password')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Clicca qui per il <a href='login.php'>Login</a></div>";
        }
    } else {
    ?>
        <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="nickname" placeholder="Nickname" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="text" name="nome" placeholder="Nome" required />
                <input type="text" name="cognome" placeholder="Cognome" required />
                <input type="text" name="cf" placeholder="Codice Fiscale" required />
                <input type="submit" name="submit" value="Register" class="button"/>
            </form>
        </div>
    <?php } ?>
</body>

</html>