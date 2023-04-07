<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riepilogo valutazioni</title>
</head>
<body>
    <h1>Riepilogo valutazioni</h1>
    <?php
        // Lista delle valutazioni
        include "connessione.php";
        // Query: elenco di tutte le valutazioni
        $sql = "SELECT * FROM valutazione";
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
                echo "<td>" . $row["id_valutazione"] ."</td>";
                echo " <td> " . $row[" valutazione"] ." </td> ";
                echo " <td> " . $row[" commento "] ." </td> ";
                echo " <td> " . $row[" data_e_ora "] ." </td> ";
                echo " <td> " . $row["id_utente"]."</td>";
                echo " <td> " . $row[" cod_film "] ." </td> ";



                echo "</tr>";
            }
            echo "</tbody>";
            echo "</thead>";
            echo "</table>";
        }
        // Media delle valutazioni


        // Il primo film con la valutazione massima


    ?>
</body>
</html>
