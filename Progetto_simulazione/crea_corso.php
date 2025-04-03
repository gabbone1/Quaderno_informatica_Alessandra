<?php
require 'connessione_db.php';
$messaggio = '';

// Controllo sessione insegnante
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'teacher') {
    header("Location: login.php?errore=accesso_negato");
    exit();
}
$teacher_id = $_SESSION['user_id'];

// Logica creazione corso (se il form è stato inviato)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // !!! ATTENZIONE: Nessuna validazione/sanificazione input !!!
    $course_name = $_POST['course_name'];
    $language = $_POST['language'];
    $difficulty_level = $_POST['difficulty_level'];

    // Genera un codice iscrizione semplice (NON robusto, potrebbe non essere unico)
    $enrollment_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 6);

    // Query SQL diretta (VULNERABILE a SQL Injection!)
    $sql = "INSERT INTO courses (teacher_id, course_name, language, difficulty_level, enrollment_code) VALUES ('$teacher_id', '$course_name', '$language', '$difficulty_level', '$enrollment_code')";

    if (mysqli_query($conn, $sql)) {
        $messaggio = "Corso creato con successo! <br><b>Codice Iscrizione: " . $enrollment_code . "</b> (Condividi questo codice con gli studenti)";
    } else {
         // Gestione errore base (es. codice duplicato)
        if (mysqli_errno($conn) == 1062) {
             $messaggio = "Errore: Problema nella generazione del codice. Riprova.";
        } else {
            $messaggio = "Errore durante la creazione del corso: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Crea Nuovo Corso</title>
</head>
<body>
    <h2>Crea un Nuovo Corso</h2>

    <?php if (!empty($messaggio)): ?>
        <p style="color: <?php echo strpos($messaggio, 'Errore') !== false ? 'red' : 'green'; ?>;">
            <?php echo nl2br(htmlspecialchars($messaggio)); // nl2br per andare a capo col codice ?>
        </p>
         <?php if (strpos($messaggio, 'successo') !== false): ?>
            <p><a href="visualizza_corsi.php">Visualizza i tuoi corsi</a></p>
        <?php endif; ?>
    <?php endif; ?>


    <form action="crea_corso.php" method="post">
        Nome Corso: <input type="text" name="course_name" required><br>
        Lingua: <input type="text" name="language" required placeholder="Es. Inglese, Spagnolo"><br>
        Livello Difficoltà: <input type="text" name="difficulty_level" required placeholder="Es. B1, C2"><br>
        <input type="submit" value="Crea Corso">
    </form>
    <p><a href="pannello_insegnante.php">Torna al Pannello Insegnante</a></p>
</body>
</html>