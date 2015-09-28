
// for students to get the comments
function getHwComment()
{
    var hwid = getParameterByName("hwid");
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "/Actions/getHwCommentStudent.php",
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
        url: "/Actions/getHwCommentInstructor.php",
        data: "hwid=" + hwid + "&classid=" + classid + "&username=" + username,
        cache: false,
        success: function (data) {
            if (data == false)
            {
                var html = "<h1>No Comments</h1><br>";
                html += "<a href=\"/Responders/hwCommentList.php?hwid=" + hwid + "\" data-ajax=\"false\">Go back to Student List?</a>"
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
                html += "<a href=\"/Responders/hwCommentList.php?hwid=" + hwid + "\" data-ajax=\"false\">Go back to Student List?</a>"
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
            url: "/Actions/addHwComment.php",
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
        url: "/Actions/getStudentCommentList.php",
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
                    html += "<a href=\"/Responders/hwCommentAdd.php?hwid=" + hwid + "&username=" + username + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\">" + username + "</a><br>";
                }
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}



