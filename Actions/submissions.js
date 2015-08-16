$(document).ready(function()
{
	$.ajax({
		type: "POST",
		url: "/Actions/viewSubmissions.php",
        data: {courseID: sessionStorage.getItem("courseID")},
		success: function(data) {
					$('#list').append(data);
				},
		error: function() {console.log("fail"); }
	});
});