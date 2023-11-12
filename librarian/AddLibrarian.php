<?php
require('views/header.php') ;
require('views/navigation-bar.php');
?>
		
    <div class='container-fluid my-container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Librarian register</h2>
            <hr/>
            <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Add_Librarian.php' novalidate>
                <div class='form-group row'>
                    <label for='bookName' class='col-md-2 offset-md-2'>librarianName:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='librarianName' name='librarianName' required>
                </div>
                <div class='form-group row'>
                    <label for='authorName' class='col-md-2 offset-md-2'>librarianAddress:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='librarianAddress' name='librarianAddress' required>
                </div>
                <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>librarianUsername:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='librarianUsername' name='librarianUsername' required>
                </div>
				
				 <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>librarianPassword:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='librarianPassword' name='librarianPassword' required>
                </div>
				
				
               
                 
                <div class='form-group row'>
                    <label for='total_copies' class='col-md-2 offset-md-2'>librarianPhone:</label>
                    <input class='form-control col-md-2 ml-1' type='number' id='librarianPhone' name='librarianPhone' min='1' value='1' required>
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


 <footer id="footer" class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3">
        <img id="hust-png" src="./images/hust.png" alt="hust-img" style="width: 100px;">
      </div>
      <div class="col-12 col-md-6">
        <div class="title">TA QUANG BUU LIBRARY</div>
        <div class="title">HANOI UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
        <div class="subtitle">Address: No1, Dai Co Viet, Ha Ba Trung, Ha Noi</div>
        <div class="subtitle">Phone number: (84-24) 3869 2243</div>
      </div>
      <div class="col-12 col-md-3">
        <div class="title">SOCIAL NETWORK</div>
        <div class="row">
          <div class="col-6">
            <a href="https://www.facebook.com" target="_blank">
              <img src="https://1000logos.net/wp-content/uploads/2021/04/Facebook-logo.png" class="img-fluid" style="width:50%;" />
            </a>
          </div>
          <div class="col-6">
            <a href="https://www.facebook.com" target="_blank">
              <img src="https://1000logos.net/wp-content/uploads/2021/04/Facebook-logo.png" class="img-fluid" style="width:50%;" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

          
  </body>
</html>