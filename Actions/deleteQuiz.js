var html = "";
var totalquestion = 1;
var counter = 0;

function deleteQuizQuestion1()
{
    var classid = sessionStorage.getItem('courseID');
    var quizid = sessionStorage.getItem('quizid');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion1.php",
        data: "classid=" + classid + "&quizid=" + quizid,
        success: function (data) {
            if (data == false)
            {
                counter = 0;
                counter += 1;
                deleteQuizQuestion2(classid, quizid);

            }
            else
            {
                var temp = deletePrintOutQuiz1(data);
                if (temp == true)
                {
                    deleteQuizQuestion2(classid, quizid);
                }
            }
        }
    });
}

function deleteQuizQuestion2(classid, quizid)
{

    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion2.php",
        data: "classid=" + classid + "&quizid=" + quizid,
        success: function (data) {
            if (data == false)
            {
                counter += 1;
                deleteQuizQuestion3(classid, quizid);
            }
            else
            {
                var temp = deletePrintOutQuiz2(data);
                if (temp == true)
                {
                    deleteQuizQuestion3(classid, quizid);
                }
            }
        }
    });
}

function deleteQuizQuestion3(classid, quizid)
{

    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion3.php",
        data: "classid=" + classid + "&quizid=" + quizid,
        success: function (data) {
            if (data == false)
            {
                counter += 1;
                if (counter == 3)
                {
                    alert("No Quiz");
                }
                else
                {
                    html += " <button  id='delete' onclick='submitDelete()'>Delete</button>";
                    $("#demo").append(html).enhanceWithin();
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
    var quizid = sessionStorage.getItem('quizid');
    arr.push("none&"+quizid);
    
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
                window.location="/home/instructor-home/delete-quiz";
            }
            else {             
                alert("Error, please try again.");
                window.location="/home/instructor-home/delete-quiz/delete";
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
        html += "<label for='" + totalquestion + "'><h1>Question " + totalquestion + "</h1></label>";
        //html += "<p>" + choice1 + "</p>";
        html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-1-" + totalquestion + "'  value='" + choice1 + "' />";
        html += "<label for='radio-choice-1-" + totalquestion + "'>Correct Answer: " + choice1 + "</label>";
        html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-2-" + totalquestion + "'   value='" + choice2 + "' />";
        html += "<label for='radio-choice-2-" + totalquestion + "'>" + choice2 + "</label>";
        html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-3-" + totalquestion + "'  value='" + choice3 + "' />";
        html += "<label for='radio-choice-3-" + totalquestion + "'>" + choice3 + "</label>";
        html += "<input type='radio' name='radio-choice-" + totalquestion + "' id='radio-choice-4-" + totalquestion + "'  value='" + choice4 + "' />";
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
        html += "<label for=\"" + totalquestion + "\"><h1>Question " + totalquestion + "</h1></label>";
        html += "<p>" + question + "</p>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-1-" + totalquestion + "\"  value=\"true\" />";
        html += "<label for=\"radio-choice-1-" + totalquestion + "\">True</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-2-" + totalquestion + "\"   value=\"false \" />";
        html += "<label for=\"radio-choice-2-" + totalquestion + "\">False</label>";
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
        html += "<label for=\"" + totalquestion + "\"><h1>Question " + totalquestion + "</h1></label>";
        html += "<p>" + question + "</p>";
        html += "<textarea cols=\"40\" rows=\"5\" id=\"text\"></textarea>";
        // html += "</fieldset>";
        totalquestion += 1;
    }
    html += " <button  id=\"delete\" onclick=\"submitDelete()\">Delete</button>";
    $("#demo").append(html).enhanceWithin();

}