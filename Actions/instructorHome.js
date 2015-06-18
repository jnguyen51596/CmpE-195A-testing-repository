$( document ).ready(function() {
	var html = "<h1>";
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1>";
    $('#header').html(html).trigger('create');
});

function createAssignment() {
	window.location.href = "../Responders/createAssignment.php";
}

function dropAStudent() {
	window.location.href = "../Responders/dropAStudent.php";
}

function makeAnnouncement() {
	window.location.href = "../Responders/makeAnnouncement.php";
}

function messageBoard() {
	window.location.href = "../Responders/messageBoard.php";
}

function setGrades() {
	window.location.href = "../Responders/setGrades.php";
}

function createQuiz() {
	window.location.href = "../Responders/quiz-instructor.php";
}
function makeMessage() {
	window.location.href = "../Responders/createMessageThread.php";
}