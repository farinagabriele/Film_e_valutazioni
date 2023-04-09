<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    echo "<h1>Disconnessione riuscita</h1>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="stile.css" type="text/css">
</head>
<body>
    <p>Vuoi inserire un'altra valutazione? Vai a <a href="inserimento_valutazioni.php">Inserimento valutazioni</a></p>
    <p>Vuoi visualizzare il riepilogo di tutte le valutazioni? Vai a <a href="riepilogo_valutazioni.php">Riepilogo valutazioni</a></p>
</body>
</html>