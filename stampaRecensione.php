
<!DOCTYPE html>
<html>
    <head>
        <title>GPTrainer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="/imgs/icona.png">

    </head>
    <body class="text-center">
        <nav class="navbar navbar-expand-lg sticky-top mb-2">
            <div class="container-fluid">
            <a class="navbar-brand" href="#home" style="color:white;">GPTrainer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav ms-auto d-lg-flex flex-column flex-lg-row">

                
                    <li class="nav-item">
                    <a class="nav-link" href="index.html#home" data-i18n="navHome">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.html#servizi" data-i18n="navServizi">Servizi</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.html#aboutUs"  data-i18n="navChiSiamo">Chi siamo</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.html#contatti" data-i18n="navContatti">Contatti</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="stampaRecensione.php" data-i18n="navRecensioni">Recensioni</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="piano.html" data-i18n="navEsercizi">Piani esercizi</a>
                    </li>
                

                </ul>
                <div class="d-flex ">
                <div>

                    <select id="languageSwitcher" class="form-select  w-auto" w>
                    <option value="it">IT</option>
                    <option value="en">EN</option>
                    </select>
                </div>
                <form class="container-fluid justify-content-start ">
                    <a href="register.html" class="btn btn-outline-light" data-i18n="btnRegistrati">Registrati</a>
                    <a href="login.html" class="btn btn-outline-light" data-i18n="btnAccedi">Accedi</a>
                </form>
                </div>

            </div>
            </div>
        </nav> 
        <?php
            $sql="SELECT u.nome,u.cognome,c.nome,c.sport,rc.testo,rc.valutazione
                    FROM `recensione` AS rc
                LEFT JOIN utente AS u
                    ON rc.ID_utente=u.ID_utente
                LEFT JOIN coach_ia AS c
                    ON rc.id_coach=c.ID_coach";
            $conn = mysqli_connect('localhost','root','','progetto_gpoi')or die ("error: cannot connect");
            $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
            if(mysqli_num_rows($result)>0){
                echo "<h2 class='text-center' data-i18n='recensioniTitolo'>Recensioni</h2>";
                echo "<div class='container mt-4'>";
                while ($row = mysqli_fetch_row($result)) {
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Utente: ".$row[0]." ".$row[1]."</h5>";
                    echo "<h6 class='card-subtitle mb-2 text-muted'>Coach: ".$row[2]." - ".$row[3]."</h6>";
                    echo "<p class='card-text'>".$row[4]."</p>";
                    echo "<p class='card-text'><small class='text-muted'>Valutazione: ".$row[5]."</small></p>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            }else{
                echo "<h2 class='text-center'>Nessuna recensione disponibile</h2>";
            }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        <script src="script.js"></script>
            
    </body>
</html>