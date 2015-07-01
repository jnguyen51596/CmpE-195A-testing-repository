var classID = sessionStorage.getItem('courseID');

$( document ).ready(function() {
	getStudents();
});

function formatData(data) {
	$.each(data, function(index, data) {
		$('#studentList').append("<option value='" + data.memberID + "'>" + data.firstName + " " + data.lastName + "</option>");
	});
	$('#studentList').trigger('create');
}

function getStudents() {
	$('#studentList').empty();
	$('#studentList').append("<option value='default'>Select a Student...</option>").selectmenu('refresh');;
    $.ajax({
	    type: "POST",
        url: "../Actions/getStudents.php",
		dataType: "json",
		data: "class="+classID,
		success: function(data){
               formatData(data);
            }
    });
}

function dropStudent() {
	var studentID = $('#studentList').val();
	if (studentID == 'default') {
		alert("No student selected, please select a sutdent");
	} else {
	    $.ajax({
		    type: "POST",
	        url: "../Actions/dropAStudent.php",
			dataType: "json",
			data: "class="+classID+"&student="+studentID,
			success: function(data){
	               confirmDrop(data);
	            }
	    });
	}
}

function confirmDrop(data) {
	getStudents();
	alert("Student has been droped");
}
