<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio B</title>
</head>
<body>
<?php
    echo "<h1>Esercizio B</h1>";
    echo "<h3>Pagina PHP dinamica con saluto basato sull'ora, benvenuto personalizzato, e rilevazione del browser in uso</h3>";

    // Recupera la stringa dell'User Agent dell'utente
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Verifica il browser utilizzato in base all'User Agent
    if (strpos($userAgent, 'OPR') !== false || strpos($userAgent, 'Opera') !== false) {
        $browser = "Opera";
    } elseif (strpos($userAgent, 'Edg') !== false) { // 'Edg' per la nuova versione di Edge
        $browser = "Microsoft Edge";
    } elseif (strpos($userAgent, 'Chrome') !== false && strpos($userAgent, 'Safari') !== false) {
        $browser = "Google Chrome";
    } elseif (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'Chrome') === false) {
        $browser = "Apple Safari";
    } elseif (strpos($userAgent, 'Firefox') !== false) {
        $browser = "Mozilla Firefox";
    } elseif (strpos($userAgent, 'Trident') !== false || strpos($userAgent, 'MSIE') !== false) { // Trident/MSIE per Internet Explorer
        $browser = "Internet Explorer";
    } else {
        $browser = "un browser sconosciuto";
    }

    // Mostra il risultato
    echo "Stai usando il browser $browser. <br>";
    // Ottieni la data e l'ora corrente
    $today = new DateTime('now', new DateTimeZone('Europe/Rome'));
    echo "<br>Oggi è il " . $today->format('d/m/Y') . "<br>";
    $ora = $today->format('H'); // Ora in formato 24h
    $nome = "Paolo";

    echo "<br>Sono le $ora.<br>";

    // Saluto basato sull'ora
    if ($ora > 8 && $ora < 13) {
        echo "<br>Buongiorno, $nome!";
    } elseif ($ora >= 13 && $ora <= 20) {
        echo "<br>Buonasera, $nome!";
    } else {
        echo "<br>Buonanotte, $nome!";
    }
    for($i=0; $i <= 5; $i++) {
        echo "<br>";
    }
?>
<h3>Illustrazione dell'Attività</h3>
<h4>Dettagli dell'attività:</h4>
<pre>
Questa attività crea dinamicamente una pagina PHP che:
1. Identifica il browser utilizzato dall'utente.
2. Visualizza la data e l'ora attuali.
3. Fornisce un saluto personalizzato in base all'ora (mattina, pomeriggio, o sera).
4. Personalizza il saluto includendo un nome specificato di default ("Luca").
</pre>
<h4>Procedimento Logico:</h4>
<pre>
1. Rilevare l'User Agent: Usando la variabile globale $_SERVER['HTTP_USER_AGENT'], si ottengono informazioni sul browser in uso.
2. Identificare il browser: Con una serie di controlli tramite strpos(), si confronta l'User Agent con stringhe chiave per determinare il browser.
3. Determinare data e ora: Utilizzando la classe DateTime di PHP e configurando il fuso orario, si ottengono data e ora attuali.
4. Personalizzare il saluto in base all'orario:
    - Mattina (9:00-12:59): "Buongiorno"
    - Pomeriggio/sera (13:00-20:00): "Buonasera"
    - Notte (20:01-8:59): "Buonanotte"
</pre>
<h4>Porzione di Codice PHP rilevante:</h4>

    <pre>
// Recuperare l'User Agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];
Questo blocco permette di passare il nome del "Browser"


// Identificare il browser
if (strpos($userAgent, 'Firefox') !== false) {
    $browser = "Mozilla Firefox";
} else {
    $browser = "un browser sconosciuto";
}



// Calcolare la data e l'ora corrente
$today = new DateTime('now', new DateTimeZone('Europe/Rome'));


// Determinare il saluto basato sull'ora
$ora = $today->format('H');
if ($ora > 8 && $ora < 13) {
    echo "Buongiorno!";
} elseif ($ora >= 13 && $ora <= 20) {
    echo "Buonasera!";
} else {
    echo "Buonanotte!";
}
    </pre>
<h4>Comandi Importanti da Ricordare: </h4>
<pre>
<b>strpos():</b>
Cosa fa: Cerca una sottostringa all'interno di una stringa. Restituisce la posizione della 
         prima occorrenza trovata o false se non viene trovata alcuna corrispondenza.

<b>$_SERVER['HTTP_USER_AGENT']:</b>
Cosa Fa: Recupera la stringa dell'User Agent dell'utente, che contiene informazioni 
         sul browser, sistema operativo e dispositivo in uso.

<b>new DateTime():</b>
Cosa Fa: Formatta l'oggetto DateTime in una stringa utilizzando il formato specificato.
</pre>

<a href="../Slide1/Slide1.html">Torna Indietro</a>

</body>
</html>
