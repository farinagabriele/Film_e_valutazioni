<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raccolta Valutazioni</title>
</head>
<body>
    <?php
        // Raccolta valutazione film
        $valutazione_corrente = $_POST["valutazione"];
        $commento = $_POST["commento"];
        $data_e_ora = $_POST["data_e_ora"];
        $cod_film = $_POST["cod_film"];
        $id_utente = $_SESSION["id_utente"];

        // Verificare se l'utente ha già dato una valutazione per quel film
        include "connessione.php";

        // Valutazione di un film dati l'utente ed il codice
        $sql = "SELECT valutazione
                FROM Valutazioni
                WHERE id_utente = $id_utente AND cod_film = '$cod_film';";
        $result = $con->query($sql);

        if ($result->num_rows > 0)
        {
            /* Se l'utente ha già inserito una valutazione per quel film,
               si aggiorna la valutazione impostando il valore maggiore registrato */
            $row = $result->fetch_assoc();
            $ultima_valutazione = $row["valutazione"];

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
                    echo "Valutazione aggiornata correttamente";
                }
                else
                {
                    echo "Errore avvenuto durante l'aggiornamento della valutazione!";
                }
            }
            else 
            {
                echo "Hai già inserito una valutazione piu' alta: $ultima_valutazione";
            }
        }
        else
        {
            /* Se l'utente non ha mai inserito prima una valutazione per
               quel film, si inserisce la valutazione */
            $sql = "INSERT INTO Valutazioni (valutazione, commento, data_e_ora, cod_film, id_utente)
                    VALUES ($valutazione_corrente, '$commento', '$data_e_ora', '$cod_film', $id_utente);";

            // Controllo errori nell'inserimento
            if ($con->query($sql))
            {
                echo "Valutazione inserita correttamente";
            }
            else
            {
                echo "Errore avvenuto durante l'inserimento della valutazione";
            }
        }
    ?>
</body>
</html>