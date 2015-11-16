function submitStartQuiz()
{
    var classID = sessionStorage.getItem('courseID');
    var title = $('#title').val();
    var quizNumber = $('#quizNumber').val();
    var duedate = $('#date-id').val() + " " + $('#time-id').val();
    

    if (isNaN(quizNumber))
    {
        alert("Quiz Number must be a Number");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "/Actions/executeQuizStart.php",
            data: "classID=" + classID + "&quizNumber=" + quizNumber + "&title=" + title + "&duedate=" + duedate,
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