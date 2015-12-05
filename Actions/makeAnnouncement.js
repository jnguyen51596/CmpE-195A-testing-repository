$( document ).ready(function() {
    loadAnnouncements();
});

function postAnnouncement() {
	var courseID = sessionStorage.getItem('courseID');
	var body = $("#body").val();
	$.ajax({
        type: "POST",
        url: "/Actions/makeAnnouncement.php",
        data: {courseID: courseID, body: body},
        dataType: "json",
		success: function(data){
           alert("Your announcement has been posted.");
           var lastPage = location.pathname;
            lastPage = lastPage.substring(0, lastPage.lastIndexOf('/'));
            lastPage = lastPage.substring(0, lastPage.lastIndexOf('/'));
            window.location.href = lastPage;

        }
	});
}

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