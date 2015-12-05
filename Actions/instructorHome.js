$( document ).ready(function() {
	var html = '<div data-role="header" data-theme="b"><h1>';
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1></div>";
    $('#header').html(html).trigger('create');
});

function createAssignment() {
	window.location.href = "/home/instructor-home/create-assignment";
}

function dropAStudent() {
	window.location.href = "/home/instructor-home/drop-student";
}

function makeAnnouncement() {
	window.location.href = "/home/instructor-home/make-announcement";
}

function messageBoard() {
	window.location.href = "/home/instructor-home/discussions";
}

function setGrades() {
	window.location.href = "/home/instructor-home/set-grades";
}

function manageQuizzes() {
	window.location.href = "/home/instructor-home/manage-quizzes";
}

function makeAnnouncement() {
	window.location.href = "/home/instructor-home/make-announcement";
}

function viewSubmissions() {
	window.location.href = "/home/instructor-home/view-student-submissions";
}

function module() {
	window.location.href = "/home/instructor-home/create-and-view-modules";
}

function newSection() {
	window.location.href = "/home/instructor-home/create-a-new-section";
}

function lockAssignment()
{
    window.location.href = "/home/instructor-home/lock-assignment";
}