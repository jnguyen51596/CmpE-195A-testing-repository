var role = "";
function getCoursesByRole() {
	role = $('#role').val();
	if (role == "student") {
		$.ajax({
        type: "POST",
        url: "getStudentCourses.php",
        dataType: "json",
		success: function(data){
               formatData(data);
            }
    	});
	} else if (role == "instructor") {
		$.ajax({
        type: "POST",
        url: "getClassesTaught.php",
        dataType: "json",
		success: function(data){
               formatData(data);
            }
    	});
	} else {
		alert("No role selected, please select a role");
	}
}

function formatData(data) {
	$('#results').empty();
	html = "<label for='classList' class='select'>Select a Class:</label><select name='classList' id='classList'>";
	$.each(data, function(index, data) {
		//alert(data.prefix + " " + data.suffix + " " + data.name);
		html += "<option value='" + data.courseID + "'>" + data.prefix + " " + data.suffix + " " + data.name + "</option>";	
	});
	html += "</select><button onclick='getCourseHomepage()'>Go to Course Homepage</button>";
	$('#results').append(html).trigger('create');
}

function getCourseHomepage() {
	var courseID = $('#classList').val();
	alert("Going to hompage for courseId = " + courseID + " with role = " + role);
	if (role == "student") {
		
	} else if (role == "instructor") {

	}
}