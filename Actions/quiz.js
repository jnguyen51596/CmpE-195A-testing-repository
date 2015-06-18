var response;
var totalquestion=1;
var html="";
var counter=0;
function showA()
{
    document.getElementById("box").style.display = "initial";
    document.getElementById("box2").style.display = "none";
    document.getElementById("box3").style.display = "none";
}
function showB()
{
    document.getElementById("box").style.display = "none";
    document.getElementById("box2").style.display = "initial";
    document.getElementById("box3").style.display = "none";
}

function showC()
{
    document.getElementById("box").style.display = "none";
    document.getElementById("box2").style.display = "none";
    document.getElementById("box3").style.display = "initial";
}

function submitQuiz()
{

    var questionType = "";
    var question = "";
    var answer = "";
    var quizID = getParameterByName("quizid");
    var classID = getParameterByName("classid");
    var incorrectAnswer1 = "";
    var incorrectAnswer2 = "";
    var incorrectAnswer3 = "";

    if (document.getElementById("radio-choice-h-2a").checked)
    {
        questionType = $("#radio-choice-h-2a").val();
        question = $('#question-a').val();
        answer = $('#answer-a').val();
        incorrectAnswer1 = $('#incorrectAnswer1').val();
        incorrectAnswer2 = $('#incorrectAnswer2').val();
        incorrectAnswer3 = $('#incorrectAnswer3').val();
        if (quizID == "" || question == "" || answer == "" || incorrectAnswer1 == "" || incorrectAnswer2 == "" || incorrectAnswer3 == "")
        {
            alert("Incorrect Submission");
        }
        else
        {
            $.ajax({
                type: "POST",
                url: "../Actions/executeQuizSubmit.php",
                data: "questionType=" + questionType + "&classID=" + classID + "&quizID=" + quizID + "&question=" + question + "&answer=" + answer + "&incorrectAnswer1=" + incorrectAnswer1 + "&incorrectAnswer2=" + incorrectAnswer2 + "&incorrectAnswer3=" + incorrectAnswer3,
                cache: false,
                success: function (data) {
                    if (data == true)
                    {
                        alert("Correct Submission");
                        window.location = '../Responders/createQuizEndPage.html';
                    }
                }
            });
        }
    }
    else if (document.getElementById("radio-choice-h-2b").checked)
    {
        questionType = $("#radio-choice-h-2b").val();
        question = $('#question-b').val();
        if (document.getElementById("trueFalseChoice-1b").checked)
        {
            answer = $('#trueFalseChoice-1b').val();
        }
        else
        {
            answer = $('#trueFalseChoice-2b').val();
        }

        if (quizID == "" || question == "" || answer == "")
        {
            alert("Incorrect Submission");
        }
        else
        {
            $.ajax({
                type: "POST",
                url: "../Actions/executeQuizSubmit.php",
                data: "questionType=" + questionType + "&classID=" + classID + "&quizID=" + quizID + "&question=" + question + "&answer=" + answer,
                cache: false,
                success: function (data) {
                    if (data == true)
                    {
                        alert("Correct Submission");
                        window.location = '../Responders/createQuizEndPage.html';
                    }
                }
            });
        }

    }
    else
    {
        questionType = $("#radio-choice-h-2c").val();
        question = $('#question-c').val();
        if (quizID == "" || question == "")
        {
            alert("Incorrect Submission");
        }
        else
        {
            $.ajax({
                type: "POST",
                url: "../Actions/executeQuizSubmit.php",
                data: "questionType=" + questionType + "&classID=" + classID + "&quizID=" + quizID + "&question=" + question,
                cache: false,
                success: function (data) {
                    if (data == true)
                    {
                        alert("Correct Submission");
                        window.location = '../Responders/createQuizEndPage.html';
                    }
                }
            });
        }
    }

}
function submitStartQuiz()
{
    var classID=getParameterByName("classid");
    var title=$('#title').val();
    var quizNumber= $('#quizNumber').val();
      $.ajax({
                type: "POST",
                url: "../Actions/executeQuizStart.php",
                data: "&classID=" + classID + "&quizNumber=" + quizNumber + "&title=" + title,
                cache: false,
                success: function (data) {
                    if (data == true)
                    {
                        alert("Quiz Created");
                        window.location = '../Responders/createQuizDisplay.html';
                    }
                    else
                    {
                        alert("Quiz Already Created");
                    }
                }
            });
    }

