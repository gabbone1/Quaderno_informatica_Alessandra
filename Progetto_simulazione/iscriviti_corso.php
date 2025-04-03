<?php
require 'connessione_db.php';
$messaggio = '';

// Controllo sessione studente
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'student') {
    header("Location: login.php?errore=accesso_negato");
    exit();
}
$student_id = $_SESSION['user_id'];

// Logica iscrizione (se il form è stato inviato)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // !!! ATTENZIONE: Nessuna validazione/sanificazione input !!!
    $enrollment_code = $_POST['enrollment_code'];

    // 1. Trova l'ID del corso tramite il codice (VULNERABILE a SQL Injection!)
    $sql_find_course = "SELECT course_id FROM courses WHERE enrollment_code = '$enrollment_code'";
    $result_course = mysqli_query($conn, $sql_find_course);

    if ($result_course && mysqli_num_rows($result_course) == 1) {
        $course = mysqli_fetch_assoc($result_course);
        $course_id = $course['course_id'];
        mysqli_free_result($result_course);

        // 2. Inserisci l'iscrizione (VULNERABILE a SQL Injection!)
        $sql_enroll = "INSERT INTO enrollments (student_id, course_id) VALUES ('$student_id', '$course_id')";

        if (mysqli_query($conn, $sql_enroll)) {
            $messaggio = "Iscrizione al corso avvenuta con successo!";
        } else {
             // Gestione errore base (es. già iscritto)
            if (mysqli_errno($conn) == 1062) { // Codice errore per duplicato
                 $messaggio = "Errore: Sei già iscritto/a a questo corso.";
            } else {
                $messaggio = "Errore durante l'iscrizione: " . mysqli_error($conn);
            }
        }
    } else {
        $messaggio = "Codice di iscrizione non valido o corso non trovato.";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Iscriviti a un Corso</title>
</head>
<body>
    <h2>Iscriviti a un Corso</h2>

     <?php if (!empty($messaggio)): ?>
        <p style="color: <?php echo strpos($messaggio, 'Errore') !== false ? 'red' : 'green'; ?>;">
            <?php echo htmlspecialchars($messaggio); ?>
        </p>
         <?php if (strpos($messaggio, 'successo') !== false): ?>
             <p><a href="visualizza_corsi.php">Visualizza i tuoi corsi</a></p>
         <?php endif; ?>
    <?php endif; ?>


    <form action="iscriviti_corso.php" method="post">
        Inserisci il Codice del Corso: <input type="text" name="enrollment_code" required><br>
        <input type="submit" value="Iscriviti">
    </form>
    <p><a href="pannello_studente.php">Torna al Pannello Studente</a></p>
</body>
</html>