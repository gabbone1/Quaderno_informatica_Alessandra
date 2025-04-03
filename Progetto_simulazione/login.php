<?php
require 'connessione_db.php';
$messaggio_errore = '';

// Logica di login (se il form è stato inviato)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password']; 

    
    $sql = "SELECT user_id, username, user_type FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        // Utente trovato
        $user = mysqli_fetch_assoc($result);

        // Imposta variabili di sessione
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        mysqli_free_result($result);
        mysqli_close($conn);

        // Reindirizza al pannello corretto
        if ($user['user_type'] == 'teacher') {
            header("Location: pannello_insegnante.php");
        } else {
            header("Location: pannello_studente.php");
        }
        exit(); // Termina lo script dopo il reindirizzamento

    } else {
        // Utente non trovato o password errata
        $messaggio_errore = "Nome utente o password non validi.";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Accedi alla Piattaforma</h2>

    <?php if (!empty($messaggio_errore)): ?>
        <p style="color: red;"><?php echo $messaggio_errore; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        Nome Utente: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <p>Non hai un account? <a href="registrazione.php">Registrati</a></p>
</body>
</html>