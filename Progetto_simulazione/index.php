<?php
// 1. Includi la connessione e avvia la sessione
require_once 'connessione_db.php';

// 2. Controlla se l'utente è già loggato
if (isset($_SESSION['user_id'])) {
    // Utente loggato, reindirizza al pannello appropriato
    if ($_SESSION['user_type'] == 'teacher') {
        header("Location: pannello_insegnante.php");
    } elseif ($_SESSION['user_type'] == 'student') {
        header("Location: pannello_studente.php");
    } else {
        // Caso strano, manda al login per sicurezza
        header("Location: login.php");
    }
    exit(); // Termina lo script dopo il redirect
}

// 3. Se l'utente NON è loggato, mostra la pagina HTML sottostante
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Piattaforma Lingue - Benvenuto</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            margin-bottom: 30px;
        }
        .buttons a {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-btn {
            background-color: #007bff;
            color: white;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
        .register-btn {
            background-color: #28a745;
            color: white;
        }
        .register-btn:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Piattaforma di Apprendimento Lingue</h1>
        <p>Accedi con il tuo account o registrati per iniziare.</p>

        <div class="buttons">
            <a href="login.php" class="login-btn">Login</a>
            <a href="registrazione.php" class="register-btn">Registrati</a>
        </div>
    </div>
</body>
</html>