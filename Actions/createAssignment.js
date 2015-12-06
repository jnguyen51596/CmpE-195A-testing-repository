$(document).ready(function() {
	document.getElementById("createAssignment-submit").onclick = createAssignment;
	document.getElementById("id").value = sessionStorage.getItem('courseID');
});

function createAssignment() {
	var courseID = sessionStorage.getItem('courseID');
    var title = document.getElementById("assignmentname-id").value;
    var total = document.getElementById("points-id").value;
	var duedate = document.getElementById("date-id").value + " " + document.getElementById("time-id").value;
	// format datepicker here.
	var description = document.getElementById("desc-id").value;
	// var ampm = document.getElementById("ampm-id").value; // more sophisticated time options to be added...
	
    $.ajax({
		type: "POST",
		url: "/Actions/createAssignment.php",
        data: {courseID: courseID, title: title, total: total, duedate: duedate, description: description}, 
		success: function(data) {
			alert("Assignment created!");
			window.location.href = "/home/instructor-home";
			// var successTag = '<div class="message success">' +
			// '<i class="fa fa-check"></i>' +
			// '<p>Assignment created!</p>' +
			// '</div>';
			// $('#status-id').append(successTag);
		},
		//error: function(xhr, ajaxOptions, thrownError) { alert("qerror: " + data + xhr.responseText + " " + ajaxOptions + " " + thrownError); }
		error: function(data) { console.log(data); }
	});
	document.getElementById("assignmentname-id").value = "";
	document.getElementById("points-id").value = "";
	document.getElementById("time-id").value = "";
	document.getElementById("desc-id").value = "";
}

function getRemote(instructor) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getClassesTaught.php",
        async: false,
		data: { instructor: instructor}
    }).responseText;
}