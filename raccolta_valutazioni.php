<?php
    session_start();
    // Se non è impostato il vettore 'codici_film', lo crea
    if(!isset($_SESSION["codici_film"]))
    {
        
        $_SESSION["codici_film"] = array();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raccolta Valutazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="stile.css" type="text/css">
</head>
<body>
    <?php
        // Raccolta valutazione film
        $valutazione_corrente = $_POST["valutazione"];
        $commento = $_POST["commento"];
        $data_e_ora = $_POST["data_e_ora"];
        $cod_film = $_POST["cod_film"];
        $id_utente = $_POST["id_utente"];

        // Verificare se l'utente ha già dato una valutazione per quel film
        include "connessione.php";

        // Valutazione di un film dati l'utente ed il codice
        $sql = "SELECT valutazione, cod_film
                FROM Valutazioni
                WHERE id_utente = $id_utente AND cod_film = '$cod_film';";
        $result = $con->query($sql);

        if ($result->num_rows > 0)
        {
            /* Se l'utente ha già inserito una valutazione per quel film,
               si aggiorna la valutazione impostando il valore maggiore registrato */
            $row = $result->fetch_assoc();
            $ultima_valutazione = $row["valutazione"];
            $cod_film_ultima_valutazione = $row["cod_film"];

            /* Si verifica che l'utente abbia già valutato il film dato
               in questa sessione */
            if (in_array($cod_film_ultima_valutazione, $_SESSION["codici_film"]))
            {
                // Calcolare valutazione più alta data dall'utente per quel film
                if ($valutazione_corrente > $ultima_valutazione)
                {
                    // Memorizzare la valutazione massima nel database
                    $sql = "UPDATE Valutazioni
                            SET valutazione = $valutazione_corrente
                            WHERE id_utente = $id_utente AND cod_film = '$cod_film';";
                    // Controllo errori nell'aggiornamento
                    if ($con->query($sql))
                    {
                        echo "<h1>Valutazione aggiornata correttamente</h1>";
                    }
                    else
                    {
                        echo "<h1>Errore avvenuto durante l'aggiornamento della valutazione!</h1>";
                    }
                }
                else 
                {
                    echo "<h1>Hai già inserito una valutazione piu' alta: $ultima_valutazione</h1>";
                }
            }
            else
            {
                echo "<h1>Hai già inserito una valutazione per questo film in un'altra sessione</h1>";
                echo "Vettore codici_film:<br/>";
                foreach($_SESSION["codici_film"] as $val)
                {
                    echo "$val<br/>";
                }
            }
        }
        else
        {
            /* Se l'utente non ha mai inserito prima una valutazione per
               quel film, si inserisce la valutazione */
            array_push($_SESSION["codici_film"], $cod_film);
            $sql = "INSERT INTO Valutazioni (valutazione, commento, data_e_ora, cod_film, id_utente)
                    VALUES ($valutazione_corrente, '$commento', '$data_e_ora', '$cod_film', $id_utente);";

            // Controllo errori nell'inserimento
            if ($con->query($sql))
            {
                echo "<h1>Valutazione inserita correttamente</h1>";
                echo "Vettore codici_film:<br/>";
                foreach($_SESSION["codici_film"] as $val)
                {
                    echo "$val<br/>";
                }
            }
            else
            {
                echo "<h1>Errore avvenuto durante l'inserimento della valutazione</h1>";
            }
        }
    ?>
    <p>Vuoi inserire un'altra valutazione? Vai a <a href="inserimento_valutazioni.php">Inserimento valutazioni</a></p>
    <p>Vuoi visualizzare il riepilogo di tutte le valutazioni? Vai a <a href="riepilogo_valutazioni.php">Riepilogo valutazioni</a></p>
    <p>Vuoi chiudere questa sessione? Vai a <a href="logout.php">Logout</a></p>
</body>
</html>