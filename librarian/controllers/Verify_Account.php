<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$activation_hash = strip_tags($_GET["activation_id"]);
    
require ('core/connection.php');

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$verifyAccount = $connection->prepare('SELECT COUNT(1) FROM librarian WHERE activation_hash = :activation_hash');
    
$verifyAccount->bindParam('activation_hash', $activation_hash);

$verifyAccount->execute();

if ($verifyAccount->fetchColumn() > 0)
{

    $accountActive = $connection->prepare('SELECT COUNT(1) FROM librarian WHERE account_activated = 0 AND activation_hash = :activation_hash');
    $accountActive->bindParam(':activation_hash', $activation_hash);

    $accountActive->execute();

    if ($accountActive->fetchColumn() > 0)
    {

        $activateAccount = $connection->prepare('UPDATE librarian SET account_activated = 1 WHERE activation_hash = :activation_hash');
        
        $activateAccount->bindParam(':activation_hash', $activation_hash);

        $activateAccount->execute();

        $_SESSION["accountActivated"] = "true";

        header('Location: /librarian/');
    }

    else 
    {
        $_SESSION["accountAlreadyActivated"] = true;

        header('Location: /librarian/');
    }
}

else 
{
    header('Location: /librarian/');
}



?>