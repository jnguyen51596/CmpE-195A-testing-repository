var response;
var assignmentArray;

// grabs assignments and formats it in a list
function initializeAssignments() {	
	response = getRemote();
	assignmentArray = JSON.parse(response);
	
	var tag = '<ul id="assignment-list-id" data-role="listview" data-inset="true">';
	for (var i = 0; i < assignmentArray.length; i++) {
		tag += '<li value=' + assignmentArray[i]['assignmentID'] + '><a href="javascript:void(0);" onclick="expandAssignment(' + i + ');">' + assignmentArray[i]['title'] + '</a></li>';
	}
	tag += "</ul>";
	$('#assignments-id').append(tag);
	
	
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

	var info = '<div class="ui-grid-a">' +
		'<div class="ui-block-a"> Points: '+ assignmentArray[assignmentIndex]['total'] + '</div>' +
		'<div class="ui-block-b"><label>Due: '+ assignmentArray[assignmentIndex]['duedate'] + '</label></div>' +
		'</div>' +
		'<div class="inset">' +
			'<p> Description: '+ assignmentArray[assignmentIndex]['description'] + '</p>' +
			'<form data-ajax="false" method="POST" enctype="multipart/form-data">' +
			'<input type="file" name="file" id="file" />' +
			'<input type="hidden" name="file-course-id" id="file-course-id" value="" />' +
			'<input type="hidden" name="file-title-id" id="file-title-id" value="' + assignmentArray[assignmentIndex]['title'] + '" />' +
			'<input type="submit" id="submit-assignment-id" value="Submit" onclick="submitAssignment(' + assignmentArray[assignmentIndex]['assignmentID'] + ')" />' +
			'</form>' +
		'</div>';
	$('#assignment-info-id').append(info);
}

function submitAssignment(assignmentID) {
	// bind course id from js session variable
	document.getElementById("file-course-id").value = sessionStorage.getItem('courseID');
	
	$.ajax({
        type: "POST",
		url: "../Actions/submitAssignment.php",
		data: {assignmentID: assignmentID},
        async: false
    });
}