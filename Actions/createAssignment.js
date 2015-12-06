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
 if (description=="" || title=="" || total =="" || duedate=="")
    {
        alert("Please fill in all fields");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "/Actions/createAssignment.php",
            data: {courseID: courseID, title: title, total: total, duedate: duedate, description: description},
            dataType: "json",
            //error: function(xhr, ajaxOptions, thrownError) { alert("qerror: " + data + xhr.responseText + " " + ajaxOptions + " " + thrownError); }
            error: function (data) {
                console.log(data);
            }
        });
    }
}

function getRemote(instructor) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getClassesTaught.php",
        async: false,
		data: { instructor: instructor}
    }).responseText;
}