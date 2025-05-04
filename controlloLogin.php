<?php
if(isset($_POST['invio'])) {
    if(!isset($_POST['nome']) || trim($_POST['nome']) == ""){
        echo"inserire il nome<br>";
    }else{
        if(!isset($_POST['cognome']) || trim($_POST['cognome']) == ""){
            echo"inserire il cognome<br>";
        }else{
            if(!isset($_POST['password']) || trim($_POST['password']) == ""){
                echo"inserire la password<br>";
            }else{
                if(!isset($_POST['email']) || trim($_POST['email']) == ""){
                    echo"inserire l'email<br>";
                }else{
                    $nome=$_POST['nome'];
                    $cognome=$_POST['cognome'];
                    $pass=MD5($_POST['password']);
                    $email=$_POST['email'];
                    
                    $sql="SELECT ID_utente FROM utente WHERE email='$email' AND nome ='$nome' AND cognome ='$cognome' AND pwd ='$pass';";
                    
                    $conn = mysqli_connect('localhost','root','','progetto_gpoi')or die ("error: cannot connect");
                    
                    $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
                    
                    

                    if(mysqli_num_rows($result)>0){
                        session_start();
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['email'] = $email;
                        $_SESSION['pwd'] = $pass;
                        $_SESSION['nome'] = $nome;
                        $_SESSION['cognome'] = $cognome;
                        $_SESSION['id_utente']=$row['ID_utente'];;
                        echo"<h3 style='color:white;'>Accesso effettuato</h3>";
                        echo"<h3 style='color:white;'>Bentornato $nome $cognome</h3>";
                        echo"<h4 style='color:white;'>Clicca per prenotare la tua lezione <a href='prenotazione.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>prenota</a></h4>";
                        echo"<h4 style='color:white;'>Clicca per vedere le tue prenotazioni <a href='stampaPrenotazioni.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>vedi</a></h4>";
                        echo"<h4 style='color:white;'>Clicca per scrivere una recensione <a href='scritturaRecensione.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>scrivi</a></h4>";
                    }else{
                        echo"<h2 style='color:white;'>Errore di accesso :(</h2>";
                        echo"<h3 style='color:white;'>L'utente non risulta registrato</h3>";
                        echo"<h4 style='color:white;'>Clicca per registarti <a href='register.html' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>registrati</a></h4>";
                    }
                }
            }
        }
    }
    mysqli_close($conn);
}    
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
        
            
    </body>
</html>