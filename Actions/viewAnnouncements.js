$( document ).ready(function() {
	var html = "<h1>";
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += " Announcements</h1>";
    $('#header').html(html).trigger('create');
    loadAnnouncements();
});

function loadAnnouncements() {
	var courseID = sessionStorage.getItem('courseID');
	$.ajax({
        type: "POST",
        url: "/Actions/getCourseAnnouncements.php",
        data: {courseID: courseID},
        dataType: "json",
		success: function(data){
               formatData(data);
            }
    	});
}

function formatData(data) {
	var html = "<ul data-role='listview' data-filter='true' data-filter-placeholder='Search announcements...' data-inset='true'>";
    $.each(data, function(index, data) {
        html += "<li>" + data.body + "<br>Writen by: " + data.firstName + " " + data.lastName + "</li>";
    });
    html += "</ul>";
    $('#main').append(html).trigger('create');
}