<?php
// if (session_status() == PHP_SESSION_NONE) {
    // session_start();
// }

// if (empty($_SESSION)) {
    // header("Location: /library-management/");
    // exit;
// }



require('core/connection.php');

// $user_name = "";
// $book_name = "";

// if (!empty($_SESSION)) {
    // $user_name = $_SESSION["user_name"];
// }

if (!empty($_GET["title"])) {
    $book_name = trim($_GET["title"], '"-/\\;');
    $book_name = strip_tags($book_name);
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$editBook = $connection->prepare(' SELECT b.book_id, b.*, a.author_name AS author_name, g.genre_name AS genre_name, p.publisher_name AS publisher_name
    FROM book AS b
    LEFT JOIN book_author AS ba ON b.book_id = ba.book_id
    LEFT JOIN author AS a ON ba.author_id = a.author_id
    LEFT JOIN book_genre AS bg ON b.book_id = bg.book_id
    LEFT JOIN genre AS g ON bg.genre_id = g.genre_id
    LEFT JOIN publisher AS p ON b.publisher_id = p.publisher_id
    WHERE b.title LIKE :book_name');

$editBook->bindParam(":book_name", $book_name, PDO::PARAM_STR);
$editBook->execute();


    $editBookData = $editBook->fetch(PDO::FETCH_ASSOC);
    
  // Get the list of genres for the book
$bookGenres = $connection->prepare('SELECT g.genre_name AS genre_name FROM book_genre AS bg INNER JOIN genre AS g ON bg.genre_id = g.genre_id WHERE bg.book_id = :book_id');
$bookGenres->bindParam(":book_id", $editBookData['book_id'], PDO::PARAM_INT);
$bookGenres->execute();
$genresList = $bookGenres->fetchAll(PDO::FETCH_COLUMN);

// Get the list of authors for the book
$bookAuthors = $connection->prepare('SELECT a.author_name FROM book_author AS ba INNER JOIN author AS a ON ba.author_id = a.author_id WHERE ba.book_id = :book_id');
$bookAuthors->bindParam(":book_id", $editBookData['book_id'], PDO::PARAM_INT);
$bookAuthors->execute();
$authorsList = $bookAuthors->fetchAll(PDO::FETCH_COLUMN);

// Convert arrays to comma-separated strings
$authorsString = implode(',', $authorsList);
$genresString = implode(',', $genresList);
    require('controllers/Edit_Book_UI.php');

?>
?>

