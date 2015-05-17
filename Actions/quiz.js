var response;
var totalquestion;
var html;
var counter;
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
    loadDatabase("../Actions/excuteQuizSubmit.php", function ()
    {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            window.location('quiz-endPage.html');
        }
    });
}

function printOutQuiz1(data)
{
    html = "";
    //html += "<form action=\"\" method=\"post\" id=\"testing\">";
    totalquestion = 1;
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
                counter +=1;
                getQuizQuestion2(classid, quizid);
                
            }
            else
            {
                printOutQuiz1(data);
                if (printOutQuiz1(data) == true)
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
                counter +=1;
                getQuizQuestion3(classid, quizid);
            }
            else
            {
                printOutQuiz2(data);
                if (printOutQuiz2(data) == true)
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
                counter +=1;
                if(counter == 3)
                {
                alert("No Quiz");
                }
            }
            else
            {
                printOutQuiz3(data);
            }
        }
    });
}


function displayQuiz(classid)
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
                    html += "<a href=\"takeQuiz.html?classid=" + classid + "&quizid=" + quizid + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Quiz " + quizid + "</a><br>";
                }
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}



