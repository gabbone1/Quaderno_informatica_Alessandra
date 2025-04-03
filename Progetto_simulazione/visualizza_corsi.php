<?php
require 'connessione_db.php';

// Controllo sessione generico (deve essere loggato)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?errore=accesso_negato");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$username = $_SESSION['username'];

$corsi = []; // Array per contenere i corsi da visualizzare

if ($user_type == 'teacher') {
    // Insegnante: Seleziona i corsi creati da lui/lei
    // Query SQL diretta (VULNERABILE a SQL Injection!)
    $sql = "SELECT course_id, course_name, language, difficulty_level, enrollment_code FROM courses WHERE teacher_id = '$user_id' ORDER BY course_name";
    $page_title = "I Miei Corsi Creati";
    $back_link = "pannello_insegnante.php";
} elseif ($user_type == 'student') {
    // Studente: Seleziona i corsi a cui è iscritto (JOIN)
    // Query SQL diretta (VULNERABILE a SQL Injection!)
    $sql = "SELECT c.course_id, c.course_name, c.language, c.difficulty_level
            FROM courses c
            JOIN enrollments e ON c.course_id = e.course_id
            WHERE e.student_id = '$user_id'
            ORDER BY c.course_name";
     $page_title = "I Miei Corsi";
     $back_link = "pannello_studente.php";
} else {
     // Tipo utente sconosciuto, non dovrebbe succedere
     header("Location: login.php");
     exit();
}

$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $corsi[] = $row; // Aggiunge ogni riga (corso) all'array
    }
    mysqli_free_result($result);
} else {
    // Gestione errore query molto base
    echo "Errore nel recupero dei corsi: " . mysqli_error($conn);
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1><?php echo $page_title; ?></h1>
    <p>Utente: <?php echo htmlspecialchars($username); ?></p>

    <?php if (count($corsi) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome Corso</th>
                    <th>Lingua</th>
                    <th>Livello</th>
                    <?php if ($user_type == 'teacher'): ?>
                        <th>Codice Iscrizione</th>
                        <th>Azioni</th>
                    <?php else: ?>
                         <th>Azioni</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($corsi as $corso): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($corso['course_name']); ?></td>
                        <td><?php echo htmlspecialchars($corso['language']); ?></td>
                        <td><?php echo htmlspecialchars($corso['difficulty_level']); ?></td>
                         <?php if ($user_type == 'teacher'): ?>
                            <td><strong><?php echo htmlspecialchars($corso['enrollment_code']); ?></strong></td>
                             <td><a href="#">Gestisci</a></td> <!-- Link Placeholder -->
                         <?php else: ?>
                             <td><a href="#">Accedi al Corso</a></td> <!-- Link Placeholder -->
                         <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>
            <?php
                if ($user_type == 'teacher') {
                    echo "Non hai ancora creato nessun corso. <a href='crea_corso.php'>Creane uno ora!</a>";
                } else {
                    echo "Non sei ancora iscritto/a a nessun corso. <a href='iscriviti_corso.php'>Iscriviti usando un codice!</a>";
                }
            ?>
        </p>
    <?php endif; ?>

    <p><a href="<?php echo $back_link; ?>">Torna al Pannello</a></p>
    <p><a href="logout.php">Esci (Logout)</a></p>

</body>
</html>