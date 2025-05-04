<?php
    session_start();
    if(!isset($_POST['invio'])){

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>GPTrainer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="/imgs/icona.png">

    </head>
    <body>
        <br>
        <h2 class="text-center">Scrivi la tua recensione</h2>
        <div class="container mt-4">
            <form  method="POST" action="scritturaRecensione.php" >
                <div class="mb-3 text-center">
                    <label for="nome" class="form-label">Nome coach</label>
                    <select name="nomeCoach" id="nomeCoach" class="form-select" onchange="document.getElementById('id_coach').value = this.options[this.selectedIndex].value;" >
                        <option value="0"></option>
                        <?php
                             $connection = mysqli_connect('localhost', 'root', '', 'progetto_gpoi') or die ("ERROR: Cannot connect");
                             $sql = "SELECT ID_coach, nome FROM coach_ia ";
                             $result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
                         
                             if (mysqli_num_rows($result) > 0) {
                                 while ($row = mysqli_fetch_row($result)) {
                                     echo "<option value="  . $row[0] . ">" . $row[1] ."</option>";
                                 }
                             }
                             mysqli_close($connection);
                        ?>
                    </select>
                    <input type="text" class="form-control" id="id_coach" name="id_coach" hidden>
                </div>
                
                <div class="mb-3 text-center">
                    <label for="testo" class="form-label">Recensione</label>
                    <input type="text" class="form-control" id="testo" name="testo" required>
                </div>
                <div class="mb-3 text-center">
                    <label for="valutazione" class="form-label">Valutazione</label>
                    <select name="valutazione" id="valutazione" class="form-select" required onchange="document.getElementById('numValutazione').value = this.options[this.selectedIndex].value;" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <input type="text" class="form-control" id="numValutazione" name="numValutazione" value="1" hidden>
                </div>
                <input type="submit" class="btn btn-secondary" name="invio" value="Invia"/>
            </form>
        </div> 
        
        <?php
        }else{
            $id_utente = $_SESSION['id_utente'];
            $id_coach = $_POST['id_coach'];
            $testo = $_POST['testo'];
            $valutazione = $_POST['numValutazione'];
            $sql="INSERT INTO recensione(ID_utente, ID_coach, testo, valutazione) VALUES ('$id_utente','$id_coach','$testo','$valutazione');";
            $conn = mysqli_connect('localhost','root','','progetto_gpoi') or die ("error: cannot connect");
            $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
           header("Location: recensioneInviata.html");
            mysqli_close($conn);
        }
        ?>
    </body>
    </html>
    