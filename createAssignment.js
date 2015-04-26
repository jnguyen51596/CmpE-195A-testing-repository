var response;
var xmlhttp = new XMLHttpRequest();
var instructorID = 1;

function createAssignment() {
	//var courseID = getCourseID(document.getElementById("course-select-id").value);
	var courseID = document.getElementById("course-select-id").value;
	var authorID = 2; // hard coded for now...
    var title = document.getElementById("assignmentname-id").value;
    var total = document.getElementById("points-id").value;
	var dueDate = document.getElementById("time-id").value;
	var description = document.getElementById("desc-id").value;
	// var ampm = document.getElementById("ampm-id").value; // more sophisticated time options to be added...
	
	//alert(courseID + " " + authorID + " " +  title + " " +  total + " " +  dueDate + " " +  description);
    $.ajax({
		type: "POST",
		url: "createAssignment.php",
        data: {courseID: courseID, authorID: authorID, title: title, total: total, dueDate: dueDate, description: description} //, 
		//success: function() { alert("success!"); },
		//error: function(xhr, ajaxOptions, thrownError) { alert(xhr.responseText); }
	});
}

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
	
	// var classNames = ['ENGR 100W', 'CS 146', 'CMPE 172', classArray[0]['name'], classArray[1]['name']];
	for (var i = 0; i < classNames.length; i++) {
		tag += '<option value="' + classIDs[i] + '"><a href="#">' + classNames[i] + '</a></option>';
	}
	tag += "</select>";
	$('#class-dropdown-id').append(tag);
}

function getRemote(instructor) {
    return $.ajax({
        type: "POST",
        url: "getClassesTaught.php",
        async: false,
		data: { instructor: instructor}
    }).responseText;
}