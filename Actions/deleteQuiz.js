var html = "";
var totalquestion = 1;
var counter = 0;

function addQuestion() {
    window.location = "/home/instructor-home/manage-quizzes/edit-quiz";
}

function deleteQuizQuestion1()
{
    var classid = sessionStorage.getItem('courseID');
    var quiznumber = sessionStorage.getItem('quiznumber');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion1.php",
        data: "classid=" + classid + "&quiznumber=" + quiznumber,
        success: function (data) {
            if (data == false)
            {
                counter = 0;
                counter += 1;
                deleteQuizQuestion2(classid, quiznumber);

            }
            else
            {
                var temp = deletePrintOutQuiz1(data);
                if (temp == true)
                {
                    deleteQuizQuestion2(classid, quiznumber);
                }
            }
        }
    });
}

function deleteQuizQuestion2(classid, quiznumber)
{

    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion2.php",
        data: "classid=" + classid + "&quiznumber=" + quiznumber,
        success: function (data) {
            if (data == false)
            {
                counter += 1;
                deleteQuizQuestion3(classid, quiznumber);
            }
            else
            {
                var temp = deletePrintOutQuiz2(data);
                if (temp == true)
                {
                    deleteQuizQuestion3(classid, quiznumber);
                }
            }
        }
    });
}

function deleteQuizQuestion3(classid, quiznumber)
{

    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion3.php",
        data: "classid=" + classid + "&quiznumber=" + quiznumber,
        success: function (data) {
            if (data == false)
            {
                counter += 1;
                if (counter == 3)
                {
                    alert("No Questions");
                    $('#delete').remove();
                }
            }
            else
            {
                deletePrintOutQuiz3(data);
            }
        }
    });
}

function submitDelete()
{
    var arr = new Array();
    var classid = sessionStorage.getItem('courseID');
    arr.push("none&"+classid);
    var quiznumber = sessionStorage.getItem('quiznumber');
    arr.push("none&"+quiznumber);
    
    $("input:checkbox[name=checkboxmessage]:checked").each(function () {
        arr.push($(this).val());
    });
    $.ajax({
        type: "POST",
        url: "/Actions/executeQuizDelete.php",
        data: {jsondata: arr},
        cache: false,
        success: function (data) {
            if (data == 'true') {
                alert("Question(s) Deleted")
                window.location="/home/instructor-home/manage-quizzes";
            }
            else {             
                alert("Error, please try again.");
            }
        }
    });

    return false;

}

function deletePrintOutQuiz1(data)
{
    for (var i = 0; i < data.length; i++)
    {
        var question = data[i].question;
        var choice1 = data[i].answer;
        var choice2 = data[i].incorrect1;
        var choice3 = data[i].incorrect2;
        var choice4 = data[i].incorrect3;
        // html += "<fieldset data-role=\"controlgroup\" >";
        html += "<input class='message' type='checkbox' name='checkboxmessage' id='" + totalquestion + "' value='multiplechoice&" + question + "'>";
        html += "<label for='" + totalquestion + "'><h1>Question " + totalquestion + ": " + question + "</h1></label>";
        //html += "<p>" + choice1 + "</p>";
        //html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-1-" + totalquestion + "'  value='" + choice1 + "' />";
        html += "<label for='radio-choice-1-" + totalquestion + "'>Correct Answer: " + choice1 + "</label>";
        //html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-2-" + totalquestion + "'   value='" + choice2 + "' />";
        html += "<label for='radio-choice-2-" + totalquestion + "'>" + choice2 + "</label>";
        //html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-3-" + totalquestion + "'  value='" + choice3 + "' />";
        html += "<label for='radio-choice-3-" + totalquestion + "'>" + choice3 + "</label>";
        //html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-4-" + totalquestion + "'  value='" + choice4 + "' />";
        html += "<label for='radio-choice-4-" + totalquestion + "'>" + choice4 + "</label>";
        //html += "</fieldset>";
        totalquestion += 1;
    }
    return true;
}

function deletePrintOutQuiz2(data)
{
    for (var i = 0; i < data.length; i++)
    {
        var question = data[i].question;
        var answer = data[i].answer;
        
        //html += "<fieldset data-role=\"controlgroup\" >";
        html += "<input class=\"message\"  type=\"checkbox\" name=\"checkboxmessage\" id=\"" + totalquestion + "\" value=\"truefalse&" + question + "\">";
        html += "<label for=\"" + totalquestion + "\"><h1>Question " + totalquestion + ": " + question + "</h1></label>";
        //html += "<p>" + question + "</p>";
        //html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-1-" + totalquestion + "\"  value=\"true\" />";
        if (answer == "true") {
            html += "<label for=\"radio-choice-1-" + totalquestion + "\">Correct Answer: True</label>";
            html += "<label for=\"radio-choice-2-" + totalquestion + "\">False</label>";
        } else {
            html += "<label for=\"radio-choice-1-" + totalquestion + "\">True</label>";
            html += "<label for=\"radio-choice-2-" + totalquestion + "\">Correct Answer: False</label>";
        }
        
        //html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-2-" + totalquestion + "\"   value=\"false \" />";
        
        // html += "</fieldset>";
        totalquestion += 1;
    }
    return true;

}
function deletePrintOutQuiz3(data)
{
    for (var i = 0; i < data.length; i++)
    {
        var question = data[i].question;
        //html += "<fieldset data-role=\"controlgroup\" >";
        html += "<input class=\"message\" type=\"checkbox\" name=\"checkboxmessage\" id=\"" + totalquestion + "\" value=\"shortanswer&" + question + "\">";
        html += "<label for=\"" + totalquestion + "\"><h1>Question " + totalquestion + ": Short Answer</h1></label>";
        html += "<p>" + question + "</p>";
        html += "<textarea cols=\"40\" rows=\"5\" id=\"text\"></textarea>";
        // html += "</fieldset>";
        totalquestion += 1;
    }
    $("#demo").append(html).enhanceWithin();

}