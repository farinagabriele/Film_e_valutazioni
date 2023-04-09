<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riepilogo valutazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="stile.css" type="text/css">
</head>
<body>
    <h1>Riepilogo valutazioni</h1>
    <?php
        // Lista delle valutazioni
        include "connessione.php";
        // Query: elenco di tutte le valutazioni
        $sql = "SELECT * FROM Valutazioni;";
        $result = $con->query($sql);
        // Controllo
        if ($result->num_rows > 0)
        {
            // Stampa dell'output in formato tabellare
            echo "<table class=\"table\">";
            echo "<thead>";
            echo "<th scope=\"col\">id_valutazione</th>";
            echo "<th scope=\"col\">valutazione</th>";
            echo "<th scope=\"col\">commento</th>";
            echo "<th scope=\"col\">data_e_ora</th>";
            echo "<th scope=\"col\">id_utente</th>";
            echo "<th scope=\"col\">cod_film</th>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc())
            {
                echo "<tr>";
                // Colonne
                echo "<th scope=\"row\">" . $row["id_valutazione"] ."</th>";
                echo " <td> " . $row["valutazione"] ." </td> ";
                echo " <td> " . $row["commento"] ." </td> ";
                echo " <td> " . $row["data_e_ora"] ." </td> ";
                echo " <td> " . $row["id_utente"]."</td>";
                echo " <td> " . $row["cod_film"] ." </td> ";



                echo "</tr>";
            }
            echo "</tbody>";
            echo "</thead>";
            echo "</table>";
        }

        // Media delle valutazioni
        $sql = "SELECT AVG(valutazione) AS media
                FROM Valutazioni;";
        $result = $con->query($sql);

        // Controllo
        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $media = $row["media"];
            // Stampa la media
            echo "<p><i>Media delle valutazioni:</i> <b>$media</b></p>";
        }

        // Il primo film con la valutazione massima
        
        $sql = "SELECT Film.titolo
                FROM Film
                INNER JOIN Valutazioni ON Valutazioni.cod_film = Film.cod_film
                WHERE Valutazioni.valutazione = (SELECT MAX(valutazione)
                                                 FROM Valutazioni)
                LIMIT 1;";
        $result = $con->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $film_massimo = $row["titolo"];
            // Stampa il film
            echo "<p><i>Titolo film con valutazione massima:</i> <b>$film_massimo</b></p>";
        }

        // Chiusura connessione
        $result->free();
        $con->close();
    ?>
    <p>Vuoi inserire un'altra valutazione? Vai a <a href="inserimento_valutazioni.php">Inserimento valutazioni</a></p>
    <p>Vuoi chiudere questa sessione? Vai a <a href="logout.php">Logout</a></p>
</body>
</html>
