<html>
<head>
<title>Prova TPI</title>
</head>
<body>
    <?php
        try{
            $pdo = new PDO("mysql:localhost,dbname=film","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        echo "Connessione al database effettuata con successo";
    ?>
        

</html>