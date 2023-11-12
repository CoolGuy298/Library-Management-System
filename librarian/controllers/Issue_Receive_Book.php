<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION))
{
    header("Location: /librarian/");
}

require ('core/connection.php');


if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

// if (!empty($_GET["title"]))
// {
//     $book_name = trim($_GET["title"], '"-/\\;');
//     $book_name = strip_tags($book_name);
// }

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$books = $connection->prepare('SELECT title FROM book');
$books->execute();

$books = $books->fetchAll(PDO::FETCH_NUM);



$members = $connection->prepare('SELECT name, username FROM member');
$members->execute();

$members = $members->fetchAll(PDO::FETCH_NUM);

?>