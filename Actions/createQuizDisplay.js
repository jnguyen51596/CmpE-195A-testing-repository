function displayQuizSelection()
{
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuiz.php",
        data: "classid=" + classid,
        cache: false,
        success: function (data) {
            var html = ""; 
            if (data == false)
            {
                alert("Create Quiz First");                   
            }
            else
            {
                for (var i = 0; i < data.length; i++)
                {
                    var classid = data[i].classID;
                    var quizid = data[i].quizID;
                    var title = data[i].title;
                    var date=data[i].date;
                    html += "<a onclick='editQuiz(" + quizid + ")' class='ui-btn ui-btn-a ui-corner-all' data-ajax='false'> Quiz " + quizid + ": " + title +  "Due Date: "+date+"</a>";
                    html += "<a align=\"right\" onclick=\"startTimer('"+date+"', document.querySelector('#test"+quizid+"'))\">Show Countdown</a>";
                    html +="<div  id=\"test"+quizid+"\"></div><br>";
                }
            }
            html += "<a href='/home/instructor-home/create-quiz/create-a-new-quiz'>Create Quiz</a>";
            document.getElementById("demo").innerHTML = html;
        }
    });
}

function editQuiz(quizid) {
    sessionStorage.setItem('quizid', quizid);
    window.location = '/home/instructor-home/create-quiz/edit-quiz';
}