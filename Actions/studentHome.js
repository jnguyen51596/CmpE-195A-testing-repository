$( document ).ready(function() {
	var html = '<div data-role="header" data-theme="b"><h1>';
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1></div>";
    $('#header').html(html).trigger('create');
    //$('#header').listview('refresh');
});

function takeQuiz() {
	window.location.href = "/home/student-home/quiz";
}
function messageBoard() {
	window.location.href = "/home/student-home/discussions";
}
function viewAnnouncements() {
	window.location.href = "/home/student-home/announcements";
}
function grades() {
	window.location.href = "/home/student-home/grades";
}
function assignments() {
	window.location.href = "/home/student-home/assignments";
}
function module() {
	window.location.href = "/home/student-home/modules";
}

