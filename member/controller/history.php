<?php
    session_start();

    $userID = $_SESSION['user_id'];

    

    // $host = "localhost";
    // $dbname = "postgres";
    // $username = "postgres";
    // $password = "trung20200640";
    
    // $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
     // Include your database connection code
     require_once("../../db/connect.php");

     // Fetch the book title based on the book_id parameter
     $pdo = connect_to_database();

    $stmt = $pdo->prepare(
        "select * from book b
        inner join loan l on b.book_id = l.book_id
        where l.member_id = :userID
        order by l.borrow_date desc"

    );

    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($books as $book) {
        echo '
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a itemprop="url" href="./Book_Details.php?book_id=' . $book['book_id'] . '" class="results">
                    ' . $book['title'] .' </a>
                </th>
                <td class="px-6 py-4">
                    <a itemprop="url" href="./Book_Details.php?book_id=' . $book['book_id'] . '" class="results">
                        <img src="' . $book['image'] . '" alt="Book Image" style="width: 100px;">
                    </a>
                </td>
                <td class="px-6 py-4">
                    ' . $book['borrow_date'] . '
                </td>
                <td class="px-6 py-4">
                    ' . $book['due_date'] . '
                </td>';

        if (is_null($book['return_date'])) {
            echo '<td class="px-6 py-4" style="color: red; font-weight: bold">
                     Not returned yet
                </td>';
        } else {
            echo '<td class="px-6 py-4">
                    ' . $book['return_date'] . '
                </td>';
        }
        echo '</tr>';
    }
?>