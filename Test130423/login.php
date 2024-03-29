<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['nickname'])) {
        // removes backslashes
        $nickname = stripslashes($_REQUEST['nickname']);
        //escapes special characters in a string
        $nickname = mysqli_real_escape_string($con, $nickname);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);
        //Checking is user existing in the database or not
        $query = "SELECT * FROM `Utenti` WHERE nickname='$nickname' and password='$password'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['nickname'] = $nickname;
            // Redirect user to index.php
            if(($_REQUEST['nickname'] == 'AndreaAdmin' && $_REQUEST['password'] == 'root')|| ($_REQUEST['nickname'] == 'admin' && $_REQUEST['password'] == 'admin')){
                header("Location: admin.php");
            }
            else{
                header("Location: index.php");
            }
            
            
        } else {
            echo "<div class='form'>
                  <h3>nickname/password is incorrect.</h3>
                  <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    } else {
    ?>
        <div class="form">
            <div class="login">
            <h1>Classifica Serie A</h1>
            <form action="" method="post" name="login">
                <input type="text" name="nickname" placeholder="nickname" required />
                <input type="password" name="password" placeholder="Password" required />
                <input name="submit" type="submit" value="Login" class="button" />
            </form>
            <p>Non sei registrato? <a href='registration.php'>Registrati qui</a></p>
            </div>
        </div>
    <?php } ?>
</body>

</html>