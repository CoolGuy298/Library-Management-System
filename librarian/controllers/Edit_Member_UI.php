<?php
echo <<< EOD
<div class='container-fluid my-container bg-light mt-5 pt-4 pb-5 rounded'>
    <div>
        <h2>Edit Member Information</h2>
        <hr/>
        <form id='editMember-form' class='mt-4 needs-validation' method='post' action='controllers/Confirm_Edit_Member.php' novalidate>
		    <input type='hidden' name='member_id' value='{$editMemberData["member_id"]}'>
            <div class='form-group row'>
                <label for='memberName' class='col-md-2 offset-md-2'>Member Name:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='memberName' name='memberName' value='{$editMemberData["name"]}' required>
            </div>
            <div class='form-group row'>
                <label for='address' class='col-md-2 offset-md-2'>Address:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='address' name='memberAddress' value='{$editMemberData["address"]}' required>
            </div>
            <div class='form-group row'>
                <label for='phone' class='col-md-2 offset-md-2'>Phone:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='phone' name='memberPhone' value='{$editMemberData["phone"]}' required>
            </div>
            <div class='form-group row'>
                <label for='username' class='col-md-2 offset-md-2'>Username:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='username' name='memberUsername' value='{$editMemberData["username"]}' required>
            </div>
			<div class='form-group row'>
                <label for='username' class='col-md-2 offset-md-2'>Password:</label>
                <input class='form-control col-md-4 ml-1' type='text' id='password' name='memberPassword' value='{$editMemberData["password"]}' required>
            </div>
            <div class='col-md-4 offset-md-4'>
                <div class='d-flex justify-content-between'>
                    <button type='submit' class='btn btn-primary'>Edit Member</button>
                    <button type='button' onclick='location.href="ListMember.php";' class='btn btn-danger'>Go Back</button>
                </div>
            </div>
        </form>
    </div>
</div>
EOD;
?>