<?php

session_start();


require('views/header.php') ;
require('views/navigation-bar.php');
?>



   <div class="container">
        <h1 class="text-light text-center pt-5 pb-5">List of Members</h1>
          <!-- <div class="form-group row justify-content-end">
            <label for="search-filter" class="col-sm-4 col-form-label text-light text-right">Search or Filter by</label>
            <div class="col-sm-6">
                <input type="text" class="form-control text-center" id="search-filter" placeholder="any entry of any column like name, author etc">
            </div>
        </div>-->
           
    </div>
	    <?php require("controllers/ListMember.php");?>   
  </body>
  
  
  
  <script >
$(document).ready(function(){

    if ($(window).width() > 800) $("#members-table").DataTable();
    else{
      $("#members-table").DataTable({
        responsive: true
    });
    }
    
    $("#members-table_length").addClass("text-white");
    $("#members-table_filter label").prepend("Filter or ");
    $("#members-table_filter label").addClass("text-white");
    $("#members-table_info").addClass("text-white");
  
    $("#members-table_filter label input").attr("placeholder", "e.g. Hoàng Đức Trung");
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


