<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /librarian/");
}




else {
    require('views/header.php') ;
    require('views/navigation-bar.php');
    require("views/issued_books_listing.view.php");
}

?>


<?php

require('views/footer.php');

?>
<script src="core/js/issued-books-listing.js"></script>

