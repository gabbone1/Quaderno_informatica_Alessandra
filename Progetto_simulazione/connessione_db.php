<?php
// !!! ATTENZIONE: Connessione base senza gestione errori robusta !!!
$db_host = "localhost"; // Cambia se necessario
$db_user = "root"; // Cambia se necessario
$db_pass = "";     // Cambia se necessario
$db_name = "language_platform_basic_db"; // Assicurati che esista

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Verifica connessione (molto basica)
if (!$conn) {
    die("Connessione al database fallita: " . mysqli_connect_error());
}

// Imposta il charset a utf8mb4 per supportare caratteri speciali e emoji
mysqli_set_charset($conn, "utf8mb4");

// Avvia la sessione su tutte le pagine
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>