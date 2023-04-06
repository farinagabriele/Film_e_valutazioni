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

        // Verificare se l'utente ha già dato una valutazione per quel film

        // Calcolare valutazione più alta data dall'utente per quel film

        // Memorizzare la valutazione massima nel database
    ?>
    <?php
        // verifica funzionamento "connessione.php"
        include "connessione.php";
        $sql = "SELECT * FROM film;";
        $result = $con->query($sql);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo $row["titolo"];
            }
        }
    ?>
</body>
</html>