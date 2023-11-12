<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION) || empty($_POST)) {
    header("Location: /librarian/");
    exit;
}

require('../core/connection.php');

$member_id = $_POST["member_id"]; // Assuming you have a hidden input field in the form containing the member ID

$memberName = $_POST["memberName"];
$memberPhone = $_POST["memberPhone"];
$memberAddress = $_POST["memberAddress"];
$memberUsername = $_POST["memberUsername"];
$memberPassword = $_POST["memberPassword"];

// Update the member record
$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$updateMember = $connection->prepare('UPDATE member SET name = :memberName, phone = :memberPhone, address = :memberAddress, username = :memberUsername, password = :memberPassword WHERE member_id = :member_id');
$updateMember->bindParam(":memberName", $memberName);
$updateMember->bindParam(":memberPhone", $memberPhone);
$updateMember->bindParam(":memberAddress", $memberAddress);
$updateMember->bindParam(":memberUsername", $memberUsername);
$updateMember->bindParam(":memberPassword", $memberPassword);
$updateMember->bindParam(":member_id", $member_id, PDO::PARAM_INT);
$updateMember->execute();

$_SESSION["editMemberSuccess"] = $memberName;

header("Location: /librarian/");

?>

