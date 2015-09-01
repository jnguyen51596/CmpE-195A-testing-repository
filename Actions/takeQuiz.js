var html = "";
var counter = 0;
var totalquestion = 1;
var arrayOfAnswers = new Array();

function getQuizQuestion1()
{
    var classid = sessionStorage.getItem('courseID') ;
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
                getQuizQuestion2(classid, quizid);

            }
            else
            {
                var temp = printOutQuiz1(data);
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
        url: "/Actions/getQuizQuestion2.php",
        data: "classid=" + classid + "&quizid=" + quizid,
        success: function (data) {
            if (data == false)
            {
                counter += 1;
                getQuizQuestion3(classid, quizid);
            }
            else
            {
                var temp = printOutQuiz2(data);
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
                    
                    html += " <button  id=\"goback\" onclick=\"submitFinishQuiz()\">Submit</button>";
                    sessionStorage.setItem("answers", JSON.stringify(arrayOfAnswers));
                    sessionStorage.setItem('totalquestion', totalquestion);
                    $("#demo").append(html).enhanceWithin();
                }
            }
            else
            {
                sessionStorage.setItem('answers', JSON.stringify(arrayOfAnswers));
                printOutQuiz3(data);
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
        arrayOfAnswers.push(choice1);
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
        arrayOfAnswers.push(answer);
        html += "<fieldset data-role=\"controlgroup\" >";
        html += "<h1>Question " + totalquestion + "</h1>";
        html += "<p>" + question + "</p>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-1-" + totalquestion + "\"  value=\"true\" />";
        html += "<label for=\"radio-choice-1-" + totalquestion + "\">True</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-2-" + totalquestion + "\"   value=\"false\" />";
        html += "<label for=\"radio-choice-2-" + totalquestion + "\">False</label>";
        html += "</fieldset>";
        totalquestion += 1;
    }
    return true;

}

function printOutQuiz3(data)
{
    for (var i = 0; i < data.length; i++)
    {
        var question = data[i].question;
        html += "<fieldset data-role=\"controlgroup\" >";
        html += "<h1>Question " + totalquestion + "</h1>";
        html += "<p>" + question + "</p>";
        html += "<textarea  id=\"text-" + totalquestion + "\"  name=\"radio-choice-" +totalquestion+"\" cols=\"40\" rows=\"5\"></textarea>";
        html += "</fieldset>";
        totalquestion += 1;
    }
    
    html += " <button  id=\"goback\" onclick=\"submitFinishQuiz()\">Submit</button>";
    sessionStorage.setItem('totalquestion', totalquestion);
    $("#demo").append(html).enhanceWithin();
}

//function submitFinishQuiz()
//{
//    alert("You are now submitting");
//    getInfo(1, 'quiz');
//    window.location="/home/student-home";
//}


function submitFinishQuiz()
{
    alert("You are now submitting");
    var totalquestion = sessionStorage.getItem('totalquestion');
    var answers = sessionStorage.getItem('answers');
    var answers2 = JSON.parse(answers)
    var points = 0;
    for (var i = 1; i < totalquestion; i++)
    {
        var input = "radio-choice-";
        var input2 = input.concat(i);
        var text = "text-";
        var text2 = text.concat(i);
        
        var question = document.getElementsByName(input2);
        var temp = 0;
        if (question[0].id == text2)
        {
            alert("hi");
        }
        else
        {
            for (var j = 0, length = 4; j < length; j++) {
                if (question[j].checked) {
                    alert(question[j].value);
                    temp = j;
                    break;
                }
            }
            if (question[temp].value === answers2[i - 1])
            {
                points++;

            }
            else
            {

            }
        }
    }
    alert(points);
    window.location="/home/student-home";
}