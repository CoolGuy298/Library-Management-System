<?php
session_start();
require('views/header.php') ;
require('views/navigation-bar.php');

if (isset($_SESSION["addBookError"])) {
    $errorMessage = $_SESSION["addBookError"];
    echo "<div class='alert alert-danger'>$errorMessage</div>";
    unset($_SESSION["addBookError"]);
}
?>

		
    <div class='container-fluid my-container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Add a new book</h2>
            <hr/>
            <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Add_Book.php' novalidate>
                <div class='form-group row'>
                    <label for='bookName' class='col-md-2 offset-md-2'>Book Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='title' name='title' required>
                </div>
                <div class='form-group row'>
                    <label for='authorName' class='col-md-2 offset-md-2'>Author Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='authors' name='authors' required>
                </div>
                <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Genre:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='genres' name='genres' required>
                </div>
				
				 <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Description:</label>
                    <textarea class='form-control col-md-4 ml-1' type='text' id='description' name='description' required>
					</textarea>
                </div>
				
				<div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Image:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='image' name='image' required>
                </div>
				
				<div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>ISBN:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='ISBN' name='ISBN' required>
                </div>
			
				<div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Publisher name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='publisher_name' name='publisher_name' required>
                </div>
				
               <div class='form-group row'>
         <label for='publish_date' class='col-md-2 offset-md-2'>Publication Year:</label>
         <input class='form-control col-md-2 ml-1' type='date' id='publish_date' name='publish_date' required>
         </div>     
   				
                   
				   
				<div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Shelf:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='location' name='location' required>
                </div>

                <div class='form-group row'>
                    <label for='total_copies' class='col-md-2 offset-md-2'>Total No. of Copies:</label>
                    <input class='form-control col-md-2 ml-1' type='number' id='book_copy' name='book_copy' min='1' value='1' required>
                </div>  		
                <div class='col-md-4 offset-md-4'>
                    <div class='d-flex justify-content-between'>
                        <button type='submit' class='btn btn-primary'>Add New Book</button>
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