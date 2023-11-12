<?php

echo <<< EOD
<div class='container-fluid my-container bg-light mt-5 pt-4 pb-5 rounded'>
    <div>
        <h2>Edit Book Information</h2>
        <hr/>
        <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Confirm_Edit_Book.php' novalidate>
		    <input type='hidden' name='book_id' value='{$editBookData["book_id"]}'>
            <div class='form-group row'>
                <label for='bookName' class='col-md-2 offset-md-2'>Book Name:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='title' name='title' value='{$editBookData["title"]}' required>
            </div>
            <div class="form-group row">
            <label class='col-md-2 offset-md-2' for="authors">Authors:</label>
            <input class='form-control col-md-4 ml-1' type="text" id="authors" name="authors" class="form-control" value="$authorsString">
        </div>
        
        <div class="form-group row">
            <label class='col-md-2 offset-md-2' for="genres">Genres:</label>
            <input class='form-control col-md-4 ml-1' type="text" id="genres" name="genres" class="form-control" value="$genresString">
        </div>
            <div class='form-group row'>
                <label for='genreName' class='col-md-2 offset-md-2'>Description:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='description' name='description' value='{$editBookData["description"]}' required>
            </div>
				
            <div class='form-group row'>
                <label for='genreName' class='col-md-2 offset-md-2'>Image:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='image' name='image' value='{$editBookData["image"]}' required>
            </div>
				
            <div class='form-group row'>
                <label for='genreName' class='col-md-2 offset-md-2'>ISBN:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='ISBN' name='ISBN' value='{$editBookData["isbn"]}' required>
            </div>
			
            <div class='form-group row'>
                <label for='genreName' class='col-md-2 offset-md-2'>Publisher Name:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='publisher_name' name='publisher_name' value='{$editBookData["publisher_name"]}' required>
            </div>
				
            <div class='form-group row'>
                <label for='publish_date' class='col-md-2 offset-md-2'>Publication Year:</label>
                <input class='form-control col-md-2 ml-1' type='date' id='publish_date' name='publish_date' value='{$editBookData["publish_date"]}' required>
            </div>     
                  
            <div class='form-group row'>
                <label for='genreName' class='col-md-2 offset-md-2'>Shelf:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='location' name='location' value='{$editBookData["location"]}' required>
            </div>

            <div class='form-group row'>
                <label for='total_copies' class='col-md-2 offset-md-2'>Total No. of Copies:</label>
                <input class='form-control col-md-2 ml-1' type='number' id='book_copy' name='book_copy' min='1' value='{$editBookData["book_copy"]}' required>
            </div>  				
            <div class='col-md-4 offset-md-4'>
                <div class='d-flex justify-content-between'>
                    <button type='submit' class='btn btn-primary'>Edit Book</button>
                    <button type='button' onclick='location.href="ListBook.php";' class='btn btn-danger'>Go Back</button>
                </div>
            </div>
        </form>
    </div>
</div>
EOD;



?>