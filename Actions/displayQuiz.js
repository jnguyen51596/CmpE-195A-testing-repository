function displayQuiz1()
{
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizzesToTake.php",
        data: "classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("No Quizzes have been made yet");
            }
            else
            {
                alert("Some quizzes might be locked");
                var html = "";
                $.each(data, function(index, data) {
                    var quiznumber = data.quiznumber;
                    var title = data.title;
                    var lock = data.lock;
                     var date=data.date;
                    if (lock != '1') {
                        html += "<a onclick='takeQuiz(" + quiznumber + ")' class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Quiz " + quiznumber + ": " + title + "Due Date: "+date+"</a>";
                        html += "<a align=\"right\" onclick=\"startTimer('"+date+"', document.querySelector('#test"+quiznumber+"'))\">Show Countdown</a>";
                        html +="<div  id=\"test"+quiznumber+"\"></div><br>";
                    }
                });
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}

function takeQuiz(quiznumber) {
    sessionStorage.setItem('quiznumber', quiznumber);
    window.location = '/home/student-home/quiz/take-quiz';
}