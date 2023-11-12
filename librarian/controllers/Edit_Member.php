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

if (!empty($_GET["username"])) {
    $username = trim($_GET["username"], '"-/\\;');
    $username = strip_tags($username);
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$editMember = $connection->prepare('SELECT * FROM member WHERE username LIKE :username');
$editMember->bindParam(":username", $username, PDO::PARAM_STR);
$editMember->execute();

$editMemberData = $editMember->fetch(PDO::FETCH_ASSOC);

require('controllers/Edit_Member_UI.php');
?>


