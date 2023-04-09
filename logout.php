<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    echo "Disconnessione riuscita";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <p>Vuoi inserire un'altra valutazione? Vai a <a href="inserimento_valutazioni.php">Inserimento valutazioni</a></p>
    <p>Vuoi visualizzare il riepilogo di tutte le valutazioni? Vai a <a href="riepilogo_valutazioni.php">Riepilogo valutazioni</a></p>
</body>
</html>