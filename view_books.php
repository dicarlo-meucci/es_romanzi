<?php
require("database.php");

if (!isset($_GET["author"]))
{
    echo "Errore: nessun nome è stato fornito";
    exit();
}

$books = get_books($_GET["author"]);
while ($row = $books->fetch_assoc()) {
    echo $row["Titolo"]."<br>";
}

?>