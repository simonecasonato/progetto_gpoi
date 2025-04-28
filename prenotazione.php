<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>GPTrainer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="/imgs/icona.png">

    </head>
    <body class="text-center">
        <?php
            $nome = $_SESSION['nome'];
            $cognome = $_SESSION['cognome'];
            $email = $_SESSION['email'];
            $pass = $_SESSION['pwd'];
            $conn = mysqli_connect('localhost','root','','progetto_gpoi') or die ("error: cannot connect");
            

        ?>
            
    </body>
</html>