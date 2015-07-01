function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function createThread()
{
   
        var title = $("#threadTitle").val();
        var date = $("#date").val();
        var question = $("#question").val();
        var classid = sessionStorage.getItem('courseID');
        //var username=getCookie("username");
        
        $.ajax({
            type: "POST",
            url: "../Actions/executeThread.php",
            data: "title=" + title + "&date=" + date + "&question=" + question + "&classid=" + classid,
            cache: false,
            success: function (data) {
                if (data == 'true') {
                    window.location = "studentHome.php";
                }
                else {
                    alert('Not enough information');
                }
            }
        });

        return false;
   
}

function createThreadIn()
{
   
        var title = $("#threadTitle").val();
        var date = $("#date").val();
        var question = $("#question").val();
        var classid = sessionStorage.getItem('courseID');
        //var username=getCookie("username");
        
        $.ajax({
            type: "POST",
            url: "../Actions/executeThread.php",
            data: "title=" + title + "&date=" + date + "&question=" + question + "&classid=" + classid,
            cache: false,
            success: function (data) {
                if (data == 'true') {
                    window.location = "instructorHome.php";
                }
                else {
                    alert('Not enough information');
                }
            }
        });

        return false;
   
}

// for students to get the comments
function getHwComment()
{
    var hwid = getParameterByName("hwid");
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "../Actions/getHwCommentStudent.php",
        data: "hwid=" + hwid + "&classid=" + classid,
        cache: false,
        success: function (data) {
            if (data == false)
            {
                document.getElementById("demo").innerHTML = "<h1>No Comment</h1>";
                alert("No Comment");
            }
            else
            {
                var html = "<br>";
                for (var i = 0; i < data.length; i++)
                {
                    var comment = data[i].comment;
                    var num = i + 1;

                    html += "&nbsp;&nbsp;&nbsp;&nbsp;" + num + ".&nbsp;" + comment + "<br>";
                }
                document.getElementById("demo").innerHTML = html;
            }
        }
    });
}

//for instructors to view the page to add comments
function hwCommentAdd()
{
    var hwid = getParameterByName("hwid");
    var classid = sessionStorage.getItem('courseID');
    var username = getParameterByName("username");
    $.ajax({
        type: "POST",
        url: "../Actions/getHwCommentInstructor.php",
        data: "hwid=" + hwid + "&classid=" + classid + "&username=" + username,
        cache: false,
        success: function (data) {
            if (data == false)
            {
                var html = "<h1>No Comments</h1><br>";
                html += "<a href=\"hwCommentList.php?hwid=" + hwid + "\" data-ajax=\"false\">Go back to Student List?</a>"
                document.getElementById("demo").innerHTML = html;
                alert("No Comment");
            }
            else
            {
                var html = "<h1>Previous Comments</h1><br>";
                for (var i = 0; i < data.length; i++)
                {
                    var comment = data[i].comment;
                    var num = i + 1;

                    html += "&nbsp;&nbsp;&nbsp;&nbsp;" + num + ".&nbsp;" + comment + "<br>";
                }
                html += "<a href=\"hwCommentList.php?hwid=" + hwid + "\" data-ajax=\"false\">Go back to Student List?</a>"
                document.getElementById("demo").innerHTML = html;
            }
        }
    });
}

//for instructors to comment only
function createHwComment()
{

    var hwid = getParameterByName("hwid");
    var comment = $("#comment").val();
    var classid = sessionStorage.getItem('courseID');
    var username = getParameterByName("username");
    if (hwid == "" || comment == "")
    {
        alert("Invalid Data");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "../Actions/addHwComment.php",
            data: "comment=" + comment + "&hwid=" + hwid + "&classid=" + classid + "&username=" + username,
            cache: false,
            success: function (data) {
                if (data == true) {
                    alert("message added");
                    window.location.reload();
                }
                else {
                    alert("Invalid");
                    window.location.reload();
                }
            }
        });
    }


}

// for insructors to see a list of student to comment
function hwCommentList()
{
    var hwid = getParameterByName("hwid");
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "../Actions/getStudentCommentList.php",
        data: "classid=" + classid + "&hwid=" + hwid,
        cache: false,
        async: false,
        success: function (data) {
            if (data == false)
            {
                alert("Invalid Page");
            }
            else
            {
                var html = "";
                for (var i = 0; i < data.length; i++)
                {
                    var username = data[i].username;
                    html += "<a href=\"hwCommentAdd.php?hwid=" + hwid + "&username=" + username + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\">" + username + "</a><br>";
                }
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}

function messageBoardDisplay()
{
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "../Actions/getMessage.php",
        data: "classid=" + classid,
        cache: false,
        async: false,
        success: function (data) {
            if (data == false)
            {
                alert("Please Create Message");
            }
            else
            {
                var html = "";
                for (var i = 0; i < data.length; i++)
                {
                    var question = data[i].question;
                    var questionid = data[i].questionID;
                    var username=data[i].userID;
                    var date=data[i].date;
                    
                    html += "<a href=\"commentPage.php?question=" + question + "&questionid=" + questionid + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Question:" + question +"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By:"+username+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:"+date +"</a><br>";
                }
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}

function commentPage()
{
    var question = getParameterByName("question");
    var questionid = getParameterByName("questionid");
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "../Actions/getComment.php",
        data: "question=" + question + "&questionid=" + questionid + "&classid=" + classid,
        cache: false,
        success: function (data) {
            if (data == false)
            {
                document.getElementById("demo").innerHTML = "<h1>" + question + "</h1>";
                alert("No messages");
            }
            else
            {
                var html = "<h1>" + question + "</h1><br>";
                for (var i = 0; i < data.length; i++)
                {
                    var comment = data[i].comment;
                    var userID = data[i].userID;

                    html += comment + "&nbsp;&nbsp;&nbsp;&nbsp; Commented By: "+userID+"<br>";
                }
                document.getElementById("demo").innerHTML = html;
            }
        }
    });
}

function commentPageButton()
{
    var question = getParameterByName("question");
    var questionid = getParameterByName("questionid");
    var comment = $("#comment").val();
    var classid = sessionStorage.getItem('courseID');
    if(comment=="")
    {
     alert("Not Enough Information");   
    }
    else
    {
    $.ajax({
        type: "POST",
        url: "../Actions/executeCommenting.php",
        data: "comment=" + comment + "&question=" + question + "&questionid=" + questionid + "&classid=" + classid ,
        cache: false,
        success: function (data) {
            if (data == 'true') {
                alert("Message added");
                window.location.reload();
            }
            else {
                alert("Invalid message");
            }
        }
    });
    return false;
    }

}