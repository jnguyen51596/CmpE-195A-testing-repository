function displayQuizSelection()
{
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuiz.php",
        dataType: "json", 
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
                alert(data);
                $.each(data, function(index, data) {
                    var classid = data.classID;
                    var quiznumber = data.quiznumber;
                    var title = data.title;
                    var date = data.date;
                    html += "<div class='ui-field-contain'><a onclick='editQuiz(" + quiznumber + ")' class='ui-btn ui-btn-a ui-corner-all' data-ajax='false'> Quiz " + quiznumber + ": " + title +  " Due Date: "+date+"</a>";
                    html += "<a align=\"right\" onclick=\"startTimer('"+date+"', document.querySelector('#test"+quiznumber+"'))\">Show Countdown</a>";
                    html +="<div  id=\"test"+quiznumber+"\"></div></div><br>";

                });
            }
            html += "<a onclick='createANewQuiz()'>Create Quiz</a>";
            document.getElementById("demo").innerHTML = html;
        }
    });
}

function createANewQuiz() {
    window.location = '/home/instructor-home/create-quiz/create-a-new-quiz';
}
function editQuiz(quiznumber) {
    sessionStorage.setItem('quiznumber', quiznumber);
    window.location = '/home/instructor-home/create-quiz/edit-quiz';
}