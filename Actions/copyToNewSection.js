function createSection() {
	var firstAssignmentDueDate = $("#date-id").val();
	var courseID = sessionStorage.getItem('courseID');
    $.ajax({
	    type: "POST",
        url: "/Actions/cloneClass.php",
		dataType: "json",
		data: {firstAssignmentDueDate: firstAssignmentDueDate, courseID: courseID},
		success: function(data) {
			if (data === "true") {
				alert("Your new section has been created!");
               	window.location.href = "/home";
            } else {
            	alert("Something went wrong...");
            }
        }
    });
}