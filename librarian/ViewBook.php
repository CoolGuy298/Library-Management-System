<?php

session_start();

require('views/header.php') ;
require('views/navigation-bar.php');
?>

<div id="deleteMessage"></div>

    <div class="container-fluid h-100 my-5">
   
        <div class="row">
            <div class="col-md-5">
                <h3 class="text-light">Book Details</h3>
                <?php require('controllers/View_Book.php'); ?>
                <div class="d-flex my-3 justify-content-around">
                <a class="btn btn-primary" role="button" href="issue-receive-book.php?issue=1&title=<?=$shelf_book_name?>">Issue Book</a>
                <a class="btn btn-info" role="button" href="EditBook.php?title=<?=$shelf_book_name?>">Edit Book Info</a>
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteBookModalCenter">Delete Book</button>
                </div>
            </div>
           
		   </div>
    
	 <div class="modal fade" id="deleteBookModalCenter" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteBookModalLongTitle">Delete the book '<?=urldecode($shelf_book_name)?>'?</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            Careful: Once this action has been taken, it cannot be reversed!
            <br><br>
            Proceed with deleting the book?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button id="confirmDelete" type="button" onclick="deleteTheBook()" class="btn btn-danger">Delete Book</button>
        </div>
        </div>
    </div>
    </div>
	</div>
 
    <script src="core/js/ViewBook.js"> </script>



    <?php

require('views/footer.php');

?>
