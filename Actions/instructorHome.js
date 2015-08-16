$( document ).ready(function() {
	var html = "<h1>";
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1>";
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
	window.location.href = "/home/instructor-home/message-board";
}

function setGrades() {
	window.location.href = "/home/instructor-home/set-grades";
}

function createQuiz() {
	window.location.href = "/home/instructor-home/create-quiz";
}

function makeMessage() {
	window.location.href = "/home/instructor-home/make-message";
}

function deleteQuiz() {
	window.location.href = "/home/instructor-home/delete-quiz";
}

function viewSubmissions() {
	window.location.href = "/home/instructor-home/view-student-submissions";
}

function lockAndUnlockQuiz() {
	window.location.href = "/home/instructor-home/lock-and-unlock-quizes";
}
function module() {
	window.location.href = "/home/instructor-home/create-and-view-modules";
}