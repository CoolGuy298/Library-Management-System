<?php
session_start();
if (empty($_SESSION))
{
    header("Location: /librarian/");
}

require('views/header.php') ;
require('views/navigation-bar.php');
?>
		
		
    <div class='container-fluid my-container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Member register</h2>
            <hr/>
            <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Add_Member.php' novalidate>
                <div class='form-group row'>
                    <label for='bookName' class='col-md-2 offset-md-2'>Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='memberName' name='memberName' required>
                </div>
                <div class='form-group row'>
                    <label for='authorName' class='col-md-2 offset-md-2'>Address:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='memberAddress' name='memberAddress' required>
                </div>
                <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Username:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='memberUsername' name='memberUsername' required>
                </div>
				
				 <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Password:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='memberPassword' name='memberPassword' required>
                </div>
				
				
               
                 
                <div class='form-group row'>
                    <label for='total_copies' class='col-md-2 offset-md-2'>Phone:</label>
                    <input class='form-control col-md-2 ml-1' type='number' id='memberPhone' name='memberPhone' min='1' value='1' required>
                </div>       				
                   
			
                <div class='col-md-4 offset-md-4'>
                    <div class='d-flex justify-content-between'>
                        <button type='submit' class='btn btn-primary'>Register</button>
                        <button type='button' onclick='location.href="ListBook.php";' class='btn btn-danger'>Go Back</button>
                    </div>
                </div>
            
            </form>
        </div>
    
    
    </div>

<script src='core/js/validate.js'></script>
 
    <?php

require('views/footer.php');

?>