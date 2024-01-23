<?php
    session_start();



    // $host = "localhost";
    // $dbname = "postgres";
    // $username = "postgres";
    // $password = "trung20200640";

  
    // $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

      // Include your database connection code
      require_once("../../db/connect.php");

      // Fetch the book title based on the book_id parameter
      $pdo = connect_to_database();

    // Retrieve the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for a user with the entered credentials
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If a user was found, set session variables and redirect to home page
    if ($user) {
        $_SESSION['user_id'] = $user['member_id'];
        $_SESSION['username'] = $user['username'];

        header("Location: ../Home_page.php");
        echo $_SESSION['user_id'];
        echo $_SESSION['username'];

        
    } else {
        $error_message = "Invalid username or password.";
        echo "<script>alert('$error_message'); window.location.href = '../Login_page.php';</script>";
        exit(); 
    }

?>
