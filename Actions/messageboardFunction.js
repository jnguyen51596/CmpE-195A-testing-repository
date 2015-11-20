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
                if (location.href.indexOf("instructor-home") > 0) {
                    window.location = "/home/instructor-home/discussions";
                } else {
                    window.location = "/home/student-home/discussions";
                }
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
                if (location.href.indexOf("instructor-home") > 0) {
                    window.location = "/home/instructor-home/discussions";
                } else {
                    window.location = "/home/student-home/discussions";
                }
            } else {
                alert('Not enough information');
            }
        }
    });

    return false;

}

function commentPage()
{
    var question = sessionStorage.getItem("question");
    var questionid = sessionStorage.getItem("questionid");
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "/Actions/getComment.php",
        data: "question=" + question + "&questionid=" + questionid + "&classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == false)
            {
                document.getElementById("demo").innerHTML = "<h1>" + question + "</h1>";
                alert("No messages");
            }
            else
            {
                var html = "<div class='ui-field-contain'><h1>" + question + "</h1></div><br>";
                for (var i = 0; i < data.length; i++)
                {
                    var comment = data[i].comment;
                    var userID = data[i].userID;

                    html += "<div class='ui-field-contain'>" + comment + "<br>Commented By: " + userID + "</div><br>";
                }
                document.getElementById("demo").innerHTML = html;
            }
        }
    });
}

function commentPageButton()
{
    var question = sessionStorage.getItem("question");
    var questionid = sessionStorage.getItem("questionid");
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


