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
            data: "classID=" + classID + "&quizNumber=" + quizNumber + "&title=" + title + "&duedate=" + (duedate + ":00"),
            dataType: "json",
            cache: false,
            success: function (data) {
                if (data == true)
                {
                    alert("Quiz created");
                    window.location = '/home/instructor-home/manage-quizzes';
                }
                else
                {
                    alert("That quiz number is already used, please use a different number");
                }
            }
        });
    }
}