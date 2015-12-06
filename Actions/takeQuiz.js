var html = "";
var counter = 0;
var totalquestion = 1;
var arrayOfAnswers = new Array();

function getQuizQuestion1()
{
    var classid = sessionStorage.getItem('courseID') ;
    var quiznumber = sessionStorage.getItem('quiznumber');
    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion1.php",
        data: "classid=" + classid + "&quiznumber=" + quiznumber,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == false)
            {
                counter = 0;
                counter += 1;
                getQuizQuestion2(classid, quiznumber);

            }
            else
            {
                var temp = printOutQuiz1(data);
                if (temp == true)
                {
                    getQuizQuestion2(classid, quiznumber);
                }
            }
        }
    });
}

function getQuizQuestion2(classid, quiznumber)
{

    return $.ajax({
        type: "POST",
        url: "/Actions/getQuizQuestion2.php",
        data: "classid=" + classid + "&quiznumber=" + quiznumber,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == false)
            {
                counter += 1;
                if (counter == 2)
                {
                    alert("No Quiz");
                }
                else
                {
                    
                    html += " <button  id=\"goback\" onclick=\"submitFinishQuiz()\">Submit</button>";
                  // sessionStorage.setItem('answers', JSON.stringify(arrayOfAnswers));
                    sessionStorage.setItem('totalquestion', totalquestion);
                    $("#demo").append(html).enhanceWithin();
                }
            }
            else
            {
               
                printOutQuiz2(data);
               // sessionStorage.setItem('answers', JSON.stringify(arrayOfAnswers));
            }
        }
    });
}

//function getQuizQuestion2(classid, quiznumber)
//{
//
//    return $.ajax({
//        type: "POST",
//        url: "/Actions/getQuizQuestion2.php",
//        data: "classid=" + classid + "&quiznumber=" + quiznumber,
//        success: function (data) {
//            if (data == false)
//            {
//                counter += 1;
//                getQuizQuestion3(classid, quiznumber);
//            }
//            else
//            {
//                var temp = printOutQuiz2(data);
//                if (temp == true)
//                {
//                    getQuizQuestion3(classid, quiznumber);
//                }
//            }
//        }
//    });
//}
//function getQuizQuestion3(classid, quiznumber)
//{
//
//    return $.ajax({
//        type: "POST",
//        url: "/Actions/getQuizQuestion3.php",
//        data: "classid=" + classid + "&quiznumber=" + quiznumber,
//        success: function (data) {
//            if (data == false)
//            {
//                counter += 1;
//                if (counter == 3)
//                {
//                    alert("No Quiz");
//                }
//                else
//                {
//                    
//                    html += " <button  id=\"goback\" onclick=\"submitFinishQuiz()\">Submit</button>";
//                    sessionStorage.setItem("answers", JSON.stringify(arrayOfAnswers));
//                    sessionStorage.setItem('totalquestion', totalquestion);
//                    $("#demo").append(html).enhanceWithin();
//                }
//            }
//            else
//            {
//                sessionStorage.setItem('answers', JSON.stringify(arrayOfAnswers));
//                printOutQuiz3(data);
//            }
//        }
//    });
//}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;

  while (0 !== currentIndex) {

    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}


function printOutQuiz1(data)
{
    $.each(data, function(index, data)
    {
        var question = data.question;
        var choice1 = data.answer;
        var choice2 = data.incorrect1;
        var choice3 = data.incorrect2;
        var choice4 = data.incorrect3;      
        var tempArray=new Array();
        tempArray.push(choice1);
        tempArray.push(choice2);
        tempArray.push(choice3);
        tempArray.push(choice4);
        
        arrayOfAnswers.push(choice1);
        
        shuffle(tempArray);
           
        html += "<fieldset data-role=\"controlgroup\" >";
        html += "<h1>Question " + totalquestion + "</h1>";
        html += "<p>" + question + "</p>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-1-" + totalquestion + "\"  value=" + tempArray[0] + " />";
        html += "<label for=\"radio-choice-1-" + totalquestion + "\">" + tempArray[0] + "</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-2-" + totalquestion + "\"   value=" + tempArray[1] + " />";
        html += "<label for=\"radio-choice-2-" + totalquestion + "\">" + tempArray[1] + "</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-3-" + totalquestion + "\"  value=" + tempArray[2] + " />";
        html += "<label for=\"radio-choice-3-" + totalquestion + "\">" + tempArray[2] + "</label>";
        html += "<input type=\"radio\" name=\"radio-choice-" + totalquestion + "\" id=\"radio-choice-4-" + totalquestion + "\"  value=" + tempArray[3] + " />";
        html += "<label for=\"radio-choice-4-" + totalquestion + "\">" + tempArray[3]+ "</label>";
        html += "</fieldset>";
        totalquestion += 1;
    });
    return true;
}

function printOutQuiz2(data)
{
     $.each(data, function(index, data)
    {
        var question = data.question;
        var answer = data.answer;
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
    });
    html += " <button  id=\"goback\" onclick=\"submitFinishQuiz()\">Submit</button>";
    sessionStorage.setItem('totalquestion', totalquestion);
    $("#demo").append(html).enhanceWithin();

}

//function printOutQuiz3(data)
//{
//    for (var i = 0; i < data.length; i++)
//    {
//        var question = data[i].question;
//        html += "<fieldset data-role=\"controlgroup\" >";
//        html += "<h1>Question " + totalquestion + "</h1>";
//        html += "<p>" + question + "</p>";
//        html += "<textarea  id=\"text-" + totalquestion + "\"  name=\"radio-choice-" +totalquestion+"\" cols=\"40\" rows=\"5\"></textarea>";
//        html += "</fieldset>";
//        totalquestion += 1;
//    }
//    
//    html += " <button  id=\"goback\" onclick=\"submitFinishQuiz()\">Submit</button>";
//    sessionStorage.setItem('totalquestion', totalquestion);
//    $("#demo").append(html).enhanceWithin();
//}

//function submitFinishQuiz()
//{
//    alert("You are now submitting");
//    getInfo(1, 'quiz');
//    window.location="/home/student-home";
//}


function submitFinishQuiz()
{
    //alert("You are now submitting");
    var totalquestion = sessionStorage.getItem('totalquestion');
    var answers2 = arrayOfAnswers;
    var points = 0;
    var count = 0;
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
        }
        else
        {
            for (var j = 0, length = 4; j < length; j++) {
                if (question[j].checked) {
                    //alert(question[j].value);
                    temp = j;
                    break;
                }
            }
            if (question[temp].value === answers2[i - 1])
            {
                points++;
            }
            count++;
        }
    }
    alert("You got " + points + " correct answers out of " + count + " questions");
    var classID = sessionStorage.getItem('courseID');
    var quiznumber = sessionStorage.getItem('quiznumber');
    points = (points / count) * 100;
    $.ajax({
            type: "POST",
            url: "/Actions/addQuizGrade.php",
            data: "classid=" + classID + "&quizid="+ quiznumber+ "&points="+points,
            cache: false,
            success: function (data) {
                if (data.indexOf("true") > -1)
                {
                    alert("Quiz Grade added");
                    window.location="/home/student-home";
                }
                else
                {
                    alert("Quiz Grade not added");
                }
            }
        });
    
}
