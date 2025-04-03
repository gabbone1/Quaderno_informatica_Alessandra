<?php
require 'connessione_db.php';

// Controllo sessione molto base
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'teacher') {
    // Reindirizza al login se non autorizzato
    header("Location: login.php?errore=accesso_negato");
    exit();
}

$teacher_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Pannello Insegnante</title>
</head>
<body>
    <h1>Pannello di Controllo Insegnante</h1>
    <p>Benvenuto/a, <strong><?php echo htmlspecialchars($username); ?></strong>!</p>
    <ul>
        <li><a href="crea_corso.php">Crea un nuovo corso</a></li>
        <li><a href="visualizza_corsi.php">Visualizza i tuoi corsi</a></li>
        <!-- Qui andrebbero link per gestire iscritti, aggiungere esercizi, ecc. -->
    </ul>
    <p><a href="logout.php">Esci (Logout)</a></p>
</body>
</html>