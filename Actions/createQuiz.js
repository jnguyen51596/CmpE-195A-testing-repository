function submitStartQuiz()
{
    var classID = sessionStorage.getItem('courseID');
    var title = $('#title').val();
    var quizNumber = $('#quizNumber').val();
    $.ajax({
        type: "POST",
        url: "/Actions/executeQuizStart.php",
        data: "&classID=" + classID + "&quizNumber=" + quizNumber + "&title=" + title,
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