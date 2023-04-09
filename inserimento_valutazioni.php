<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Valutazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="stile.css" type="text/css">
</head>
<body>
    <div class="centrato">
    <h1> Inserisci una valutazione: </h1>
        <form method="post" action="raccolta_valutazioni.php">
            <input name="valutazione" type="number" placeholder="valutazione">
            <input name="commento" type="text" placeholder="commento">
            <input name="data_e_ora" type="text" placeholder="data_e_ora"><br/>
            <input name="id_utente" type="number" placeholder="id_utente">
            <select name="cod_film">
                <?php
                    include "connessione.php";

                    // Cod_film e Titolo di tutti i Film

                    $sql = "SELECT cod_film, titolo
                            FROM Film";

                    $result = $con->query($sql);

                    if ($result->num_rows > 0){

                        
                        while($row = $result->fetch_assoc()){
                            // Stampa delle Option
                            echo "<option value=\"" . $row["cod_film"] . "\">" . $row["titolo"] . "</option>";
                        }
                    }else{
                        echo "<option value=\"\">Non ci sono Film</option>";
                    }

                    // Chiusura della Connessione

                    $result->free();
                    $con->close();
                    
                ?>
            </select><br/>

            <input name="invia" type="submit" value="Invia" class="btn btn-primary">
        </form>
        <p>Vuoi visualizzare il riepilogo di tutte le valutazioni? Vai a <a href="riepilogo_valutazioni.php">Riepilogo valutazioni</a></p>
        <p>Vuoi chiudere questa sessione? Vai a <a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
