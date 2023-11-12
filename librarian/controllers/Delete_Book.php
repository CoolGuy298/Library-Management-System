<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

 

require('../core/connection.php');

$book_id = $_SESSION["book_id"];



$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$deleteBookLoan = $connection->prepare('SELECT return_date FROM loan WHERE book_id = :book_id');
$deleteBookLoan->bindParam(":book_id", $book_id);
$deleteBookLoan->execute();

$returnDate = $deleteBookLoan->fetchColumn();

if ($returnDate === null) {
    // The book has not been returned yet, display an error message
    echo 0;
    exit();
} else {
    // The book has been returned, proceed with deleting the loan record
    $deleteBookLoan = $connection->prepare('DELETE FROM loan WHERE book_id = :book_id');
    $deleteBookLoan->bindParam(":book_id", $book_id);
    $deleteBookLoan->execute();
}

// Delete the associated book_genre records
$deleteBookGenre = $connection->prepare('DELETE FROM book_genre WHERE book_id = :book_id');
$deleteBookGenre->bindParam(":book_id", $book_id);
$deleteBookGenre->execute();

// Delete the associated book_author records
$deleteBookAuthor = $connection->prepare('DELETE FROM book_author WHERE book_id = :book_id');
$deleteBookAuthor->bindParam(":book_id", $book_id);
$deleteBookAuthor->execute();


// Delete the book record
$deleteBook = $connection->prepare('DELETE FROM book WHERE book_id = :book_id ');
$deleteBook->bindParam(":book_id", $book_id);

$deleteBook->execute();

echo 1;
