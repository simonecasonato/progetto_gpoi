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
    <body class="text-center">
        <br>
        <h2 class="text-center">Prenota</h2>
        <div class="container mt-4">
            <form  method="POST" >
                <div class="mb-3 text-center">
                    <label for="coach" class="form-label">Coach</label>
                    <select class="form-select" id="coach" name="coach" required onchange="document.getElementById('id_coach').value = this.options[this.selectedIndex].value;">
                        <option selected></option>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'progetto_gpoi') or die ("ERROR: Cannot connect");
                            $sql = "SELECT ID_coach, nome, sport FROM coach_ia ";
                            $result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
                        
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_row($result)) {
                                    echo "<option value="  . $row[0] . ">" . $row[1] . " - ".$row[2]."</option>";
                                }
                            }
                            mysqli_close($connection);
                        ?>
                    </select>
                    <input type="text" class="form-control" id="id_coach" name="id_coach" hidden>
                </div>
                <div class="mb-3 text-center">
                    <label for="tariffa" class="form-label">Tariffa</label>
                    <select class="form-select" id="tariffa" name="tariffa" required onchange="document.getElementById('id_tariffa').value = this.options[this.selectedIndex].value;">
                        <option selected></option>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'progetto_gpoi') or die ("ERROR: Cannot connect");
                            $sql = "SELECT ID_tariffa, prezzo, tipo, durata FROM tariffa ";
                            $result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
                        
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_row($result)) {
                                    echo "<option value="  . $row[0] . ">" . $row[2] . " - ".$row[3]." -> ".$row[1]."€</option>";
                                }
                            }
                            mysqli_close($connection);
                        ?>
                    </select>
                    <input type="text" class="form-control" id="id_tariffa" name="id_tariffa" hidden>
                </div>
                <div class="mb-3 text-center">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" class="form-control" id="data" name="data" required>
                </div>
                <input type="submit" class="btn btn-secondary" name="invio" value="Prenota"/>
            </form>
        </div> 
        <?php
    }else{

        $nome = $_SESSION['nome'];
        $cognome = $_SESSION['cognome'];
        $email = $_SESSION['email'];
        $pass = $_SESSION['pwd'];
        $id_utente = $_SESSION['id_utente'];
        $id_coach = $_POST['id_coach'];
        $data = $_POST['data'];
        $id_tariffa = $_POST['id_tariffa'];
        $conn = mysqli_connect('localhost','root','','progetto_gpoi') or die ("error: cannot connect");
        $sql="INSERT INTO prenota(ID_utente, ID_coach, data_prenotazione, ID_tariffa) VALUES ('$id_utente','$id_coach','$data','$id_tariffa');";
        $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
        if($result){
            header("Location: prenotazioneOk.html");
        }else{
            header("Location: prenotazioneNo.html");
        }

        
        mysqli_close($conn);
    }
        ?>
            
    </body>
</html>