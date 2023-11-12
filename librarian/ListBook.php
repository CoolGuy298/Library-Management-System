<?php

session_start();


require('views/header.php') ;
require('views/navigation-bar.php');


if (!(empty($_SESSION["addBookSuccess"])))
{
    echo <<< EOD
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Book "{$_SESSION['addBookSuccess']}" has been added successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["addBookSuccess"] = null;
}

if (!(empty($_SESSION["issue_success"])))
{
    echo <<< EOD
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Book "{$_SESSION['issue_success']}" issued to "{$_SESSION['issue_member']}" successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["issue_success"] = null;
    $_SESSION["issue_member"] = null;
}

if (!(empty($_SESSION["received_book_name"])))
{
    echo <<< EOD
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Book "{$_SESSION['received_book_name']}" received from "{$_SESSION['received_book_member']}" successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["received_book_name"] = null;
    $_SESSION["received_book_member"] = null;
}

?>



   <div class="container">
        <h1 class="text-light text-center pt-5 pb-5">List of Books</h1>
          <!-- <div class="form-group row justify-content-end">
            <label for="search-filter" class="col-sm-4 col-form-label text-light text-right">Search or Filter by</label>
            <div class="col-sm-6">
                <input type="text" class="form-control text-center" id="search-filter" placeholder="any entry of any column like name, author etc">
            </div>
        </div>-->
           
    </div>
	    <?php require("controllers/ListBook.php");?>   
  </body>
  
  
  
  <script >
$(document).ready(function(){

  if ($(window).width() > 800) $("#book-table").DataTable();
  else{
    $("#book-table").DataTable({
      responsive: true
  });
  }
  
  $("#book-table_length").addClass("text-white");
  $("#book-table_filter label").prepend("Filter or ");
  $("#book-table_filter label").addClass("text-white");
  $("#book-table_info").addClass("text-white");

  $("#book-table_filter label input").attr("placeholder", "name of book");
  });
  
  
  
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>



<?php

require('views/footer.php');

?>


