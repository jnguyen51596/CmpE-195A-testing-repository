
window.onload = function ()
{
    
    var classID = sessionStorage.getItem('courseID');
    var quiznumber = sessionStorage.getItem('quiznumber');
    $.ajax({
        type: "POST",
        url: "/Actions/lockQuizTime.php",
        data: "classID=" + classID + "&quiznumber=" + quiznumber,
        cache: false,
        success: function (data) {
            if (data == true) {
                window.location = '/home/student-home/quiz/take-quiz';
            }
            
        }
    });

}



