<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION) || empty($_POST)) {
    header("Location: /librarian/");
    exit();
}

require('../core/connection.php');

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$IssueReceive = (int)$_POST["IssueReceive"];
$member = urldecode($_POST["member"]);
$username = urldecode($_POST["username"]);

if (empty($_POST["bookName"])) {
    if ($IssueReceive <= 0) {
        $bookList = $connection->prepare('SELECT title FROM book');
    } else {
        $bookList = $connection->prepare('SELECT b.title
        FROM book AS b
        INNER JOIN loan AS l ON l.book_id = b.book_id
        INNER JOIN member AS m ON m.member_id = l.member_id
        WHERE m.name = :member AND m.username = :username AND l.return_date IS NULL');
        $bookList->bindParam(":member", $member);
        $bookList->bindParam(":username", $username);
    }

    $bookList->execute();
    $bookList = $bookList->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($bookList);
} else {
    $bookName = urldecode($_POST["bookName"]);

    if ($IssueReceive <= 0) {
        $bookDetail = $connection->prepare('SELECT b.location, b.book_copy, b.loan_copy
        FROM book AS b
        WHERE b.title = :bookName');
        $bookDetail->bindParam(":bookName", $bookName);
    } else {
        $detail_sql = "
            SELECT book.location,  loan.due_date,loan.borrow_date
            FROM book 
            JOIN loan ON book.book_id = loan.book_id
            JOIN member ON member.member_id = loan.member_id
            WHERE member.name = :member AND member.username = :username AND book.title = :bookName
        ";
        $bookDetail = $connection->prepare($detail_sql);
        $bookDetail->bindParam(":member", $member);
        $bookDetail->bindParam(":username", $username);
        $bookDetail->bindParam(":bookName", $bookName);
    }

    $bookDetail->execute();

    $bookDetail = $bookDetail->fetch(PDO::FETCH_ASSOC);
    echo json_encode($bookDetail);
}
