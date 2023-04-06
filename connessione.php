<?php
    // Parametri
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_nome = "gestione_valutazioni_film";
    // Connessione
    $con = new mysqli($host, $user, $pass, $db_nome);
    // Controllo errori
    if ($con->connect_errno){
        echo "Impossibile connettersi al database: " . $con->connect_error;
        exit;
    }
?>