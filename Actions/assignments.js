var response;
var assignmentArray;

// grabs assignments and formats it in a list
function initializeAssignments() {	
	response = getRemote();
	assignmentArray = JSON.parse(response);
	
	var tag = '<ul id="assignment-list-id" data-role="listview" data-inset="true">';
	for (var i = 0; i < assignmentArray.length; i++) {
		tag += '<li><a href="javascript:void(0);" onclick="expandAssignment(' + i + ');">' + assignmentArray[i]['title'] + '</a></li>';
	}
	tag += "</ul>";
	$('#assignments-id').append(tag);
}

function getRemote() {
    return $.ajax({
        type: "POST",
		data: {courseID: sessionStorage.getItem('courseID')},
        url: "../Actions/getAssignments.php",
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
		'</div>';
	$('#assignment-info-id').append(info);
}
