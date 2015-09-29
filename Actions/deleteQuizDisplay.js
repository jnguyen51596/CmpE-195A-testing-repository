function displayQuiz3()
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
                html += "<a href='/home/instructor-home/create-quiz/create-a-new-quiz'>Create Quiz</a>";                
            }
            else
            {               
                for (var i = 0; i < data.length; i++)
                {
                    var classid = data[i].classID;
                    var quiznumber = data[i].quiznumber;
                    var title = data[i].title;
                    html += "<a onclick='deleteQuiz(" + quiznumber + ")' class='ui-btn ui-btn-a ui-corner-all' data-ajax='false'> Quiz " + quiznumber + ": " + title + "</a><br>";
                }
            }
            document.getElementById("demo").innerHTML = html;
        }
    });
}

function deleteQuiz(quiznumber) {
    sessionStorage.setItem('quiznumber', quiznumber);
    window.location="/home/instructor-home/delete-quiz/delete";
}