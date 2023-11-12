<?php

require ("../core/connection.php");
require ("../core/phpmailer/Exception.php");
require ("../core/phpmailer/PHPMailer.php");
require ("../core/phpmailer/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;


$user_name = $_POST["inputName"];
$email = $_POST["inputEmail"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password_hash = password_hash($_POST["inputPass"], PASSWORD_DEFAULT);

$activation_hash = md5($email.time());

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$statement = $connection->prepare('INSERT INTO librarian(user_name, email, password_hash, account_activated, activation_hash) VALUES(:user_name, :email, :password_hash, 0, :activation_hash)');

$statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
$statement->bindParam(':activation_hash', $activation_hash, PDO::PARAM_STR);
$statement->execute();

$from = 'no-reply@library-management.com';
$from_name = "Library Management System";
$subject = 'Library Management System | Email Address Verification';
$message = '



Your account has been created, but first you need to activate your account before you can log in.<br><br>

You can activate your account by clicking on this link: http://'.$_SERVER["SERVER_NAME"].'/librarian/verify.php?activation_id='.$activation_hash . '

<br><br>

If clicking the link does not work, copy and paste it into your browser.

<br><br>

Note: This is a computer generated email. Please do not reply to this email.
';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->isHTML(true);
$mail->Username = "hoangtrung.critter@gmail.com";
$mail->Password = "huxwxwbhndzkedfg";
$mail->setFrom('no-reply@library-management.com', $from_name);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->addAddress($email);

if ($mail->send()) {
    save_mail($mail);
} else {
    echo json_encode(array("error" => $mail->ErrorInfo));
}



// Saving an archive copy of activation email sent to the user
function save_mail($mail)
{ 
    return true;
}

ignore_user_abort(true);

?>