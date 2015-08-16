$( document ).ready(function() {
	var html = "<h1>";
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1>";
    $('#header').html(html).trigger('create');
});

function takeQuiz() {
	window.location.href = "/home/student-home/quiz";
}
function makeMessage() {
	window.location.href = "/home/student-home/make-a-thread";
}
function messageBoard() {
	window.location.href = "/home/student-home/message-board";
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

