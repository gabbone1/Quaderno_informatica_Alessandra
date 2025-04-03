<?php
require 'connessione_db.php';

// Controllo sessione molto base
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'student') {
    header("Location: login.php?errore=accesso_negato");
    exit();
}

$student_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Pannello Studente</title>
</head>
<body>
    <h1>Pannello di Controllo Studente</h1>
    <p>Benvenuto/a, <strong><?php echo htmlspecialchars($username); ?></strong>!</p>
    <ul>
        <li><a href="iscriviti_corso.php">Iscriviti a un nuovo corso</a></li>
        <li><a href="visualizza_corsi.php">Visualizza i miei corsi</a></li>
        <!-- Qui andrebbero link per vedere esercizi, classifiche, ecc. -->
    </ul>
    <p><a href="logout.php">Esci (Logout)</a></p>
</body>
</html>