<?php session_start(); ?>

<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="title" content="">
    <meta name="keywords" content="free books, books to read, free ebooks, audio books, read books for free, read books online, online library">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="OpenLibrary.org">
    <meta name="creator" content="OpenLibrary.org">
    <meta name="copyright" content="Original content copyright; 2007-2015">
    <meta name="distribution" content="Global">
    <meta name="theme-color" content="#e2dcc5">

    <link rel="stylesheet" href="css/home_page.css">
    <link rel="canonical" href="https://openlibrary.org/">
    <link rel="preconnect" href="https://analytics.archive.org/">

    <link rel="search" type="application/opensearchdescription+xml" title="Open Library" href="https://openlibrary.org/static/opensearch.xml">
    <link rel="manifest" href="https://openlibrary.org/static/manifest.json">

    <link href="https://openlibrary.org/static/images/openlibrary-128x128.png" rel="apple-touch-icon">
    <link href="https://openlibrary.org/static/images/openlibrary-152x152.png" rel="apple-touch-icon" sizes="152x152">
    <link href="https://openlibrary.org/static/images/openlibrary-167x167.png" rel="apple-touch-icon" sizes="167x167">
    <link href="https://openlibrary.org/static/images/openlibrary-180x180.png" rel="apple-touch-icon" sizes="180x180">
    <link href="https://openlibrary.org/static/images/openlibrary-192x192.png" rel="icon" sizes="192x192">
    <link href="https://openlibrary.org/static/images/openlibrary-128x128.png" rel="icon" sizes="128x128">
    <link href="./Home_page_files/page-home.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <noscript>
        <style>
            /* Don't hide content with clamp if no js to show more/less */
            .clamp {
                -webkit-line-clamp: unset !important;
            }

            /* @width-breakpoint-tablet media query: */
            @media only screen and (min-width: 768px) {

                /* Sticky navbar to top of screen if compact title cannot be stickied */
                .work-menu {
                    top: 0 !important;
                }
            }
        </style>
    </noscript>


    <meta name="google-site-verification" content="KrqcZD4l5BLNVyjzSi2sjZBiwgmkJ1W7n6w7ThD7A74">
    <meta name="google-site-verification" content="vtXGm8q3UgP-f6qXTvQBo85uh3nmIYIotVqqdJDpyz4">
    <meta name="alexaVerifyID" content="wJKlTRj1Z1OI4G-J0w9R-cWhJjw"> <!-- Necessary for Alexa -->
    <!-- Drini, Google Search Console -->
    <meta name="google-site-verification" content="XYOJ9Uj0MBr6wk7kj1IkttXrqY-bbRstFMADTfEt354">

    <meta name="description" content="Open Library is an open, editable library catalog, building towards a web page for every book ever published. Read, borrow, and discover more than 3M books for free.">

    <title>History page || Ta Quang Buu Library</title>

</head>


<body class="client-js">
    <script>
        $(document).ready(function() {
            // Perform AJAX request to check login status
            $.ajax({
                url: './controller/check_login.php', // Replace with the correct path to your PHP script for checking login
                method: 'GET',
                success: function(response) {

                    if (response === 'logged_in') {
                        // User is logged in, retrieve and display the history
                        loadHistory();
                    } else {
                        // User is not logged in, redirect to login page or perform any other action
                        window.location.href = './Login_page.php'; // Replace with the correct path to your login page
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });

            function loadHistory() {
                // Perform AJAX request to retrieve the history
                $.ajax({
                    url: './controller/history.php',
                    method: 'GET',
                    success: function(response) {
                        // Handle the response from PHP script if needed
                        console.log(response);
                        $('#table-content').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                    }
                });
            }
        });
    </script>

    
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
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Book title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cover
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Borrow date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Due date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Return date
                        </th>
                    </tr>
                </thead>

                <tbody id="table-content">
                    
                </tbody>

            </table>
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