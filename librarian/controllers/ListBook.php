<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

require ('core/connection.php');



$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();



$queryBooks = $connection->prepare('SELECT COUNT(*) FROM book');
$queryBooks->execute();


if ($queryBooks->fetchColumn() > 0)
{
    $queryBooks = $connection->prepare('SELECT b.title , STRING_AGG(DISTINCT a.author_name, \', \') as authors,  b.location,  b.isbn  , b.book_copy , b.loan_copy  FROM book AS b LEFT JOIN book_author AS ba ON b.book_id = ba.book_id LEFT JOIN author AS a ON ba.author_id = a.author_id LEFT JOIN book_genre AS bg ON b.book_id = bg.book_id LEFT JOIN genre AS g ON bg.genre_id = g.genre_id GROUP BY b.book_id');
$queryBooks->execute();

$columnCount = $queryBooks->columnCount();
$fieldNames = array();

// Retrieve field names
for ($i = 0; $i < $columnCount; $i++) {
    $meta = $queryBooks->getColumnMeta($i);
     // Change column name if it is "publish_date"
     if ($meta['name'] === 'publish_date') {
        $meta['name'] = 'Published Date';
    }

    if ($meta['name'] === 'isbn') {
        $meta['name'] = 'ISBN';
    }
    
    if ($meta['name'] === 'authors') {
        $meta['name'] = 'Authors';
    }
    if ($meta['name'] === 'location') {
        $meta['name'] = 'Location';
    }
    if ($meta['name'] === 'title') {
        $meta['name'] = 'Title';
    }
    if ($meta['name'] === 'book_copy') {
        $meta['name'] = 'Total Copies';
    }
    if ($meta['name'] === 'loan_copy') {
        $meta['name'] = 'Issued Copies';
    }
    if ($meta['name'] === 'genres') {
        $meta['name'] = 'Genres';
    }
    $fieldNames[] = $meta['name'];
}
   
    


echo '
<table id="book-table" class="table tablesorter-bootstrap table-light table-striped table-bordered table-responsive-sm table-hover text-center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>';

// Output field names as table headers
foreach ($fieldNames as $fieldName) {
    echo '<th scope="col">' . $fieldName . '</th>';
}

echo '
        </tr>
    </thead>
    <tbody>';

$num = 1;
foreach ($queryBooks->fetchAll(PDO::FETCH_NUM) as $row) {
    echo '<tr>';
    echo "<th scope='row'>" . $num . "</th>";

    foreach ($row as $key => $cell) {
        if ($key === 0) { // Check if it's the second column (index 1)
            echo "<td><a href='ViewBook.php?title=" . urlencode($cell) . "'>" . $cell . "</a></td>";
        } else {
            echo "<td>" . $cell . "</td>";
        }
    }

    echo '</tr>';
    $num++;
}

echo '
    </tbody>
</table>';

}
else{
    
    echo "<br/><br/><br/><br/><br/>";
    echo "<h3 class='text-light'>You haven't added any book yet. Click on 'Add New Book' to start adding books now.</h4>";
}
?>