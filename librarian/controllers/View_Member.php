<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require('core/connection.php');

if (!empty($_GET["username"])) {
    $username = trim($_GET["username"], '"-/\\;');
    $username = strip_tags($username);
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$viewMember = $connection->prepare('SELECT COUNT(*) FROM member WHERE username LIKE :username');
$viewMember->bindParam(":username", $username, PDO::PARAM_STR);
$viewMember->execute();

if ($viewMember->fetchColumn() > 0) {
    require('controllers/MemberDetail.php');
} else {
    echo "Member not found";
}

?>
