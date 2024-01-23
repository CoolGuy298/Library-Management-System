<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $filter = $_GET['filter'] ?? '';
        $information = $_GET['information'] ?? '';
    }



    // $host = "localhost";
    // $dbname = "postgres";
    // $username = "postgres";
    // $password = "trung20200640";

    // $dsn = "pgsql:host=$host;dbname=$dbname;user=$username;password=$password";
    // $options = [
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // ];

    // try {
    //     $pdo = new PDO($dsn, $username, $password, $options);
    // } catch (PDOException $e) {
    //     die("Error: " . $e->getMessage());
    // }

      // Include your database connection code
      require_once("../../db/connect.php");

      // Fetch the book title based on the book_id parameter
      $pdo = connect_to_database();

    if ($filter == 'title') {  
        $stmt = $pdo->prepare("SELECT * FROM book b 
        inner join publisher p on b.publisher_id = p.publisher_id
        WHERE LOWER(b.title) LIKE CONCAT('%', LOWER(:information), '%')");
        $stmt->bindValue(':information', $information, PDO::PARAM_STR);
        $stmt->execute();

        echo "All books with title: $information";
    }
    
    elseif ($filter == 'author') {
        $stmt = $pdo->prepare(
            "SELECT *
            FROM book b
            inner join publisher p on b.publisher_id = p.publisher_id
            WHERE b.book_id IN (
                SELECT book_id
                FROM book_author
                JOIN author ON book_author.author_id = author.author_id
                WHERE lower(author_name) LIKE CONCAT('%', lower('$information'), '%')
            );"
        );

        $stmt->execute();

        echo "All book written by: $information";
    }
    elseif ($filter == 'genre_name') {
        $stmt = $pdo->prepare(
            "SELECT DISTINCT *
            FROM book b
            inner join publisher p on b.publisher_id = p.publisher_id
            JOIN book_genre bg ON b.book_id = bg.book_id
            WHERE bg.genre_id = (
                SELECT genre_id
                FROM genre
                WHERE TRIM(lower(genre_name)) = TRIM(lower('$information'))
            );"
        );

        $stmt->execute();
        echo "All book in the genre: $information";
    }

    elseif ($filter == 'publisher_name') {
        $stmt = $pdo->prepare(
            "SELECT *
            FROM book b
            inner join publisher p on b.publisher_id = p.publisher_id
            where lower(p.publisher_name) LIKE CONCAT('%', lower('$information'), '%');"
        );

        $stmt->execute();
        echo "All book from the publisher: $information";
    }

    if ($stmt !== null) {
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Display the query result
        foreach ($data as $row) {
            $bookID = $row['book_id'];
            $title = $row['title'];
            $image = $row['image'];
            $publisher = $row['publisher_name'];
            $authorStmt = $pdo->prepare(
                "SELECT *
                FROM book_author ba
                JOIN author a ON ba.author_id = a.author_id
                WHERE ba.book_id = '$bookID';"
            );
    
            $authorStmt->execute();
    
            $genreStmt = $pdo->prepare(
                "SELECT *
                FROM book_genre bg
                JOIN genre g ON bg.genre_id = g.genre_id
                WHERE bg.book_id = '$bookID';"
            );
    
            $genreStmt->execute();
    
            echo '<li class="searchResultItem" itemscope="" itemtype="https://schema.org/Book">' . PHP_EOL;
            echo '    <span class="bookcover">' . PHP_EOL;
            echo '        <a href="./Book_Details.php?book_id=' . $bookID . '"><img itemprop="image" src="' . $image . '" alt="Cover of: '. $title .'" title="Cover of: '. $title .'"></a>' . PHP_EOL;
            echo '    </span>' . PHP_EOL;
            echo '' . PHP_EOL;
            echo '    <div class="details">' . PHP_EOL;
            echo '        <div class="resultTitle">' . PHP_EOL;
            echo '            <h3 itemprop="name" class="booktitle">' . PHP_EOL;
            echo '                <a itemprop="url" href="./Book_Details.php?book_id=' . $bookID . '" class="results">' . $title . '</a>' . PHP_EOL;
            echo '            </h3>' . PHP_EOL;
            echo '        </div>' . PHP_EOL;
            echo '' . PHP_EOL;
            echo '        <span itemprop="author" itemscope="" itemtype="https://schema.org/Organization" class="bookauthor">' . PHP_EOL;
            echo '            by ';
            if ($authorStmt !== null) {
                $authors = $authorStmt->fetchAll(PDO::FETCH_ASSOC);
                $authorNames = array_column($authors, 'author_name');
                echo implode(', ', $authorNames);
            }    
            echo '        </span>' . PHP_EOL;
            echo '' . PHP_EOL;
            echo '        <span class="resultPublisher">' . PHP_EOL;
            echo '            <span class="publishedYear">' . PHP_EOL;
            echo '                Published by ' . $publisher . PHP_EOL;
            echo '            </span>' . PHP_EOL;
            if ($genreStmt !== null) {
                $genres = $genreStmt->fetchAll(PDO::FETCH_ASSOC);
                $genreNames = array_column($genres, 'genre_name');
                echo implode(', ', $genreNames);
            } 
            echo '        </span>' . PHP_EOL;
            echo '    </div>' . PHP_EOL;
            echo '</li>' . PHP_EOL;
        }
    } else {
        echo "Error: Statement is null.";
    }
    
    
?>