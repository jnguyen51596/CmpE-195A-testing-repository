$( document ).ready(function() {
	var html = "<h1>";
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1>";
    $('#header').html(html).trigger('create');
});

function createAssignment() {
	window.location.href = "../Responders/createAssignment.html";
}

function dropAStudent() {
	window.location.href = "../Responders/dropAStudent.html";
}

function makeAnnouncement() {
	window.location.href = "../Responders/makeAnnouncement.html";
}

function messageBoard() {
	window.location.href = "../Responders/messageBoard.html";
}

function setGrades() {
	window.location.href = "../Responders/setGrades.html";
}

function createQuiz() {
	window.location.href = "../Responders/quiz-instructor.html";
}
function makeMessage() {
	window.location.href = "../Responders/createMessageThread.html";
}