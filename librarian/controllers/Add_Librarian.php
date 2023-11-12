<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION) || empty($_POST))
{
    header("Location: /tqb-library/");
}

require ('../core/connection.php');


if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

$librarian_name = $_POST["librarianName"];
$librarian_address = $_POST["librarianAddress"];
$librarian_phone = $_POST["librarianPhone"];
$librarian_username = $_POST["librarianUsername"];
$librarian_password = $_POST["librarianPassword"];

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$insertLibrarian = $connection->prepare('INSERT INTO librarian (name, address, phone, username, password) VALUES (:name, :address, :phone, :username, :password)');
$insertLibrarian->bindParam(":name", $librarian_name);
$insertLibrarian->bindParam(":address", $librarian_address);
$insertLibrarian->bindParam(":phone", $librarian_phone);
$insertLibrarian->bindParam(":username", $librarian_username);
$insertLibrarian->bindParam(":password", $librarian_password);

$insertLibrarian->execute();

$_SESSION["librarianAdded"] = "Librarian added successfully!";
header("Location: /tqb-library/");
?>

