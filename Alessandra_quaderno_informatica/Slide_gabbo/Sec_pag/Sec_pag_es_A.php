<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio A</title>
</head>
<body>
    <h2>Esercizio A</h2><br>
    <h3>Controllo Credenziali</h3>
    <h3>Accesso a pagina riservata</h3>
    
    <!-- Modulo di login -->
    <form action="EsercizioA.php" method="post">
        <label for="Username"><b>Username</b>: </label>
        <input type="text" name="username" placeholder="Inserisci il nome utente"><br>
        <label for="Password"><b>Password</b>: </label>
        <input type="password" name="password" placeholder="Inserisci la password"><br>
        <input type="submit" value="Invia">
    </form>
    
    <?php
    // Controlla se i dati sono stati inviati tramite il metodo POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $usr = $_POST['username'];
        $psw = $_POST['password'];

        // Verifica le credenziali (username e password)
        if ($usr != "admin" || $psw != "password") {
            echo "Nome utente o password non validi!";
        } else {
            echo "<h4>Benvenuto, $usr <br> nell'area riservata</h4>";
        }
    }

    ?>

    <!-- Spiegazione dell'esercizio -->
    
<h4>Illustrazione dell'Attività:</h4>
<pre>
1. <b>Modulo di Accesso</b>: Il form HTML consente all'utente di inserire un nome utente e una password. 
   I dati vengono inviati al server utilizzando il metodo `POST` alla stessa pagina (`EsercizioA.php`).

2. <b>Verifica delle credenziali</b>:
   - Dopo l'invio dei dati, PHP controlla se il nome utente e la password corrispondono ai valori predefiniti: 
     `admin` come nome utente e `password` come password.
   - Se le credenziali non sono corrette, viene visualizzato un messaggio di errore.
   - Se le credenziali sono valide, viene mostrato un messaggio di benvenuto personalizzato con il nome dell'utente.

3. <b>Link per il ritorno</b>: Un semplice link consente di tornare alla pagina precedente.
</pre>


    <h4>Snippet di Codice PHP Importante:</h4>
    <pre>
    // Controlla se i dati sono stati inviati tramite il metodo POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $usr = $_POST['username'];
        $psw = $_POST['password'];

        // Verifica le credenziali (username e password)
        if ($usr != "admin" || $psw != "password") {
            echo "Nome utente o password non validi!";
        } else {
            echo "'h4' Benvenuto, $usr 'br' nell'area riservata'/h4'";
        }
    }
Lo snippet di codice PHP si occupa di gestire l'accesso all'area riservata, controllando le credenziali fornite nel modulo HTML. 
    </pre>

    <h4>Comandi Importanti da Ricordare:</h4>
    <pre>
    <b>$_POST:</b> È un array superglobale che raccoglie i dati inviati tramite il metodo POST. In questo caso, 
    `$_POST['username']` e `$_POST['password']` recuperano i valori del modulo.

    <b>isset():</b> È una funzione che verifica se una variabile è stata definita e non è null. In questo caso, 
    serve per controllare se i campi del modulo sono stati compilati.

    <b>Operatori di confronto (`!=`):</b> Controllano se due valori sono diversi. In questo caso, vengono usati per verificare 
    se il nome utente e la password corrispondono a quelli corretti.
    </pre>

    <!-- Link per tornare indietro -->
    <a href="../Slide2/Slide2.html">Indietro agli Esercizi</a>


</body>
</html>
