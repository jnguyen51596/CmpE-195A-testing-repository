
window.onload = function ()
{
    
    var classID = sessionStorage.getItem('courseID');
    var quizID = sessionStorage.getItem('quizID');
    $.ajax({
        type: "POST",
        url: "../Actions/lockQuizTime.php",
        data: "classID=" + classID + "&quizID=" + quizID,
        cache: false,
        success: function (data) {
            if (data == true) {
                window.location = '/home/student-home/quiz/take-quiz';
            }
            
        }
    });

}



