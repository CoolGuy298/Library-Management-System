<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require('core/connection.php');

$user_name = "";
$user_id = 0;

if (!empty($_SESSION)) {
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$queryIssuedBooks = $connection->prepare('SELECT loan.*,librarian.user_name as user_name,  book.title, member.name AS member_name
    FROM loan
    INNER JOIN book ON loan.book_id = book.book_id
    INNER JOIN member ON loan.member_id = member.member_id
    INNER JOIN librarian ON loan.librarian_id = librarian.librarian_id

    where return_date is null;
   ');
$queryIssuedBooks->execute();

if ($queryIssuedBooks->rowCount() > 0) {
    

    $queryIssuedBooks = $queryIssuedBooks->fetchAll(PDO::FETCH_ASSOC);

    echo '<table id="issued-books-table" class="table table-light table-striped table-bordered table-responsive-sm table-hover text-center">';
    echo "
        <thead class='thead-dark'>
            <th scope='col'>No.</th>
            <th scope='col'>Name</th>
            <th scope='col'>Issued By</th>
            <th scope='col'>Issued To</th>
            <th scope='col'>Issue Date</th>
            <th scope='col'>Due Date</th>
            
            <th scope='col'>Receive Book</th>
        </thead>
        <tbody>
    ";

    $num = 1;
    foreach ($queryIssuedBooks as $issuedBook) {
        echo "\n    <tr>";
        echo "\n        <td>$num</td>";
        echo "\n        <td><a href='view-book?name=" . urlencode($issuedBook['title']) . "'>" . $issuedBook['title'] . "</a></td>";
        // Fetch other columns as needed
        echo "\n        <td>" . $issuedBook['user_name'] . "</td>";
        echo "\n        <td>" . $issuedBook['member_name'] . "</td>";
        echo "\n        <td>" . date('jS F, Y', strtotime($issuedBook['borrow_date'])) . "</td>";
        echo "\n        <td>" . date('jS F, Y', strtotime($issuedBook['due_date'])) . "</td>";
       
        echo "\n        <td><a class='btn btn-primary' href='issue-receive-book.php?receive=1&title=" . urlencode($issuedBook['title']) . "&member=" . urlencode($issuedBook['member_name']) . "'>Receive</a></td>";
        echo "\n    </tr>";
        $num++;
    }

    echo "\n    </tbody>";
    echo "\n</table>\n";
} else {
    echo "<br/><br/><br/><br/><br/>";
    echo "<h3 class='text-light'>You haven't issued any book yet. Click on 'Issue Book' to start issuing members now.</h4>";
}
?>
