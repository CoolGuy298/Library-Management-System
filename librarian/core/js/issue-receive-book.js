function BookDetails(data)
{
    var book = jQuery.parseJSON(data);
    $("#shelf").val(book.location);
    $("#book_copy").val(book.book_copy);
    $("#loan_copy").val(book.loan_copy);

    if ($("#IssueReceive").val() >=1)
    {
        $("#borrow_date").val(book.borrow_date);
        $("#due_date").val(book.due_date);
    }
}

function fetchBookDetails()
{
    $.post("controllers/Book_JS.php", $("#IssueReceive, #member, #username, #bookName").serialize())
        .done(BookDetails);
}

function BookList(data)
{
    var list = jQuery.parseJSON(data);
    $("#bookName").html("");
    $.each(list, function(){
        if (this.title == undefined) $("#bookName").append("<option value= '" +this.title + "'>" + this.title + "</option>");
        else $("#bookName").append("<option value= '" +this.title + "'>" + this.title + "</option>");;
    });

    if ($("#bookName").val() == null)
    {
       
        $("#location").val("");
        $("#borrow_date").val("");
        
        $("#bookName").html("<option>No books issued yet</option>");
        $("#issue-receive-button").attr("disabled", true);
    }
    else
    {
        $("#issue-receive-button").removeAttr("disabled");
        fetchBookDetails();
    }
}

function fetchBookList()
{
    $("#username").val($("#member option:selected").attr("username"));
    $.post("controllers/Book_JS.php", $("#IssueReceive, #member, #username").serialize())
    .done(BookList);
}

function IssueReceiveChanges()
{
    if (Number($("#IssueReceive").val()) >= 1)
    {
        $("#issue1").hide();
        $("#issue2").hide();
        $("#issueto").text("Issued To:");
        $("#borrow_date").attr("readonly", true);
        $("#due_date").attr("readonly", true);
        $("#issue-receive-button").text("Receive Book");


    }
    else
    {
        $("#issue1").show();
        $("#issue2").show();
        $("#issueto").text("Issue To:");
        $("#borrow_date").removeAttr("readonly");
        $("#due_date").removeAttr("readonly");
        $("#issue-receive-button").text("Issue Book");        
    }

    fetchBookList();
}

$(document).ready(function(){
    var url_string = window.location.href; //window.location.href
    var url = new URL(url_string);
    var member = url.searchParams.get("member");
    var bookname = url.searchParams.get("title");
    var receive = url.searchParams.get("receive");
    var issue = url.searchParams.get("issue");
    console.log(issue,receive, member, bookname);

    if (receive == 1 && member !== null && bookname !== null) 
    {
        $("#IssueReceive").val("1").change();
        $("#member option[username='" + member + "']").attr('selected', true).change();
        setTimeout(() => {
            $("#bookName").val(decodeURIComponent(bookname)).change();
        }, 2000);
    }
    else if (issue == 1 && bookname !== null)
    {
        $("#member").change();
        setTimeout(() => {
            $("#bookName").val(decodeURIComponent(bookname)).change();
        }, 2000);
    }
    else IssueReceiveChanges();

    
});
$("#IssueReceive").on('change', IssueReceiveChanges);
$("#member").on('change', fetchBookList);
$("#bookName").on('change', fetchBookDetails);
