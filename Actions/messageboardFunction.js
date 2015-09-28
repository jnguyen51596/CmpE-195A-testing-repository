
function createThread()
{   
    var title = $("#threadTitle").val();
    var date = $("#date").val();
    var question = $("#question").val();
    var classid = sessionStorage.getItem('courseID');
    //var username=getCookie("username");
        
    $.ajax({
        type: "POST",
        url: "/Actions/executeThread.php",
        data: "title=" + title + "&date=" + date + "&question=" + question + "&classid=" + classid,
        cache: false,
        success: function (data) {
            if (data == 'true') {
                window.location = "/home/student-home";
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
        url: "/Actions/executeThread.php",
        data: "title=" + title + "&date=" + date + "&question=" + question + "&classid=" + classid,
        cache: false,
        success: function (data) {
            if (data == 'true') {
                window.location = "/home/instructor-home";
            } else {
                alert('Not enough information');
            }
        }
    });

    return false;

}

function messageBoardDisplay()
{
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "/Actions/getMessage.php",
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
                    
                    html += "<a href=\"/Responders/commentPage.php?question=" + question + "&questionid=" + questionid + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Question:" + question +"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By:"+username+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:"+date +"</a><br>";

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
        url: "/Actions/getComment.php",
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

                    html += comment + "&nbsp;&nbsp;&nbsp;&nbsp; Commented By: " + userID + "<br>";
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
    if (comment == "")
    {
        alert("Not Enough Information");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "/Actions/executeCommenting.php",
            data: "comment=" + comment + "&question=" + question + "&questionid=" + questionid + "&classid=" + classid,
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


