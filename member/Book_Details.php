<?php session_start(); ?>

<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        // Include your database connection code
        require_once("../db/connect.php");

        // Fetch the book title based on the book_id parameter
        $db = connect_to_database();
        $bookID = $_GET['book_id'];
        $query = "SELECT title FROM book WHERE book_id = :book_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':book_id', $bookID);
        $stmt->execute();
        $bookTitle = $stmt->fetchColumn();

        // Close the database connection
        $db = null;
    ?>
    <title><?php echo $bookTitle; ?> | Open Library</title>
    <meta name="description" content="A Court of Mist and Fury by Sarah J. Maas, unknown edition">
    <meta name="keywords" content="free books, books to read, free ebooks, audio books, read books for free, read books online, online library">
    <meta name="author" content="OpenLibrary.org">
    <link rel="canonical" href="https://openlibrary.org/works/OL17860744W/A_Court_of_Mist_and_Fury">
    <link href="./Book_detail_files/page-book.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body class=" client-js">

    <div id="topNotice">
        <div class="page-banner page-banner-black page-banner-center">
            <div class="iaBar">
                <a class="iaLogo"><img alt="Internet Archive logo" src="./Home_page_files/ia-logo.svg" width="160"></a>

                <div class="language-component header-dropdown" id="footer-locale-menu">
                </div>
            </div>
        </div>
    </div>


    <header id="header-bar" class="header-bar">
        <div class="logo-component" style="flex: 2; margin-right: 5px;">
            <a href="./Home_page.php" title="The Internet Archive&#39;s Open Library: One page for every book">
                <div class="logo-txt">
                    <img class="logo-icon" src="./Home_page_files/openlibrary-logo-tighter.svg" width="189" height="47" alt="Open Library logo">
                </div>
            </a>
        </div>

        <div class="navigation-component" style="flex: 2; margin-right: 5px;">
            <div class="auth-component bg-white mx-5 rounded-lg"> 
                <a href="./History_page.php" class="text-white bg-white-700 hover:text-green hover:bg-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    LOAN HISTORY
                </a>
            </div>
        </div>

        <div class="search-component" style="flex: 4; margin-right: 5px; ">
            <form id="search" style="display: flex; justify-content: space-between;">
                <div style="flex: 3; margin-right: 5px;">
                    <div class="select-wrapper">
                        <select name="filter" id="filter" class="w-full my-2 p-2 rounded-lg">
                            <option value="title">Title</option>
                            <option value="author">Author</option>
                            <option value="genre_name">Genre</option>
                            <option value="publisher_name">Publisher</option>
                        </select>

                    </div>
                </div>

                <div style="flex: 5; margin-right: 5px;">
                    <input placeholder="Input information" name="information" class="w-full my-2 p-2 rounded-lg">
                </div>

                <div style="flex: 1;">
                    <button class="bg-white w-full my-2 p-2 rounded-lg btn" type="submit">Find</button>
                </div>
            </form>

            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    // Get the form element
                    const form = document.getElementById("search");

                    // Add an event listener for form submission
                    form.addEventListener("submit", function(event) {
                        // Prevent the default form submission
                        event.preventDefault();

                        // Get the input values
                        var filter = document.querySelector('select[name="filter"]').value;
                        var information = document.querySelector('input[name="information"]').value;

                        // Construct the URL with parameters
                        var url = './Search_page.php?filter=' + encodeURIComponent(filter) + '&information=' + encodeURIComponent(information);

                        // Redirect to the search results page
                        window.location.href = url;
                    });
                });
            </script>
        </div>

        <style>
            .search-component {
                display: flex;
                align-items: center;
            }

            .select-wrapper {
                position: relative;
            }
        </style>

        <div class="auth-component bg-white mx-5 rounded-lg " style="flex: 2; margin-right: 5px;"> 
            <?php 
                if (!empty($_SESSION['user_id'])) {
                    // User is logged in
                    echo '<a> Hello,'. $_SESSION['username'].' </a>';
                    echo '<div><a href="./controller/logout.php">Log out</a></div>';
                } else {
                    // User is not logged in
                    echo '<div><a href="./Login_page.php">Log in</a></div>';
                }
            ?>
            

        </div>

        <div class="hamburger-component header-dropdown">
            <!-- Hamburger code here -->
        </div>
    </header>

    <div id="test-body-mobile">

        <div id="contentBody" role="main" itemscope="" itemtype="https://schema.org/Book">
            <div class="workDetails">
                <div class="editionCover">
                    <div class="Tools">
                        <div id="read">
                            <div class="panel">
                                <div class="btn-notice read-options" id="read-options">
                                    <div class="illustration edition-cover">
                                        <div class="coverMagic cover-animation">
                                            <?php
                                            // Include your database connection code
                                            require_once("../db/connect.php");

                                            // Fetch data for a specific book from the "book" table
                                            $db = connect_to_database();
                                            $bookID = $_GET['book_id']; // Assuming you are passing the book_id as a query parameter
                                            $query = "SELECT * FROM book b
                                                inner join book_author ba
                                                    on b.book_id = ba.book_id
                                                inner join author a
                                                    on ba.author_id = a.author_id
                                                WHERE b.book_id = :book_id";
                                            $stmt = $db->prepare($query);
                                            $stmt->bindParam(':book_id', $bookID);
                                            $stmt->execute();
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                            if ($row) {
                                                $bookTitle = $row['title'];
                                                $bookAuthor = $row['author_name'];
                                                $bookCover = $row['image'];

                                                echo '<div class="SRPCover bookCover" style="display: block;">';
                                                echo '<a href="' . $bookCover . '" aria-controls="seeImage" class="coverLook dialog--open" title="Pull up a bigger book cover">';
                                                echo '<img itemprop="image" src="' . $bookCover . '" srcset="' . $bookCover . ' 2x" class="cover" alt="Cover of: ' . $bookTitle . ' by ' . $bookAuthor . '">';
                                                echo '</a>';
                                                echo '</div>';
                                                echo '<div class="SRPCoverBlank" style="display: none;">';
                                                echo '<div class="innerBorder">';
                                                echo '<div class="BookTitle">';
                                                echo $bookTitle;
                                                echo '<div class="Author">';
                                                echo $bookAuthor;
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            ?>

                                            <div class="hidden">
                                                <div class="coverFloat" id="seeImage">
                                                    <div class="coverFloatHead">
                                                        <h2>
                                                            <?php echo $bookTitle; ?>
                                                        </h2>
                                                        <a class="dialog--close" href="javascript:;">×<span class="shift">Close</span></a>
                                                    </div>
                                                    <a class="dialog--close" href="javascript:;"><img src="<?php echo $bookCover; ?>" class="cover" alt="<?php echo $bookTitle; ?> by <?php echo $bookAuthor; ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="editionAbout">
                    <div class="work-title-and-author desktop">
                        <span>
                            <?php
                            // Include your database connection code
                            require_once("../db/connect.php");

                            // Fetch data for a specific book from the "book" table
                            $db = connect_to_database();
                            $bookID = $_GET['book_id']; // Assuming you are passing the book_id as a query parameter
                            $query = "SELECT * FROM book b
                            inner join book_author ba
                                on b.book_id = ba.book_id
                            inner join author a
                                on ba.author_id = a.author_id
                            inner join publisher p
                                on b.publisher_id = p.publisher_id
                            WHERE b.book_id = :book_id";
                            $stmt = $db->prepare($query);
                            $stmt->bindParam(':book_id', $bookID);
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($row) {
                                $bookTitle = $row['title'];
                                $bookDescription = $row['description'];
                                $publishDate = $row['publish_date'];
                                $publisher = $row['publisher_name'];
                                $isbn = $row['isbn'];
                                $loancopy = $row['loan_copy'];
                                $bookcopy = $row['book_copy'];
                                $copy = $bookcopy - $loancopy;
                                $location = $row['location'];

                                echo '<h1 class="work-title" itemprop="name">' . $bookTitle . '</h1>';
                                
                            }
                            

                            $query = "SELECT a.author_name FROM author a
                                INNER JOIN book_author ba ON ba.author_id = a.author_id
                                WHERE ba.book_id = :book_id;";
                            $stmt = $db->prepare($query);
                            $stmt->bindParam(':book_id', $bookID);
                            $stmt->execute();
                            $authors = $stmt->fetchAll(PDO::FETCH_COLUMN);
                            
                            echo '<h2 class="edition-byline">by ';

                            foreach ($authors as $index => $author) {
                                echo '<a href="Search_page.php?filter=author&information=' . rawurlencode($author) . '" itemprop="author">' . $author . '</a>';


                                // Check if it is not the last genre
                                if ($index < count($authors) - 1) {
                                    echo ', ';
                                } else {
                                    echo '.';
                                }
                            }

                            echo '</h2>'

                            ?>

                            <ul class="readers-stats" itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating">
                                <?php
                                // Include your database connection code
                                require_once("../db/connect.php");

                                // Fetch the count of distinct member IDs who have read the book
                                $db = connect_to_database();
                                $bookID = $_GET['book_id']; // Assuming you are passing the book_id as a query parameter
                                $query = "SELECT COUNT(DISTINCT member_id) AS count FROM loan WHERE book_id = :book_id";
                                $stmt = $db->prepare($query);
                                $stmt->bindParam(':book_id', $bookID);
                                $stmt->execute();
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                $count = $row['count']; // Get the count value

                                // Display the readers' stats
                                echo '<li class="reading-log-stat"><span class="readers-stats__stat">' . $count . '</span> <span class="readers-stats__label">Have read</span></li>';
                                ?>
                            </ul>

                        </span>
                    </div>

                    <div class="book-description">
                        <div class="book-description-content">
                            <?php echo $bookDescription; ?>
                        </div>
                    </div>

                    <div>
                        <div class="edition-omniline">
                            <div class="edition-omniline-item">
                                <div>Publish Date</div>
                                <span itemprop="datePublished"><?php echo $publishDate; ?></span>
                            </div>
                            <div class="edition-omniline-item">
                                <div>Publisher</div>
                                <span>
                                    <?php echo '<a itemprop="publisher" href="./Search_page.php?filter=publisher_name&information=' . rawurlencode($publisher) . '" title="Show other books from ' . $publisher . '">' . $publisher . '</a>' . PHP_EOL;?>
                                </span>
                            </div>
                            <div class="edition-omniline-item">
                                <div class="language">ISBN</div>
                                <span itemprop="inLanguage"><?php echo $isbn; ?></span>
                            </div>
                            <div class="edition-omniline-item">
                                <div class="pages">Available Copy</div>
                                <span class="edition-pages" itemprop="numberOfPages"><?php echo $copy; ?></span>
                            </div>
                            <div class="edition-omniline-item">
                                <div>Location</div>
                                <span itemprop="datePublished"><?php echo $location; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subjects">
                <div class="subjects-content">

                    <div class="section link-box">
                        <span class="clamp" data-before="▸ ">
                            <h6>Genres</h6>
                            <?php
                            // Include your database connection code
                            require_once("../db/connect.php");

                            // Fetch data for a specific book from the "book" table
                            $db = connect_to_database();
                            $bookID = $_GET['book_id']; // Assuming you are passing the book_id as a query parameter
                            $query = "SELECT g.genre_name FROM book_genre bg
                                INNER JOIN genre g ON bg.genre_id = g.genre_id
                                WHERE bg.book_id = :book_id;";
                            $stmt = $db->prepare($query);
                            $stmt->bindParam(':book_id', $bookID);
                            $stmt->execute();
                            $genres = $stmt->fetchAll(PDO::FETCH_COLUMN);

                            foreach ($genres as $index => $genre) {
                                echo '<a href="Search_page.php?filter=genre_name&information=' . rawurlencode($genre) . '" data-ol-link-track="BookOverview|SubjectClick">' . $genre . '</a>';
                                // Check if it is not the last genre
                                if ($index < count($genres) - 1) {
                                    echo ', ';
                                } else {
                                    echo '.';
                                }
                            }
                            ?>
                        </span>

                    </div>

                    <div class="RelatedWorksCarousel" data-workid="OL17860744W">
                        <div class="loadingIndicator hidden">
                            <figure>
                                <img src="./Book_detail_files/ajax-loader-bar.gif" alt="Loading indicator">
                                <figcaption style="
                        justify-content: center;
                        display: flex;
                ">Loading Related Books</figcaption>
                            </figure>
                        </div>

                        <div class="related-books">
                            <div class="carousel-section">
                                <div class="carousel-section-header">
                                    <h2 class="home-h2"><a name="">You May Also Like</a></h2>
                                </div>
                                <div class="carousel-container carousel-container-decorated">
                                    <div class="carousel carousel- carousel--progressively-enhanced slick-initialized slick-slider" data-config='[".carousel-", 6, 5, 4, 3, 2, 1, {"url": "/trending/hours.json?hours=24&minimum=3&sort_by_count=false", "pageMode": "page", "limit": 18}]'>

                                        <?php
                                        // Include your database connection code
                                        require_once("../db/connect.php");

                                        // Fetch the genre ID for the specified book
                                        $db = connect_to_database();
                                        $bookID = $_GET['book_id']; // Assuming you are passing the book_id as a query parameter

                                        // Fetch the genre for the specified book
                                        $query = "SELECT genre_id FROM book_genre WHERE book_id = :book_id";
                                        $stmt = $db->prepare($query);
                                        $stmt->bindParam(':book_id', $bookID);
                                        $stmt->execute();
                                        $genreID = $stmt->fetchColumn();

                                        // Fetch similar books of the same genre
                                        $query = "SELECT b.title, b.description, b.image, b.book_id
                                            FROM book_genre bg
                                            INNER JOIN book b ON b.book_id = bg.book_id
                                            WHERE bg.genre_id = :genre_id and bg.book_id != :book_id
                                            ORDER BY RANDOM()
                                            LIMIT 6";
                                        $stmt = $db->prepare($query);
                                        $stmt->bindParam(':genre_id', $genreID);
                                        $stmt->bindParam(':book_id', $bookID);
                                        $stmt->execute();
                                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        // Loop through the fetched data and generate HTML for each book
                                        foreach ($result as $row) {
                                            $bookTitle = $row['title'];
                                            $bookDescription = $row['description'];
                                            $bookImage = $row['image'];
                                            $bookID = $row['book_id'];

                                            echo '<div class="book carousel__item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" id="slick-slide10" style="width: 145px;">';
                                            echo '<div class="book-cover">';
                                            echo '<a href="Book_Details.php?book_id=' . $bookID . '" tabindex="0">';
                                            echo '<img class="bookcover" loading="lazy" title="' . $bookTitle . '" alt="' . $bookTitle . '" src="' . $bookImage . '">';
                                            echo '</a>';
                                            echo '</div>';
                                            echo '<div class="book-cta">';
                                            echo '<div class="cta-button-group">';
                                            echo '<a href="Book_Details.php?book_id=' . $bookID . '" class="cta-btn cta-btn--missing" title="View Book Details" data-ol-link-track="CTAClick|CheckedOut" tabindex="0">View Details</a>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }

                                        // Close the database connection
                                        $db = null;
                                        ?>


                                    </div>
                                </div>
                            </div>

                            <div class="carousel-section">
                                <div class="carousel-section-header">
                                    <h2 class="home-h2"><a name="">Trending Books</a></h2>
                                </div>
                                <div class="carousel-container carousel-container-decorated">
                                    <div class="carousel carousel- carousel--progressively-enhanced slick-initialized slick-slider" data-config='[".carousel-", 6, 5, 4, 3, 2, 1, {"url": "/trending/hours.json?hours=24&minimum=3&sort_by_count=false", "pageMode": "page", "limit": 18}]'>

                                        <?php
                                        // Include your database connection code
                                        require_once("../db/connect.php");

                                        // Fetch data from the "book" table
                                        $db = connect_to_database();
                                        $query = "SELECT * FROM book ORDER BY RANDOM() limit 6;";
                                        $result = $db->query($query);

                                        // Loop through the fetched data and generate HTML for each book
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            $bookTitle = $row['title'];
                                            $bookDescription = $row['description'];
                                            $bookImage = $row['image'];
                                            $bookID = $row['book_id'];

                                            echo '<div class="book carousel__item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" id="slick-slide10" style="width: 145px;">';
                                            echo '<div class="book-cover">';
                                            echo '<a href="Book_Details.php?book_id=' . $bookID . '" tabindex="0">';
                                            echo '<img class="bookcover" loading="lazy" title="' . $bookTitle . '" alt="' . $bookTitle . '" src="' . $bookImage . '">';
                                            echo '</a>';
                                            echo '</div>';
                                            echo '<div class="book-cta">';
                                            echo '<div class="cta-button-group">';
                                            echo '<a href="Book_Details.php?book_id=' . $bookID . '" class="cta-btn cta-btn--missing" title="View Book Details" data-ol-link-track="CTAClick|CheckedOut" tabindex="0">View Details</a>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }

                                        // Close the database connection
                                        $db = null;
                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>

    <footer>
        <div id="footer-content">
            <div id="footer-details">
                <img id="archive-logo" src="./Home_page_files/pantheon.png" alt="Open Library logo">
                <div id="legal-details">
                    <span>Ta Quang Buu Library at Hanoi University of Technology</span>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>