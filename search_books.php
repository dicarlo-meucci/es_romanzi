<?php
require("database.php");

if (!isset($_GET["book_code"]))
{
    echo "Errore: nessun codice è stato fornito";
    exit();
}

$books = get_book($_GET["book_code"]);
while ($row = $books->fetch_assoc()) {
    echo $row["Titolo"]."<br>".$row["NomeAutore"]."<br> Nato: ".$row["AnnoN"]."<br> Morto: ".$row["AnnoM"];
}

?>