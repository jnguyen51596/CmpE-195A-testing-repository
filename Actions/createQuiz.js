function submitStartQuiz()
{
    var classID = sessionStorage.getItem('courseID');
    var title = $('#title').val();
    var quizNumber = $('#quizNumber').val();

    var month = $('#dueDateQuiz1').val();
    var day = $('#dueDateQuiz2').val();
    var year = $('#dueDateQuiz3').val();

    var hour = $('#dueDateQuiz4').val();
    var timeOfDay = $('#dueDateQuiz5').val();
    var minutes = $('#dueDateQuiz6').val();

    if (isNaN(quizNumber) || isNaN(minutes))
    {
        alert("ID and Minutes must be a Number");
    }
    else if (hour != '12' && (timeOfDay == 'noon' || timeOfDay == 'midnight'))
    {
        alert("That hour cannot be noon or midnight");
    }
    else if (hour == '12' && (timeOfDay == 'am' || timeOfDay == 'pm'))
    {
        alert("12 oclock must be set to noon or midnight");
    }
    else if (minutes > 59 || minutes < 0)
    {
        alert(" Minutes must be between 0-59");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "/Actions/executeQuizStart.php",
            data: "classID=" + classID + "&quizNumber=" + quizNumber + "&title=" + title + "&month=" + month + "&day=" + day
                    + "&year=" + year + "&hour=" + hour + "&timeOfDay=" + timeOfDay + "&minutes=" + minutes,
            cache: false,
            success: function (data) {
                if (data.indexOf("true") > -1)
                {
                    alert("Quiz Created");
                    window.location = '/home/instructor-home/create-quiz';
                }
                else
                {
                    alert("Quiz Already Created");
                }
            }
        });
    }
}