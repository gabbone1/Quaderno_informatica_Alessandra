<?php
require 'connessione_db.php';
$messaggio = ''; // Variabile per messaggi all'utente

// Logica di registrazione (se il form è stato inviato)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // !!! ATTENZIONE: Nessuna validazione/sanificazione input !!!
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Password in chiaro! NON SICURO!
    $user_type = $_POST['user_type'];
    
    $sql = "INSERT INTO users (username, email, password, user_type) VALUES ('$username', '$email', '$password', '$user_type')";

    if (mysqli_query($conn, $sql)) {
        $messaggio = "Registrazione completata con successo! <a href='login.php'>Accedi ora</a>";
    } else {
        // Errore molto generico
        $messaggio = "Errore durante la registrazione: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>
<body>
    <h2>Registrati alla Piattaforma</h2>

    <?php if (!empty($messaggio)): ?>
        <p style="color: <?php echo strpos($messaggio, 'Errore') !== false ? 'red' : 'green'; ?>;">
            <?php echo $messaggio; ?>
        </p>
    <?php endif; ?>

    <?php if (strpos($messaggio, 'completata con successo') === false): // Mostra form solo se non già registrato con successo ?>
    <form action="registrazione.php" method="post">
        Nome Utente: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Sei un:
        <select name="user_type" required>
            <option value="student">Studente</option>
            <option value="teacher">Insegnante</option>
        </select><br>
        <input type="submit" value="Registrati">
    </form>
    <?php endif; ?>

    <p>Hai già un account? <a href="login.php">Accedi</a></p>
</body>
</html>