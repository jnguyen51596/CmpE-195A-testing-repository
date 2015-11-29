$(document).ready(messageBoardDisplay());

function goToCreateThread() {
    if (location.href.indexOf("instructor-home") > 0) {
        window.location = "/home/instructor-home/discussions/make-message";
    } else {
        window.location = "/home/student-home/discussions/make-message";
    }
}

function messageBoardDisplay()
{
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "/Actions/getMessage.php",
        data: "classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data != false)
            {
                var html = "";
                
                $.each(data, function(index, data) {
                    var question = data.question;
                    var questionid = data.questionID;
                    var username = data.userID;
                    var date = data.date;
                    var title = data.title;
                    html = "<a class=\"ui-btn ui-btn-a ui-corner-all\" onclick='goToCommentPage(" + questionid + ", \"" + question + "\")'>" + title +"<br>By:"+username+"<br>Date:"+date +"</a><br>" + html;
                });
                document.getElementById("threads").innerHTML = html;

            }
        }
    });
}

function goToCommentPage(questionid, question) {
    sessionStorage.setItem("questionid", questionid);
    sessionStorage.setItem("question", question);
    var locationString = "/home/";
     if (location.href.indexOf("instructor-home") > 0) {
        locationString += "instructor-home/";
    } else {
        locationString += "student-home/";
    }
    locationString += "discussions/thread-page";
    window.location = locationString;
}