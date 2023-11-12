<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION)) {
    header("Location: /librarian/");
}

require('../core/connection.php');

if (!empty($_SESSION)) {
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

if (!empty($_GET["name"])) {
    $book_name = trim($_GET["name"], '"-/\\;');
    $book_name = strip_tags($book_name);
}

$IssueReceive = $_POST["IssueReceive"];
$member = $_POST["member"];
$book_name = $_POST["bookName"];
$total_copies = $_POST["book_copy"];
$issued_copies = $_POST["loan_copy"];
$issue_date = $_POST["borrow_date"];
$due_date = $_POST["due_date"];

$IssueReceive = (int) strip_tags($IssueReceive);
$member = strip_tags($member);
$book_name = strip_tags($book_name);

$total_copies = (int) strip_tags($total_copies);
$issued_copies = (int) strip_tags($issued_copies);
$issue_date = strip_tags($issue_date);
$due_date = strip_tags($due_date);

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($IssueReceive <= 0) {
    $dateReturn = new DateTime($due_date);
    $dateIssue = new DateTime($issue_date);

    if ($dateReturn < $dateIssue) {
        $_SESSION["date_error"] = $book_name;
        header('Location: /librarian/issue-receive-book.php?title=' . urlencode($book_name));
        exit();
    }

    if ($issued_copies < $total_copies) {
        $bookExists = $connection->prepare('SELECT COUNT(*) FROM loan l
        JOIN book b ON b.book_id = l.book_id
        JOIN member m ON m.member_id = l.member_id
        WHERE b.title = :book_name AND m.name = :member
		AND l.return_date is null');
        $bookExists->bindParam(":book_name", $book_name);
        $bookExists->bindParam(":member", $member);

        $bookExists->execute();

        if ($bookExists->fetchColumn() > 0) {
            $_SESSION["already_issued_book"] = $book_name;
            $_SESSION["already_issued_member"] = $member;

            header('Location: /librarian/issue-receive-book.php');
            exit();
        } else {
            $bookid = $connection->prepare('SELECT book_id FROM book WHERE title = :book_name');
            $bookid->bindParam(":book_name", $book_name);
            $bookid->execute();
            $bookid = $bookid->fetch(PDO::FETCH_ASSOC);
            $bookid = (int) $bookid["book_id"];

            $member_id_query = $connection->prepare('SELECT member_id FROM member WHERE name = :member_name');
            $member_id_query->bindParam(":member_name", $member);
            $member_id_query->execute();
            $member_id = $member_id_query->fetchColumn();

            $issueBook = $connection->prepare('INSERT INTO loan (librarian_id,book_id, member_id, borrow_date, due_date) VALUES (:librarian_id,:bookid, :member_id, :borrow_date, :due_date)');
            $issueBook->bindParam(":bookid", $bookid);
            $issueBook->bindParam(":member_id", $member_id);
            $issueBook->bindParam(":borrow_date", $issue_date);
            $issueBook->bindParam(":due_date", $due_date);
            $issueBook->bindParam(":librarian_id", $user_id);
            $issueBook->execute();
            $issued_copies += 1;

            $update_issued_copies = $connection->prepare('UPDATE book SET loan_copy = :issued_copies WHERE book_id = :bookid');

            $update_issued_copies->bindParam(":issued_copies", $issued_copies);
            $update_issued_copies->bindParam(":bookid", $bookid);

            $update_issued_copies->execute();

            $_SESSION["issue_success"] = $book_name;
            $_SESSION["issue_member"] = $member;
            header('Location: /librarian/');
            exit();
        }
    } else {
        $_SESSION["issue_book_name"] = $book_name;
        header('Location: /librarian/issue-receive-book.php');
        exit();
    }
} else {
    $bookExists = $connection->prepare('SELECT COUNT(*) FROM loan l
    JOIN book b ON b.book_id = l.book_id
    JOIN member m ON m.member_id = l.member_id
    WHERE b.title = :book_name AND m.name = :member
	AND l.return_date is null');
    $bookExists->bindParam(":book_name", $book_name);
    $bookExists->bindParam(":member", $member);

    $bookExists->execute();

    if ($bookExists->fetchColumn() > 0) {
        $bookid = $connection->prepare('SELECT l.book_id FROM loan l
        JOIN book b ON b.book_id = l.book_id
        JOIN member m ON m.member_id = l.member_id
        WHERE b.title = :book_name AND m.name = :member
		');
        $bookid->bindParam(":book_name", $book_name);
        $bookid->bindParam(":member", $member);

        $bookid->execute();
        $bookid = (int) $bookid->fetchColumn();
        date_default_timezone_set('Asia/Karachi');
        $currentDate = date('Y-m-d');
        $return_date = $currentDate;
        // $ReceiveBook = $connection->prepare('DELETE FROM loan l
        // USING book b, member m
        // WHERE b.book_id = l.book_id
        // AND m.member_id = l.member_id
        // AND b.title = :book_name
        // AND m.name = :member_name');

        $loanid = $connection->prepare('SELECT l.loan_id FROM loan l
        JOIN book b ON b.book_id = l.book_id
        JOIN member m ON m.member_id = l.member_id
        WHERE b.title = :book_name AND m.name = :member AND l.return_date IS NULL;');
        $loanid->bindParam(":book_name", $book_name);
        $loanid->bindParam(":member", $member);

        $loanid->execute();
        $loanid = (int) $loanid->fetchColumn();

        $ReceiveBook = $connection->prepare('UPDATE loan
        SET return_date = :return_date
        WHERE loan_id = :loan_id;
        ');
    
        $ReceiveBook->bindParam(":return_date", $return_date);
        $ReceiveBook->bindParam(":loan_id", $loanid);
        
        $ReceiveBook->execute();

        $issued_copies = $connection->prepare('SELECT loan_copy FROM book WHERE book_id = :bookid');
        $issued_copies->bindParam(":bookid", $bookid);
        $issued_copies->execute();

        $issued_copies = (int) $issued_copies->fetchColumn();

        $issued_copies -= 1;

        $update_issued_copies = $connection->prepare('UPDATE book SET loan_copy = :issued_copies WHERE book_id = :bookid');

        $update_issued_copies->bindParam(":issued_copies", $issued_copies);
        $update_issued_copies->bindParam(":bookid", $bookid);

        $update_issued_copies->execute();

        $_SESSION["received_book_name"] = $book_name;
        $_SESSION["received_book_member"] = $member;

        header("Location: /librarian/");
    }
}
