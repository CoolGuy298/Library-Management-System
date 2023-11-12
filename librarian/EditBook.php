<?php
session_start();
if (empty($_SESSION))
{
    header("Location: /librarian/");
}
require('views/header.php') ;
require('views/navigation-bar.php');
require('controllers/Edit_Book.php');
?>


<?php

require('views/footer.php');

?>