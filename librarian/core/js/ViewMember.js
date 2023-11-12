function authorBio()
{

    if (!($("#author-biography").hasClass("collapsed"))){
        $("#author-biography").html("Show Biography");
        $(this).removeClass("bioButtonReversed");
        $(this).addClass("bioButton");
    } 
    else {
        $("#author-biography").html("Hide Biography");
        $(this).removeClass("bioButton");
        $(this).addClass("bioButtonReversed");
    }

}

var memberDetails = [];

function getMemberDetails()
{
    $("#memberDetailsTable .memberInfo").each(function()
    {
        memberDetails.push($(this).html());
    });
}

function deleteTheMember()
{
	console.log("Delete button clicked");
    $("#deleteMemberModalCenter").modal("hide");
    getMemberDetails();
    $.post('/librarian/controllers/Delete_Member.php', {memberDetails: memberDetails})
        .done (function ( data ){
			console.log(data);
            if (data === "1")
            {
                alert("Member '"+ memberDetails[0]+"' has been successfully deleted.");
                
                    window.location.replace("/librarian/ListMember.php");
                
            }
            else  {
                alert("The member needs to return the books first.");}
            });
            
}



