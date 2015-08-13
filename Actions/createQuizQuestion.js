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
    var quizID = sessionStorage.getItem('quizid');
    var classID =sessionStorage.getItem('courseID') ;
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
                url: "/Actions/executeQuizSubmit.php",
                data: "questionType=" + questionType + "&classID=" + classID + "&quizID=" + quizID + "&question=" + question + "&answer=" + answer + "&incorrectAnswer1=" + incorrectAnswer1 + "&incorrectAnswer2=" + incorrectAnswer2 + "&incorrectAnswer3=" + incorrectAnswer3,
                cache: false,
                success: function (data) {
                    if (data == true)
                    {
                        alert("Correct Submission");
                        window.location = '/home/instructor-home/create-quiz/quiz-end/';
                    }
                    else
                    {
                        alert("Quiz Question already submitted");
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
                url: "/Actions/executeQuizSubmit.php",
                data: "questionType=" + questionType + "&classID=" + classID + "&quizID=" + quizID + "&question=" + question + "&answer=" + answer,
                cache: false,
                success: function (data) {
                    if (data == true)
                    {
                        alert("Correct Submission");
                        window.location = '/home/instructor-home/create-quiz/quiz-end/';
                    }
                    else
                    {
                        alert("Quiz Question already submitted");
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
                url: "/Actions/executeQuizSubmit.php",
                data: "questionType=" + questionType + "&classID=" + classID + "&quizID=" + quizID + "&question=" + question,
                cache: false,
                success: function (data) {
                    if (data == true)
                    {
                        alert("Correct Submission");
                        window.location = '/home/instructor-home/create-quiz/quiz-end/';
                    }
                    else
                    {
                        alert("Quiz Question already submitted");
                    }
                }
            });
        }
    }

}