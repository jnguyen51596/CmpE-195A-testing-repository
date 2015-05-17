var role = "";
function getCoursesByRole() {
	role = $('#role').val();
	if (role == "student") {
		$.ajax({
        type: "POST",
        url: "../Actions/getStudentCourses.php",
        dataType: "json",
		success: function(data){
               formatData(data);
            }
    	});
	} else if (role == "instructor") {
		$.ajax({
        type: "POST",
        url: "../Actions/getClassesTaught.php",
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
		if (data != -1) {
			html += "<option value='" + JSON.stringify(data) + "'>" + data.prefix + " " + data.suffix + " " + data.name + "</option>";		
		}
		//alert(data.prefix + " " + data.suffix + " " + data.name);
	});
	if (role == "instructor") {
		html += "<option value='create'>Create a Course</option>";
	} else if (role == "student") {
		html += "<option value='enroll'>Find a Course to Take</option>";
	}
	html += "</select><button onclick='getCourseHomepage()'>Go to Course Homepage</button>";
	$('#results').append(html).trigger('create');
}

function editProfile() {
	window.location.href = "editProfile.html";
}

function viewProfile() {
	window.location.href = "profile.html";
}

function getCourseHomepage() {
	var classData = $('#classList').val();
	if (classData == "create") {
			window.location.href = "makeAClass.html";
	} else if (classData == "enroll") {
			window.location.href = "addAClass.html";
	} else {
		var courseInfo = JSON.parse(classData);
		sessionStorage.setItem('name', courseInfo.name);
		sessionStorage.setItem('prefix', courseInfo.prefix);
		sessionStorage.setItem('suffix', courseInfo.suffix);
		sessionStorage.setItem('courseID', courseInfo.courseID);
		var link = "";
		if (role == "student") {
			link = "studentHome.php";
		} else if (role == "instructor") {
			link = "instructorHome.php";
		}
		window.location.href = link;
	}
}