function displayQuiz1()
{
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuiz.php",
        data: "classid=" + classid,
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("No Quiz");
            }
            else
            {
                alert("Some Quizes might be locked");
                var html = "";
                for (var i = 0; i < data.length; i++)
                {
                    //var classid = data[i].classID;
                    var quiznumber = data[i].quiznumber;
                    var title = data[i].title;
                    var lock = data[i].lock;
                    if (lock != '1') {
                        html += "<a onclick='takeQuiz(" + quiznumber + ")' class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Quiz " + quiznumber + ": " + title + "</a><br>";
                    }
                }
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}

function takeQuiz(quiznumber) {
    sessionStorage.setItem('quiznumber', quiznumber);
    window.location = '/home/student-home/quiz/take-quiz';
}