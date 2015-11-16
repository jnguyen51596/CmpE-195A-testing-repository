var arrayOfQuizId=new Array();
function displayQuiz4()
{
    arrayOfQuizId=new Array();
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
                    arrayOfQuizId.push(quizid);
                    
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
                html += "<br><input type=\"submit\" value=\"Submit\" onclick=\"submitLockQuiz()\">";
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

function submitLockQuiz()
{
    var arr = new Array();
    var classid = sessionStorage.getItem('courseID');;
    arr.push(classid);
    for (var values=0; values<arrayOfQuizId.length;values++)
    {
        var aValues=arrayOfQuizId[values];
        var aQuizid= document.getElementsByName("quizid-".concat(aValues))[0].value;  
        var aToggle=document.getElementsByName("toggle-".concat(aValues))[0].value;
        var tempValue=0;
        if(aToggle=="on")
        {      
            tempValue=1;
        }
        
        arr.push(aQuizid);
        arr.push(tempValue);
    }
    
    $.ajax({
        type: "POST",
        url: "../Actions/submitLock.php",
        data: {jsondata: arr}, 
        cache: false,
        success: function (data) {
            if (data == true) {
                alert("Lock submitted");
                window.location = "/home/instructor-home/lock-and-unlock-quizes";
            }
            else {
                alert("Error with Lock");
                window.location = "/home/instructor-home/lock-and-unlock-quizes";
            }
        }
    });

    return false;
}