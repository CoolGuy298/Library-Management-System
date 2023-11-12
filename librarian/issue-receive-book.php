<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /librarian/");
}

else {
    require('views/header.php') ;
    require('views/navigation-bar.php');
    
    require("views/issue_receive_book.view.php");

}
?>



<?php

require('views/footer.php');

?>