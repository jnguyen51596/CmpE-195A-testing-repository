var notificationID = 0;
var classID = sessionStorage.getItem('courseID');
var memberID = 9000;

//inserting notifications
function getInfo(t, i) {
    var type = t;
    var item = i;

    $.ajax({
        type: "POST",
        url: "../Actions/notificationInsert.php",
        data: "type=" + type + "&item=" + item,
        cache: false,
        success: function (data) {
            notificationID = data;
            if(type == 0)
            {
                getStudentList();
            }else if(type == 1){
                getTeacher();
            }
            
        }
    });
}

//for when a student takes a quiz
function getTeacher() {
    $.ajax({
        type: "POST",
        url: "../Actions/getTeacher.php",
        data: "class=" + classID,
        dataType: "json",
        success: function (data) {
            insertRecipients(data);
        }
    });
}

//for when a teacher assigns a quiz
function getStudentList() {
    $.ajax({
        type: "POST",
        url: "../Actions/getStudents.php",
        data: "class=" + classID,
        dataType: "json",
        success: function (data) {
            insertRecipients(data);
        }
    });
}

function insertRecipients(data) {
    $.each(data, function (index, data) {
        memberID = data.memberID;
        $.ajax({
            type: "POST",
            url: "../Actions/insertRecipients.php",
            data: "notificationID=" + notificationID + "&memberID=" + memberID,
            cache: false,
            success: function (data) {
                if (data == 1) {
                }
                else {
                }
            }
        });
    });
    window.location = "instructorHome.php";

}

//pulling notifications
function getNotifications() {

    return $.ajax({
        type: "POST",
        url: "../Actions/getNotifications.php",
        dataType: "json",
        success: function (data) {
            formatData(data);
        }
    });

}

function formatData(data) {
    //appends to div ID
    $('#results').empty();
    var html = "";    
    var verb = "";
    var go = "";

    $.each(data, function (index, data) {

        if (data.type == 0) {
            verb = "has assigned or editted a";
            go = "quiz()";
        } else if (data.type == 1) {
            verb = "has taken your";
            go = "homework()";
        } else if (data.type == 2) {
            //unused
            verb = "sent you a";
            go = "messages()";
        }

        if (data != -1) {
            html += "<p><button onclick='" + go + "'><b>" + data.first + " " + data.last + "</b> " + verb + " <b>" + data.item + "</b><p style=\"color:#b2b2b2\">" + data.created + "</p></button></p>";
        }
    });



    $('#results').append(html).trigger('create');
}

function quiz() {
    window.location = "displayQuiz.php";
}

function messages() {
    window.location = "userhome.php";
}

function homework() {
    window.location = "profile.php";
}