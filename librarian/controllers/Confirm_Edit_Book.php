<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION) || empty($_POST)) {
    header("Location: /librarian/");
    exit;
}

require('../core/connection.php');

$book_id = $_POST["book_id"]; 

$title = $_POST["title"];
$description = $_POST["description"];
$image = $_POST["image"];
$ISBN = $_POST["ISBN"];
$publish_date = $_POST["publish_date"];
$publisher_name = $_POST["publisher_name"];

$book_copy = $_POST["book_copy"];
$location = $_POST["location"];

// Update the book record
$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$updateBook = $connection->prepare('UPDATE book SET title = :title, description = :description, image = :image, ISBN = :ISBN, publish_date = :publish_date, book_copy = :book_copy, location = :location WHERE book_id = :book_id');
$updateBook->bindParam(":title", $title);
$updateBook->bindParam(":description", $description);
$updateBook->bindParam(":image", $image);
$updateBook->bindParam(":ISBN", $ISBN);
$updateBook->bindParam(":publish_date", $publish_date);
$updateBook->bindParam(":book_copy", $book_copy, PDO::PARAM_INT);
$updateBook->bindParam(":location", $location);
$updateBook->bindParam(":book_id", $book_id, PDO::PARAM_INT);
$updateBook->execute();

// Update the publisher information
$insertPublisher = $connection->prepare('INSERT INTO publisher (publisher_id, publisher_name) VALUES (DEFAULT, :publisher_name)');

$insertPublisher->bindParam(":publisher_name", $publisher_name);
$insertPublisher->execute();

// Update genres
$genres = $_POST["genres"];
$genre_names = explode(',', $genres);

// Delete existing book_genre records for the book_id
$deleteBookGenre = $connection->prepare('DELETE FROM book_genre WHERE book_id = :book_id');
$deleteBookGenre->bindParam(":book_id", $book_id, PDO::PARAM_INT);
$deleteBookGenre->execute();

foreach ($genre_names as $genre_name) {
    $genre_name = trim(strip_tags($genre_name));

    // Check if the genre already exists in the genre table
    $selectGenre = $connection->prepare('SELECT genre_id FROM genre WHERE genre_name = :genre_name');
    $selectGenre->bindParam(":genre_name", $genre_name);
    $selectGenre->execute();

    $genre_id = $selectGenre->fetchColumn();

    if (!$genre_id) {
        // If the genre doesn't exist, insert it into the genre table
        $insertGenre = $connection->prepare('INSERT INTO genre (genre_name) VALUES (:genre_name)');
        $insertGenre->bindParam(":genre_name", $genre_name);
        $insertGenre->execute();

        $genre_id = $connection->lastInsertId(); // Get the ID of the newly inserted genre
    }

    // Insert the new book_genre relationship
    $insertBookGenre = $connection->prepare('INSERT INTO book_genre (book_id, genre_id) VALUES (:book_id, :genre_id)');
    $insertBookGenre->bindParam(":book_id", $book_id, PDO::PARAM_INT);
    $insertBookGenre->bindParam(":genre_id", $genre_id, PDO::PARAM_INT);
    $insertBookGenre->execute();
}

// Update authors
$authors = $_POST["authors"];
$author_names = explode(',', $authors);

// Delete existing book_author records for the book_id
$deleteBookAuthor = $connection->prepare('DELETE FROM book_author WHERE book_id = :book_id');
$deleteBookAuthor->bindParam(":book_id", $book_id, PDO::PARAM_INT);
$deleteBookAuthor->execute();

foreach ($author_names as $author_name) {
    $author_name = trim(strip_tags($author_name));

    // Check if the author already exists in the author table
    $selectAuthor = $connection->prepare('SELECT author_id FROM author WHERE author_name = :author_name');
    $selectAuthor->bindParam(":author_name", $author_name);
    $selectAuthor->execute();

    $author_id = $selectAuthor->fetchColumn();

    if (!$author_id) {
        // If the author doesn't exist, insert it into the author table
        $insertAuthor = $connection->prepare('INSERT INTO author (author_name) VALUES (:author_name)');
        $insertAuthor->bindParam(":author_name", $author_name);
        $insertAuthor->execute();

        $author_id = $connection->lastInsertId(); // Get the ID of the newly inserted author
    }

    // Insert the new book_author relationship
    $insertBookAuthor = $connection->prepare('INSERT INTO book_author (book_id, author_id) VALUES (:book_id, :author_id)');
    $insertBookAuthor->bindParam(":book_id", $book_id, PDO::PARAM_INT);
    $insertBookAuthor->bindParam(":author_id", $author_id, PDO::PARAM_INT);
    $insertBookAuthor->execute();
}

$_SESSION["editBookSuccess"] = $title;

header("Location: /librarian/");

