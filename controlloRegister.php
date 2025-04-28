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
                    
                    $sql="SELECT ID_utente FROM utente WHERE email='$email' AND nome ='$nome' AND nome ='$cognome';";
                    
                    $conn = mysqli_connect('localhost','root','','progetto_gpoi')or die ("error: cannot connect");
                    
                    $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
                    
                    if(mysqli_num_rows($result)>0){
                        echo"<h3>Utente già esistente</h3>";
                        echo"<h4>Clicca per accedere <a href='index.html' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>accedi</a></h4>";
                    }else{
                        $sql = "INSERT INTO utente(nome,cognome,pwd,email) VALUES ('$nome','$cognome','$pass','$email');";
                        
                        $result = mysqli_query($conn, $sql) or die ("error: ".mysqli_error($conn)." query was '$sql'");
                        
                        echo"<h2>Registrazione avvenuta con successo</h2>";
                        echo"<h3>Benvenuto $nome $cognome</h3>";
                        echo"<h4>Clicca per accedere <a href='index.html' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>accedi</a></h4>";
                    }
                }
            }
        }
    }
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
    
