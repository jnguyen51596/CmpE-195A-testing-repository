var response;
var xmlhttp = new XMLHttpRequest();
var instructorID = 1;

function createAssignment() {
	var courseID = document.getElementById("course-select-id").value;
    var title = document.getElementById("assignmentname-id").value;
    var total = document.getElementById("points-id").value;
	var duedate = document.getElementById("time-id").value;
	var description = document.getElementById("desc-id").value;
	// var ampm = document.getElementById("ampm-id").value; // more sophisticated time options to be added...
	
    $.ajax({
		type: "POST",
		url: "/Actions/createAssignment.php",
        data: {courseID: courseID, title: title, total: total, duedate: duedate, description: description}, 
		success: function(data) {
			alert("Assignment created!");
			// var successTag = '<div class="message success">' +
			// '<i class="fa fa-check"></i>' +
			// '<p>Assignment created!</p>' +
			// '</div>';
			// $('#status-id').append(successTag);
		},
		//error: function(xhr, ajaxOptions, thrownError) { alert("qerror: " + data + xhr.responseText + " " + ajaxOptions + " " + thrownError); }
		error: function(data) { alert("error: " + data); }
	});
	document.getElementById("assignmentname-id").value = "";
	document.getElementById("points-id").value = "";
	document.getElementById("time-id").value = "";
	document.getElementById("desc-id").value = "";
}

// initialize courses in a drop down list
function initializeClassDDList() {
	var tag = '<select id="course-select-id">';
	response = getRemote(instructorID);
	var classArray = JSON.parse(response);
	var classNames = [];
	var classIDs = [];
	
	for (index = 0; index < classArray.length; index++) {
		classNames[classNames.length] = classArray[index]['name'];
		classIDs[classIDs.length] = classArray[index]['courseID'];
	}
	
	for (var i = 0; i < classNames.length; i++) {
		tag += '<option value="' + classIDs[i] + '"><a href="#">' + classNames[i] + '</a></option>';
	}
	tag += "</select>";
	$('#class-dropdown-id').append(tag);
}

function getRemote(instructor) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getClassesTaught.php",
        async: false,
		data: { instructor: instructor}
    }).responseText;
}