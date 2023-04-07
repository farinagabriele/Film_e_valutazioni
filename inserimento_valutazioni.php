<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Valutazioni</title>
</head>
<body>
    <h1> Inserisci una valutazione: </h1>
    <form method="post" action="raccolta_valutazioni.php">
        <input name="valutazione" type="text" placeholder="valutazione">
        <input name="commento" type="text" placeholder="commento">
        <input name="data_e_ora" type="text" placeholder="data_e_ora">
        <input name="id_utente" type="text" placeholder="id_utente">
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
                    echo "<h2> Non ci sono Film </h2>";
                }

                // Chiusura della Connessione

                $result->free();
                $con->close();
                
            ?>
        </select>

        <input name="invia" type="submit" value="Invia">
    </form>
</body>
</html>