function printOutQuiz1(data)
{
    for (var i = 0; i < data.length; i++)
    {
        var question = data[i].question;
        var choice1 = data[i].answer;
        var choice2 = data[i].incorrect1;
        var choice3 = data[i].incorrect2;
        var choice4 = data[i].incorrect3;
        html += "<fieldset data-role=\"controlgroup\" >";
        html += "<h1>Question " + totalquestion + "</h1>";
        html += "<p>" + question + "</p>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-1-" + totalquestion + "\"  value=" + choice1 + " />";
        html += "<label for=\"radio-choice-1-" + totalquestion + "\">" + choice1 + "</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-2-" + totalquestion + "\"   value=" + choice2 + " />";
        html += "<label for=\"radio-choice-2-" + totalquestion + "\">" + choice2 + "</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-3-" + totalquestion + "\"  value=" + choice3 + " />";
        html += "<label for=\"radio-choice-3-" + totalquestion + "\">" + choice3 + "</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-4-" + totalquestion + "\"  value=" + choice4 + " />";
        html += "<label for=\"radio-choice-4-" + totalquestion + "\">" + choice4 + "</label>";
        html += "</fieldset>";
        totalquestion += 1;
    }
    return true;
}

function printOutQuiz2(data)
{
    for (var i = 0; i < data.length; i++)
    {
        var question = data[i].question;
        var answer = data[i].answer;
        // html += "<fieldset data-role=\"controlgroup\" >";
        html += "<h1>Question " + totalquestion + "</h1>";
        html += "<p>" + question + "</p>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-1-" + totalquestion + "\"  value=\"true\" />";
        html += "<label for=\"radio-choice-1-" + totalquestion + "\">True</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-2-" + totalquestion + "\"   value=\"false \" />";
        html += "<label for=\"radio-choice-2-" + totalquestion + "\">False</label>";
        //html += "</fieldset>";
        totalquestion += 1;
    }
    return true;

}
function printOutQuiz3(data)
{
    for (var i = 0; i < data.length; i++)
    {
        var question = data[i].question;
        // html += "<fieldset data-role=\"controlgroup\" >";
        html += "<h1>Question " + totalquestion + "</h1>";
        html += "<p>" + question + "</p>";
        html += "<textarea cols=\"40\" rows=\"5\" id=\"text\"></textarea>";
        // html += "</fieldset>";
        totalquestion += 1;
    }
    html += "</form>";
    $("#demo").append(html).enhanceWithin();
    
}
function getQuizQuestion1(classid, quizid)
{

    return $.ajax({
        type: "POST",
        url: "../Actions/getQuizQuestion1.php",
        data: "classid=" + classid + "&quizid=" + quizid,
        success: function (data) {
            if (data == false)
            {
                counter = 0;
                counter += 1;
                getQuizQuestion2(classid, quizid);

            }
            else
            {
                var temp=printOutQuiz1(data);
                if (temp == true)
                {
                    getQuizQuestion2(classid, quizid);
                }
            }
        }
    });
}
function getQuizQuestion2(classid, quizid)
{

    return $.ajax({
        type: "POST",
        url: "../Actions/getQuizQuestion2.php",
        data: "classid=" + classid + "&quizid=" + quizid,
        success: function (data) {
            if (data == false)
            {
                counter += 1;
                getQuizQuestion3(classid, quizid);
            }
            else
            {
                var temp= printOutQuiz2(data);
                if (temp == true)
                {
                    getQuizQuestion3(classid, quizid);
                }
            }
        }
    });
}
function getQuizQuestion3(classid, quizid)
{

    return $.ajax({
        type: "POST",
        url: "../Actions/getQuizQuestion3.php",
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
                    html += "</form>";
                     $("#demo").append(html).enhanceWithin();
                }
            }
            else
            {
                printOutQuiz3(data);
            }
        }
    });
}


function displayQuiz1(classid)
{
    return $.ajax({
        type: "POST",
        url: "../Actions/getQuiz.php",
        data: "classid=" + classid,
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("Invalid Message");
            }
            else
            {
                var html = "";
                for (var i = 0; i < data.length; i++)
                {
                    var classid = data[i].classID;
                    var quizid = data[i].quizID;
                    var title =data[i].title;
                    html += "<a href=\"takeQuiz.html?classid=" + classid + "&quizid=" + quizid + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Quiz "+quizid+": " + title+ "</a><br>";
                }
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}

function displayQuiz2(classid)
{
    return $.ajax({
        type: "POST",
        url: "../Actions/getQuiz.php",
        data: "classid=" + classid,
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("Invalid Message");
            }
            else
            {
                var html = "";
                for (var i = 0; i < data.length; i++)
                {
                    var classid = data[i].classID;
                    var quizid = data[i].quizID;
                    var title =data[i].title;
                    html += "<a href=\"createQuizQuestion.html?classid=" + classid + "&quizid=" + quizid + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Quiz "+quizid+": " + title+ "</a><br>";
                }
                html +="<a href=\"createQuiz.html?classid="+classid+"\">Create Quiz</a>";
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}


