var arrayOfQuizNumbers=new Array();
function displayQuiz4()
{
    arrayOfQuizNumbers=new Array();
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuiz.php",
        data: "classid=" + classid,
        dataType: "json",
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
                html += "<br><form>" +
                        "<input type=\"hidden\" name=\"classid\" value=" + classid + ">";

                $.each(data, function(index, data) { 
                    classid = data.classID;
                    var quiznumber = data.quiznumber;
                    var title = data.title;
                    var lock = data.lock;
                    arrayOfQuizNumbers.push(quiznumber);
                    
                    html += "<div class=\"containing-element\">" +
                            "<input type=\"hidden\" name=\"quiznumber-" + quiznumber + "\" value=" + quiznumber + ">" +
                            "<label for=\"toggle-" + quiznumber + "\">Quiz " + quiznumber + ": " + title + "</label>" +
                            "<select name=\"toggle-" + quiznumber + "\" id=\"toggle-" + quiznumber + "\" data-role=\"slider\">";
                    if (lock == '1')
                    {
                        html += "<option value=\"off\">Unlocked</option>" +
                                "<option selected value=\"on\">Locked</option>" +
                                "</select>" +
                                "</div><br>";
                    }
                    else
                    {
                        html += "<option selected value=\"off\">Unlocked</option>" +
                                "<option value=\"on\">Locked</option>" +
                                "</select>" +
                                "<div><br>";
                    }
                });       
                for (var i = 0; i < data.length; i++)
                {
                    

                }
                html += "<br><input type=\"button\" value=\"Submit\" onclick='submitLockQuiz()'>";
                html += "</form>";
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
    for (var values=0; values<arrayOfQuizNumbers.length;values++)
    {
        var aValues=arrayOfQuizNumbers[values];
        var aQuizNumber= document.getElementsByName("quiznumber-".concat(aValues))[0].value;  
        var aToggle=document.getElementsByName("toggle-".concat(aValues))[0].value;
        var tempValue=0;
        if(aToggle=="on")
        {      
            tempValue=1;
        }
        
        arr.push(aQuizNumber);
        arr.push(tempValue);
    }
    $.ajax({
        type: "POST",
        url: "/Actions/submitLock.php",
        data: {jsondata: arr}, 
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == true) {
                alert("Quiz(zes) locked");                
            }
            else {
                alert("Something went wrong...");
            }
            window.location = "/home/instructor-home/manage-quizzes/lock-and-unlock-quizzes";
        }
    });

    return false;
}