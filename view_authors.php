<?php
require("database.php");

$authors = get_alive_authors();
while ($row = $authors->fetch_assoc()) {
    echo $row["NomeAutore"]." ".$row["TotaleRomanzi"]."<br>";
}
