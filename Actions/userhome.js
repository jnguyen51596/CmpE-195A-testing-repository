

var role = "";
var offset = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
window.onbeforeunload = function(e) {
	$("#role").val("noselection");	
};


function getCoursesByRole() {
	role = $('#role').val();
	if (role == "student") {
		$.ajax({
        type: "POST",
        url: "/Actions/getStudentCourses.php",
        dataType: "json",
		success: function(data){
               formatData(data);
            }
    	});
	} else if (role == "instructor") {
		$.ajax({
        type: "POST",
        url: "/Actions/getClassesTaught.php",
        dataType: "json",
		success: function(data){
               formatData(data);
            }
    	});
	}
}

function formatData(data) {
	$('#results').empty();
	html = "<label for='classList' class='select'>Select a Class:</label><select name='classList' id='classList'>";

	$.each(data, function(index, data) {
		if (data != -1) {
			html += "<option value='" + JSON.stringify(data) + "'>" + offset + data.prefix + " " + data.suffix + " " + data.name + "</option>";		
		}
		//alert(data.prefix + " " + data.suffix + " " + data.name);
	});
	if (role == "instructor") {
		html += "<option value='create'>" + offset + "Create a Course</option>";
	} else if (role == "student") {
		html += "<option value='enroll'>" + offset + "Find a Course to Take</option>";
	}
	html += "</select><button onclick='getCourseHomepage()'>Go to Course Homepage</button>";
	$('#results').append(html).trigger('create');
}
/*
function editProfile() {
	window.location.href = "/Responders/editProfile.php";
}

function viewProfile() {
	window.location.href = "/Responders/profile.php";
}
*/
function viewNewAnnouncements() {
	window.location.href = "/Responders/viewNewAnnouncements.php";
}

function getCourseHomepage() {
	var classData = $('#classList').val();
	if (classData == "create") {
			window.location.href = "/home/make-a-class";
	} else if (classData == "enroll") {
			window.location.href = "/home/add-a-class";
	} else {
		var courseInfo = JSON.parse(classData);
		sessionStorage.setItem('name', courseInfo.name);
		sessionStorage.setItem('prefix', courseInfo.prefix);
		sessionStorage.setItem('suffix', courseInfo.suffix);
		sessionStorage.setItem('courseID', courseInfo.courseID);
		var link = "";
		if (role == "student") {
			link = "/home/student-home";
		} else if (role == "instructor") {
			link = "/home/instructor-home";
		}
		window.location.href = link;
	}
}

function viewNotifications(){
    	window.location.href = "notifications.php";

}