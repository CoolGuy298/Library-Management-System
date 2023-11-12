 <body>
      
                  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="d-flex align-items-center" href="ListBook.php">
      <img src="./images/hust.png" alt="hust-img" width="30" height="30" class="d-inline-block align-text-top me-2">
        <h5 class="mb-0 ml-1 text-warning" >TA QUANG BUU LIBRARY</h5>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        
        
		<div class="dropdown show">
                    <a class="navbar-brand text-light dropdown-toggle" href="#" data-toggle="dropdown">
                     Books
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="ListBook.php">List Book</a>
						<a class="dropdown-item" href="AddBook.php">Add Book</a>
                    </div>
				
                </div>
		<div class="dropdown show">
                    <a class="navbar-brand text-light dropdown-toggle" href="#" data-toggle="dropdown">
                     Books on Loan
                    </a>
					<div class="dropdown-menu">
                        <a class="dropdown-item" href="issued-books-listing.php">Issued Books' Listing</a>
						<a class="dropdown-item" href="issue-receive-book.php">Issue Book</a>
                    </div>
                    
                </div>
			<div class="dropdown show">
                    <a class="navbar-brand text-light dropdown-toggle" href="#" data-toggle="dropdown">
                      Members
                    </a>
					 <div class="dropdown-menu">
                        <a class="dropdown-item" href="ListMember.php">List Member</a>
						  <a class="dropdown-item" href="AddMember.php">Add Member</a>
                    </div>
                  
                </div>
			
		<div class="dropdown show">
                    <a class="navbar-brand text-light dropdown-toggle" href="#" data-toggle="dropdown">
                        Hello, <?= $_SESSION["user_name"] ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="Logout.php">Logout</a>
                    </div>
                </div>
      </ul>
    </div>
  </div>
</nav>