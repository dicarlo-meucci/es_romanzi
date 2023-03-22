<?php
require("database.php");
?>

<form action="view_books.php" method="get">
    <label for="author">Scegli un autore</label>
    <br>
    <select name="author">
        <?php
        $authors = get_authors();
        while ($row = $authors->fetch_assoc()) {
            echo "<option value='" . $row["NomeAutore"] . "'>" . $row["NomeAutore"] . "</option>";
        }
        ?>
    </select>
    <button>Cerca</button>
</form>

<form action="search_books.php" method="get">
    <label for="book_code">Scrivi il codice</label>
    <br>
    <input name="book_code" type=number>
    <button>Cerca</button>
</form>

<a href="view_authors.php">visualizza gli autori in vita</a>