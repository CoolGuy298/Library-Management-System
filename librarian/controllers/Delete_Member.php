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

// $user_name = $_SESSION["user_name"];

// $post_book_info = [];
// foreach ($_POST["memberDetails"] as $memberInfo)
// {
//     $post_member_info[] = strip_tags($memberInfo);
// }



// $connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

// $deleteMember = $connection->prepare('SELECT COUNT(*) FROM issued WHERE issued_to = ? AND issued_to_cnic = ?');
// $deleteMember->execute([$post_member_info[0], $post_member_info[1]]);

// if ($deleteMember->fetchColumn() > 0)
// {
//     echo 3;
// }
// else 
// {
//     $connection = UsersDatabaseConnection::ConnectTo_UserDatabase();
//     $deleteMember = $connection->prepare('DELETE FROM members WHERE name = ? AND cnic = ?');

//     $deleteMember->execute([$post_member_info[0], $post_member_info[1]]);
//     echo 1;
// }

$member_id = $_SESSION["member_id"];



$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$deleteMemberLoan = $connection->prepare('SELECT return_date FROM loan WHERE member_id = :member_id');
$deleteMemberLoan->bindParam(":member_id", $member_id);
$deleteMemberLoan->execute();

$returnDate = $deleteMemberLoan->fetchColumn();

if ($returnDate === null) {
    // The book has not been returned yet, display an error message
    echo 0;
    exit();
} else {
    // The book has been returned, proceed with deleting the loan record
    $deleteMemberLoan = $connection->prepare('DELETE FROM loan WHERE member_id = :member_id');
    $deleteMemberLoan->bindParam(":member_id", $member_id);
    $deleteMemberLoan->execute();
}


// Delete the member record
$deleteMember = $connection->prepare('DELETE FROM member WHERE member_id = :member_id ');
$deleteMember->bindParam(":member_id", $member_id);

$deleteMember->execute();

echo 1;
