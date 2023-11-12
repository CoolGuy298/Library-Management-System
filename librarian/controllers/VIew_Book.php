<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}


require ('core/connection.php');


if (!empty($_GET["title"])) 
{
    $book_name = trim($_GET["title"], '"-/\\;');
    $book_name = strip_tags($book_name);
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();


$viewBook = $connection->prepare('SELECT COUNT(*) FROM book WHERE title LIKE :book_name');

$viewBook->bindParam(":book_name", $book_name, PDO::PARAM_STR);

$viewBook->execute();


if ($viewBook->fetchColumn() > 0)
{
    require('controllers/BookDetail.php');

}
else{

  echo "Book not found";
}

?>