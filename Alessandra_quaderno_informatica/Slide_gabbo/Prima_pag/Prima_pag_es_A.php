<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio A</title>
</head>
<body>
<?php
echo "<h1>Esercizio A</h1>";
echo "<p>Creazione di una tabella Pitagorica</p>";
echo "<h1>Tabella Pitagorica</h1>";
echo '<table border="1">';
for ($x = 1; $x <= 10; $x++) {
    echo "<tr>";
    for ($y = 1; $y <= 10; $y++) {
        $l = $x * $y;
        echo "<td>$l</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
<h3>Illustrazione dell'attività</h3>
<h4>Dettagli dell'attività:</h4>
<pre>
L'attività richiede la realizzazione di una Griglia Pitagorica, una matrice di numeri usata per mostrare i risultati delle moltiplicazioni tra numeri interi.
In una griglia di dimensioni 10x10, ogni cella contiene il risultato del prodotto tra il numero della riga e quello della colonna.
</pre>
<h4>Procedimento Logico:</h4>
<pre>
Il procedimento logico per svolgere l'attività si articola così:

-Creare la struttura della griglia: Ogni riga rappresenta un valore fisso di un moltiplicatore, e ogni colonna un altro moltiplicatore.

-Calcolare i risultati: Il contenuto di ciascuna cella è dato dal prodotto tra i due valori, R x C.

-Creare il formato in HTML: Si utilizza il tag 'table' per costruire la griglia e si riempiono le celle con i risultati delle operazioni.
</pre>
<h4>Porzione Di Codice PHP rilevante</h4>

<pre>.php
    for ($y = 1; $y <= 10; $y++) {
    $l = $x * $y;
    echo "td" $l "/td";
}
questo snippet è il "Cuore" dell'Esercizio, permette di generare una tabella utilizzando un ciclo "For".
usando la variabile di comodo $l per conservare il dato all'interno della tabella. </pre>
<a href="../Slide1/Slide1.html">Torna Indietro</a>
</body>
</html>