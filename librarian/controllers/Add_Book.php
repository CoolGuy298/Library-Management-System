<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION) || empty($_POST))
{
    header("Location: /librarian/");
}

require ('../core/connection.php');



$title = $_POST["title"];
$description = $_POST["description"];
$image = $_POST["image"];
$ISBN = $_POST["ISBN"];
$publish_date = $_POST["publish_date"];
$publisher_name = $_POST["publisher_name"];

$book_copy = $_POST["book_copy"];
$location = $_POST["location"];



$title = strip_tags($title);
$description = strip_tags($description);
$image = strip_tags($image);
$ISBN = strip_tags($ISBN);
$publish_date = strip_tags($publish_date);
$publisher_name = strip_tags($publisher_name);

$book_copy = (int)strip_tags($book_copy);
$location = strip_tags($location);

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
// Check if the book title already exists

$checkTitle = $connection->prepare('SELECT COUNT(*) FROM book WHERE title = :title');
$checkTitle->bindParam(":title", $title);
$checkTitle->execute();
$bookExists = $checkTitle->fetchColumn();

if ($bookExists) {
    $_SESSION["addBookError"] = "Book with the same title already exists.";
    header("Location: ../AddBook.php");
    exit();
}
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Insert publisher information into publisher table
$insertPublisher = $connection->prepare('INSERT INTO publisher (publisher_id, publisher_name) VALUES (DEFAULT, :publisher_name)');
$insertPublisher->bindParam(":publisher_name", $publisher_name);

$insertPublisher->execute();

// Retrieve the generated publisher_id
$publisher_id = $connection->lastInsertId('publisher_publisher_id_seq');

$resetSequence = $connection->prepare('SELECT setval(\'book_book_id_seq\', (SELECT COALESCE(MAX(book_id), 0) FROM book) + 1, false)');
$resetSequence->execute();

// Insert the new book record
$addBook = $connection->prepare('INSERT INTO book (book_id, title, description, image, ISBN, publish_date, publisher_id, book_copy, location) VALUES (DEFAULT, :title, :description, :image, :ISBN, :publish_date, :publisher_id, :book_copy, :location)');
$addBook->bindParam(":title", $title);
$addBook->bindParam(":description", $description);
$addBook->bindParam(":image", $image);
$addBook->bindParam(":ISBN", $ISBN);
$addBook->bindParam(":publish_date", $publish_date);
$addBook->bindParam(":publisher_id", $publisher_id, PDO::PARAM_INT);
$addBook->bindParam(":book_copy", $book_copy, PDO::PARAM_INT);
$addBook->bindParam(":location", $location);

$addBook->execute();


$book_id = $connection->lastInsertId(); // Get the ID of the newly inserted book

$genres = $_POST["genres"];
$genre_names = explode(',', $genres);

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

    // Insert the relationship into the book_genre table
    $insertBookGenre = $connection->prepare('INSERT INTO book_genre (book_id, genre_id) VALUES (:book_id, :genre_id)');
    $insertBookGenre->bindParam(":book_id", $book_id, PDO::PARAM_INT);
    $insertBookGenre->bindParam(":genre_id", $genre_id, PDO::PARAM_INT);
    $insertBookGenre->execute();
}


$authors = $_POST["authors"];
$author_names = explode(',', $authors);

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

    // Insert the relationship into the book_author table
    $insertBookAuthor = $connection->prepare('INSERT INTO book_author (book_id, author_id) VALUES (:book_id, :author_id)');
    $insertBookAuthor->bindParam(":book_id", $book_id, PDO::PARAM_INT);
    $insertBookAuthor->bindParam(":author_id", $author_id, PDO::PARAM_INT);
    $insertBookAuthor->execute();
}

$_SESSION["addBookSuccess"] = $title;

header("Location: /librarian/");
?>

