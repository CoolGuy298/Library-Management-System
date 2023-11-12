<?php

session_start();

require('views/header.php') ;
require('views/navigation-bar.php');
?>

<div id="deleteMessage"></div>

    <div class="container-fluid h-100 my-5">
   
        <div class="row">
            <div class="col-md-5">
                <h3 class="text-light">Member Details</h3>
                <?php require('controllers/View_Member.php'); ?>
                <div class="d-flex my-3 justify-content-around">
                <a class="btn btn-info" role="button" href="EditMember.php?username=<?=$storedUsername?>">Edit Member Info</a>
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteMemberModalCenter">Delete Member</button>
                </div>
            </div>
           
		   </div>
    
	   <div class="modal fade" id="deleteMemberModalCenter" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteMemberModalLongTitle">Delete the member '<?=urldecode($storedUsername)?>'?</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            Careful: Once this action has been taken, it cannot be reversed!
            <br><br>
            Proceed with deleting the member?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button id="#confirmDelete" type="button" onclick="deleteTheMember()" class="btn btn-danger">Delete Member</button>
        </div>
        </div>
    </div>
    </div>
    <script src="core/js/ViewMember.js"> </script>




    <?php

require('views/footer.php');

?>