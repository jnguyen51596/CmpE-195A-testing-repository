function displayQuiz4()
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
                alert("Create Quiz First");
                var html = "";
                html += "<br><a href='/home/instructor-home/create-quiz/create-a-new-quiz'>Create Quiz</a>";
                document.getElementById("demo").innerHTML = html;
            }
            else
            {
                var html = "";
                var classid = data[0].classID;
                html += "<br><form action='/Actions/submitLock.php' method='post'>" +
                        "<input type=\"hidden\" name=\"classid\" value=" + classid + ">";
                for (var i = 0; i < data.length; i++)
                {
                    classid = data[i].classID;
                    var quiznumber = data[i].quiznumber;
                    var title = data[i].title;
                    var lock = data[i].lock;

                    html += "<div class=\"containing-element\">" +
                            "<input type=\"hidden\" name=\"quiznumber-" + quiznumber + "\" value=" + quiznumber + ">" +
                            "<label for=\"toggle-" + quiznumber + "\">Quiz " + quiznumber + ": " + title + "</label>" +
                            "<select name=\"toggle-" + quiznumber + "\" id=\"toggle-" + quiznumber + "\" data-role=\"slider\">";
                    if (lock == '1')
                    {
                        html += "<option value=\"off\">Off</option>" +
                                "<option selected value=\"on\">On</option>" +
                                "</select>" +
                                "</div><br>";
                    }
                    else
                    {
                        html += "<option selected value=\"off\">Off</option>" +
                                "<option value=\"on\">On</option>" +
                                "</select>" +
                                "<div><br>";
                    }

                }
                html += "<br><input type=\"submit\" value=\"Submit\">";
                html += "</form>";
                html += "<br><a onclick='createANewQuiz2()'>Create Quiz</a>";
                $("#demo").append(html).enhanceWithin();

            }
        }
    });
}

function createANewQuiz2() {
    window.location = '/home/instructor-home/create-quiz/create-a-new-quiz';
}