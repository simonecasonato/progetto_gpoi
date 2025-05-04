<?php
    session_start(); 
    $id_utente=$_SESSION['id_utente'];
    $sql="SELECT COUNT(*) FROM prenota WHERE ID_utente='$id_utente';";
    $conn = mysqli_connect('localhost','root','','progetto_gpoi')or die ("error: cannot connect");
    $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_row($result);
        if($row[0]>0){
            echo"<h2 style='color:white;'>Le tue prenotazioni sono:</h2>";
            echo"<table class='table table-striped-columns'>
                    <thead>        
                        <tr>
                            <th>Nome del coach</th>
                            <th>Sport</th>
                            <th>Data prenotazione</th>
                            <th>Prezzo tariffa</th>
                            <th>Tipo tariffa</th>
                            <th>Durata tariffa</th>
                        </tr>
                    </thead>
                    <tbody>";
            $sql="SELECT c.nome,c.sport,pr.data_prenotazione,tr.prezzo,tr.tipo,tr.durata
                        FROM `prenota` AS pr
                    LEFT JOIN utente AS u
                        ON pr.ID_utente=u.ID_utente
                    LEFT JOIN coach_ia as c
                        ON pr.ID_coach=c.ID_coach
                    LEFT JOIN tariffa AS tr
                        ON pr.ID_tariffa = tr.ID_tariffa
                    WHERE u.ID_utente='$id_utente'";
            $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>"  . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></td></tr>";
            }
            echo "</tbody></table>";
        }else{
            echo"<h2 style='color:white;'>Non hai prenotazioni</h2>";
        }
        echo"<h4 style='color:white;'>Clicca per prenotare la tua lezione <a href='prenotazione.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>prenota</a></h4>";
        echo"<h4 style='color:white;'>Clicca per prenotare tronare alla <a href='index.html' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>home</a></h4>";
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>GPTrainer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="/imgs/icona.png">

    </head>
    <body class="container text-center">
        
            
    </body>
</html>