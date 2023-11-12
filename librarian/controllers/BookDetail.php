<?php

$viewBook = $connection->prepare('SELECT * FROM book WHERE title LIKE :book_name');
$viewBook->bindParam(":book_name", $book_name, PDO::PARAM_STR);
$viewBook->execute();

$columnNames = array_keys($viewBook->fetch(PDO::FETCH_ASSOC));

$viewBook->execute();
$bookDetails = $viewBook->fetch(PDO::FETCH_NUM);

$columnNames[4] = "ISBN";
$columnNames[5] = str_replace("_", " ", $columnNames[5]);
$columnNames[6] = "Publisher";


$_SESSION["book_id"] = $bookDetails[0];
$shelf_book_name = urlencode($bookDetails[1]);
$author_name = urlencode($bookDetails[2]);

// Get the publisher name
$publisherId = $bookDetails[6];
$publisherQuery = $connection->prepare('SELECT publisher_name FROM publisher WHERE publisher_id = :publisher_id');
$publisherQuery->bindParam(':publisher_id', $publisherId, PDO::PARAM_INT);
$publisherQuery->execute();
$publisherName = $publisherQuery->fetchColumn();

$bookId = $bookDetails[0];

$authorQuery = $connection->prepare('SELECT a.author_name FROM author a INNER JOIN book_author ba ON a.author_id = ba.author_id WHERE ba.book_id = :book_id');
$authorQuery->bindParam(':book_id', $bookId, PDO::PARAM_INT);
$authorQuery->execute();
$authorNames = $authorQuery->fetchAll(PDO::FETCH_COLUMN);


$genreQuery = $connection->prepare('SELECT g.genre_name FROM genre g INNER JOIN book_genre bg ON g.genre_id = bg.genre_id WHERE bg.book_id = :book_id');
$genreQuery->bindParam(':book_id', $bookId, PDO::PARAM_INT);
$genreQuery->execute();
$genreNames = $genreQuery->fetchAll(PDO::FETCH_COLUMN);

echo '<table id="bookDetailsTable" class="table table-light table-striped table-bordered">';
for ($i = 1; $i <= 9; $i++) {
    echo '<tr>';
    echo '<th class="font-weight-bold" scope="row">' . ucwords($columnNames[$i]) . ':</th>';
    if ($i == 3) { // If it's the 5th column (image URL)
        echo '<td class="bookInfo" style="text-align: center;"><img src="' . $bookDetails[$i] . '" alt="Book Image" class="book-image" style="max-width: 200px;"></td>';
	echo '<tr>';
    echo '<th class="font-weight-bold" scope="row">Author:</th>';
    echo '<td class="bookInfo">';
    if (!empty($authorNames)) {
    echo implode(', ', $authorNames);
     }
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th class="font-weight-bold" scope="row">Genre:</th>';
    echo '<td class="bookInfo">';
    if (!empty($genreNames)) {
    echo implode(', ', $genreNames);
    }
    echo '</td>';
    echo '</tr>';
    } 
	elseif ($i == 6) { // If it's the 7th column (publisher_id)
	    echo '<td class="bookInfo">' . $publisherName . '</td>';
	} 
	
	else {
        echo '<td class="bookInfo">' . $bookDetails[$i] . '</td>';
    }
    echo '</tr>';
}



echo '</table>';
?>