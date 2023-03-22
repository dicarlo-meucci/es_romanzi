<?php
$db_conn = new mysqli("localhost", "root", "", "libri")
    or die("Connection failed: " . $db_conn->connect_error);
function get_alive_authors()
{
    global $db_conn;

    $query = $db_conn->prepare("SELECT a.NomeAutore, COUNT(r.CodiceR) as TotaleRomanzi
    FROM Romanzi r INNER JOIN Autori a ON (r.NomeAutore = a.NomeAutore)
    WHERE a.AnnoM IS NULL
    GROUP BY a.NomeAutore");
    $query->execute();
    $result = $query->get_result();
    return $result;
}

function get_book($code)
{
    global $db_conn;

    $query = $db_conn->prepare("SELECT a.*, r.Titolo FROM Romanzi r INNER JOIN Autori a ON (r.NomeAutore = a.NomeAutore) WHERE r.CodiceR = ?");
    $query->bind_param("i", $code);
    $query->execute();
    $result = $query->get_result();
    return $result;
}

function get_books($author)
{
    global $db_conn;

    $query = $db_conn->prepare("SELECT Titolo FROM Romanzi r INNER JOIN Autori a ON (r.NomeAutore = a.NomeAutore) WHERE a.NomeAutore = ?");
    $query->bind_param("s", $author);
    $query->execute();
    $result = $query->get_result();
    return $result;
}

function get_authors()
{
    global $db_conn;

    $query = $db_conn->prepare("SELECT NomeAutore FROM Autori");
    $query->execute();
    $result = $query->get_result();
    return $result;
}