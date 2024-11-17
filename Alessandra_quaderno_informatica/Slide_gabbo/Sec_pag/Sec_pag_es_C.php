<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio C</title>
</head>
<body>
<h1>Tabella dei Quadrati e dei Cubi</h1>
<p>Seleziona un numero intero (da 1 a 10)</p>
<form action="" method="POST">
        <select name="valore" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <input type="submit" value="Crea Tabella">
</form>

<?php
if (isset($_POST['valore'])){
    $x = intval($_POST['valore']);
    for($i = 0 ; $i < $x; $i++){
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Numero</th>";
        echo "<th>Quadrato</th>";
        echo "<th>Cubo</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>".($i+1)."</td>";
        echo "<td>".pow(($i+1),2)."</td>";
        echo "<td>".pow(($i+1),3)."</td>";
        echo "</tr>";
        echo "</table>";
        echo "<br>";
    }
}
?>


<h3>Illustrazione dell'Attività</h3>
<h4>Dettagli dell'attività:</h4>
<pre>
Questo compito crea una tabella che visualizza i quadrati e i cubi dei numeri da 1 fino a un numero intero scelto dall'utente (compreso tra 1 e 10). 
L'utente sceglie il numero desiderato da un menu a tendina e, dopo aver inviato il modulo, la tabella viene generata in modo dinamico.
</pre>

<h4>Procedimento Logico:</h4>
<pre>
1. L'utente seleziona un numero da 1 a 10 tramite il menu a tendina.
2. Quando il modulo viene inviato, il numero scelto è recuperato tramite la variabile $_POST['numero'].
3. Un ciclo for viene utilizzato per creare una tabella contenente il numero, il suo quadrato e il suo cubo.
4. La funzione pow() viene impiegata per calcolare il quadrato e il cubo di ciascun numero.
5. La tabella viene generata dinamicamente per ogni numero da 1 fino al numero scelto dall'utente.
</pre>


<h4>Snippet di Codice PHP importante:</h4>
<pre>
// Verifica se è stato inviato un valore tramite POST
if (isset($_POST['valore'])){
    $x = intval($_POST['valore']);  // Converte il valore selezionato in un intero
    for($i = 0 ; $i < $x; $i++){  // Crea la tabella per i numeri da 1 a x
        echo "table border='1'";
        echo "tr";
        echo "thNumero/th";
        echo "thQuadrato/th";
        echo "thCubo/th";
        echo "/tr";
        echo "tr";
        echo "td".($i+1)."/td";  // Numero
        echo "td".pow(($i+1),2)."/td";  // Quadrato
        echo "td".pow(($i+1),3)."/td";  // Cubo
        echo "/tr";
        echo "/table";
        echo "br";
    }
}
</pre>

<h4>Comandi Importanti da Ricordare:</h4>
<pre>
<b>$_POST['valore']:</b>
Cosa fa: Recupera il valore selezionato dal menu a tendina. In questo caso, l'utente seleziona un numero che verrà usato per determinare quante righe della tabella creare.

<b>intval():</b>
Cosa fa: Converte una variabile in un numero intero. Viene utilizzato per assicurarsi che il valore selezionato dall'utente sia trattato come un intero.

<b>pow(base, exp):</b>
Cosa fa: Calcola la potenza di un numero. In questo caso, viene usato per calcolare il quadrato (base elevato alla potenza di 2) e il cubo (base elevato alla potenza di 3) di ciascun numero.
</pre>

<br>
<a href="../Slide2/Slide2.html">Torna Indietro</a>
</body>
</html>
