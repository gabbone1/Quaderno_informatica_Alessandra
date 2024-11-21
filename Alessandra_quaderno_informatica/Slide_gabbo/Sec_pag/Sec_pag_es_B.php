<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio B - Login</title>
</head>
<body>
    <h2>Esercizio B</h2><br>
    <h3>Accesso a pagina riservata</h3>

    <?php
    // Verifica se la richiesta è di tipo POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recupera i dati dal form
        $usr = isset($_POST['username']) ? $_POST['username'] : '';
        $psw = isset($_POST['password']) ? $_POST['password'] : '';

        // Controlla username e password
        if ($usr == "admin" && $psw == "password") {
            // Credenziali corrette: mostra il messaggio di benvenuto e il pulsante per tornare al login
            echo "<h4>Benvenuto, $usr <br> nell'area riservata</h4>";
            echo '
                <form action="" method="get">
                    <input type="submit" value="Torna al login">
                </form>
            ';
        } else {
            // Credenziali errate: mostra il messaggio di errore e il form di login
            echo "<p style='color: red;'>Nome utente o password non validi!</p>";
            mostraForm();
        }
    } else {
        // La richiesta non è di tipo POST: mostra il form di login
        mostraForm();
    }

    // Funzione per mostrare il form di login
    function mostraForm() {
        echo '
            <form action="" method="post">
                <label for="username"><b>Username</b>: </label>
                <input type="text" name="username" placeholder="Inserisci il nome utente" required><br>
                <label for="password"><b>Password</b>: </label>
                <input type="password" name="password" placeholder="Inserisci la password" required><br>
                <input type="submit" value="Invia">
            </form>
        ';
    }
    ?>

    
<h3>Illustrazione dell'Attività</h3>
<h4>Dettagli dell'attività:</h4>
<pre>
Questo compito crea una pagina di accesso in PHP che:
1. Visualizza un modulo per l'inserimento di nome utente e password.
2. Quando l'utente invia il modulo, il codice PHP verifica le credenziali.
3. Se le credenziali sono giuste, l'utente viene accolto con un messaggio di benvenuto.
4. Se le credenziali sono errate, viene mostrato un messaggio di errore e il modulo viene riproposto.
</pre>

<h4>Procedimento Logico:</h4>
<pre>
1. Il flusso inizia verificando se la richiesta è di tipo POST.
2. Se la richiesta è POST, vengono controllati i dati inviati (nome utente e password).
3. Se le credenziali corrispondono, viene visualizzato un messaggio di benvenuto.
4. Se le credenziali non sono corrette, viene mostrato un messaggio di errore e il modulo di accesso viene riproposto.
</pre>

<h4>Porzione di Codice PHP rilevante:</h4>

    <pre>
// Verifica se la richiesta è di tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati dal form
    $usr = isset($_POST['username']) ? $_POST['username'] : '';
    $psw = isset($_POST['password']) ? $_POST['password'] : '';

    // Controlla username e password
    if ($usr == "admin" && $psw == "password") {
        echo "'h4'Benvenuto, $usr 'br' nell'area riservata '/h4'";
    } else {
        echo "'p style='color: red;''Nome utente o password non validi!'/p'";
        mostraForm();
    }
} else {
    // La richiesta non è di tipo POST: mostra il form di login
    mostraForm();
}

// Funzione per mostrare il form di login
function mostraForm() {
    echo '
        form action="" method="post"
            label for="username"Username:/label
            input type="text" name="username" placeholder="Inserisci il nome utente" required
            label for="password"Password: /label
            input type="password" name="password" placeholder="Inserisci la password" required
            input type="submit" value="Invia"
        /form
    ';
}
    </pre>
    
    <h4>Comandi Importanti da Ricordare:</h4>
    <pre>
    <b>$_SERVER['REQUEST_METHOD']:</b>
    Cosa fa: Determina se la richiesta HTTP è una POST o una GET. In questo caso è usato per verificare
    se il modulo è stato inviato.
    
    <b>isset():</b>
    Cosa fa: Verifica se una variabile è definita e non è null.
    
    <b>form action="" method="post":</b>
    Cosa fa: Il form invia i dati alla stessa pagina utilizzando il metodo POST per garantire che i
    dati siano sicuri e non visibili nell'URL.
    </pre>
    
    <a href="../Slide2/Slide2.html">Indietro agli Esercizi</a>
</body>
</html>

