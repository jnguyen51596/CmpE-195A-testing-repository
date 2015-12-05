var response;
var assignmentArray;

// grabs assignments and formats it in a list
function initializeAssignments() {
    response = getRemote();
    // console.log(response);

    if (response != "false") {
        assignmentArray = JSON.parse(response);
        var tag = "";
        for (var i = 0; i < assignmentArray.length; i++) {
            var duedate = new Date(assignmentArray[i]['duedate']);
            var currentdate = new Date();
            if (assignmentArray[i]['lock'] == 1)
            {

            }
            else
            {
                if (duedate.getTime() > currentdate.getTime())
                {
                    tag += '<ul id="assignment-list-id" data-role="listview" data-inset="true">';
                    tag += '<li value=' + assignmentArray[i]['assignmentID'] + '><a href="javascript:void(0);" onclick="expandAssignment(' + i + ');">' + assignmentArray[i]['title'] + '</a></li>';
                    tag += "</ul>";
                }
                else
                {
                    var classID = sessionStorage.getItem('courseID');
                    var assignmendID = assignmentArray[i]['assignmentID'];
                    $.ajax({
                        type: "POST",
                        url: "/Actions/autoLockAssignment.php",
                        data: "classID=" + classID + "&assignmentID=" + assignmendID,
                        cache: false,
                        success: function (data) {
                            if (data == true) {
                                alert("Your kick");
                            }

                        }
                    });
                }

            }
        }
        $('#assignments-id').append(tag);
    }
    else
    {
        $('#assignments-id').append('There are no assignments');
    }

}

function getRemote() {
    return $.ajax({
        type: "POST",
        data: {courseID: sessionStorage.getItem('courseID')},
        url: "/Actions/getAssignments.php",
        async: false
    }).responseText;
}

// displays assignment information
function expandAssignment(assignmentIndex) {
    $('#assignment-info-id').html("");
    var info = "";
    if (assignmentArray[assignmentIndex]['description']== 'quiz')
    {
        info +=
                '<div class="inset">' +
                '<p>Points: ' + assignmentArray[assignmentIndex]['total'] + '</p>' +
                '<p>Due: ' + assignmentArray[assignmentIndex]['duedate'] + '<p>' +
                '<p>Description: ' + assignmentArray[assignmentIndex]['description'] + '</p>' +
                '</div>';
    }
    else
    {
        info +=
                '<div class="inset">' +
                '<p>Points: ' + assignmentArray[assignmentIndex]['total'] + '</p>' +
                '<p>Due: ' + assignmentArray[assignmentIndex]['duedate'] + '<p>' +
                '<p>Description: ' + assignmentArray[assignmentIndex]['description'] + '</p>' +
                '<form id="data" data-ajax="false" method="POST" enctype="multipart/form-data">' +
                '<input type="file" name="file" id="file" />' +
                '<input type="hidden" name="file-course-id" id="file-course-id" value="" />' +
                '<input type="hidden" name="file-title-id" id="file-title-id" value="' + assignmentArray[assignmentIndex]['title'] + '" />' +
                '<input type="submit" id="submit-assignment-id" value="Submit" onclick="submitAssignment(' + assignmentArray[assignmentIndex]['assignmentID'] + ',&quot;' + assignmentArray[assignmentIndex]['duedate'] + '&quot;)" />' +
                '</form>' +
                '</div>';
    }
    $('#assignment-info-id').append(info);
}

function submitAssignment(assignmentID, duedate) {
    // bind course id from js session variable
    document.getElementById("file-course-id").value = sessionStorage.getItem('courseID');

    // if (document.getElementById("file").value == "")
    // {
    //  alert("Please select a file to upload");
    // }
    // else {
    var dueDate = new Date(duedate);
    var currentdate = new Date();
    if (dueDate.getTime() > currentdate.getTime())
    {
        $.ajax({
            type: "POST",
            url: "/Actions/submitAssignment.php",
            data: {assignmentID: assignmentID},
            async: false
        });
    }
    else
    {
        alert("Past the duedate");
    }
    // }
}
