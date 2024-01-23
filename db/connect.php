<?php

function connect_to_database() {

    $host = "localhost";
    $dbname = "postgres";
    $user = "postgres";
    $password = "trung20200640";

    try {
        // Create a new PDO instance
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return null;
}
