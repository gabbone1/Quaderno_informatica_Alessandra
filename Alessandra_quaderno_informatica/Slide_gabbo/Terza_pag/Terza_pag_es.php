<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella Anagrafica</title>
</head>
<body>
    <h1>Esercizio A e B</h1>
    <h1>Tabella Anagrafica Utenti</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Rimuove gli spazi e previene input malevolo
        function pulisci($dato) {
            return htmlspecialchars(trim($dato));
        }

        $nome = pulisci($_POST['nome']);
        $cognome = pulisci($_POST['cognome']);
        $data_nascita = pulisci($_POST['data_nascita']);
        $email = pulisci($_POST['email']);
        $cellulare = pulisci($_POST['cellulare']);
        $via = pulisci($_POST['via']);
        $cap = pulisci($_POST['cap']);
        $comune = pulisci($_POST['comune']);
        $provincia = pulisci($_POST['provincia']);

        // Visualizzazione tabella
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Campo</th><th>Valore</th></tr>";
        echo "<tr><td>Nome</td><td>$nome</td></tr>";
        echo "<tr><td>Cognome</td><td>$cognome</td></tr>";
        echo "<tr><td>Data di nascita</td><td>$data_nascita</td></tr>";
        echo "<tr><td>Email</td><td>$email</td></tr>";
        echo "<tr><td>Cellulare</td><td>$cellulare</td></tr>";
        echo "<tr><td>Via/Piazza</td><td>$via</td></tr>";
        echo "<tr><td>CAP</td><td>$cap</td></tr>";
        echo "<tr><td>Comune</td><td>$comune</td></tr>";
        echo "<tr><td>Provincia</td><td>$provincia</td></tr>";
        echo "</table>";
    } else {
        echo "<p>Errore: nessun dato inviato.</p>";
    }
    ?>
       <a href="../Slide3/Form.Html">Torna al form</a>
</body>
</html>

