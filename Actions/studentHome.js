$( document ).ready(function() {
	var html = "<h1>";
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1>";
    $('#header').html(html).trigger('create');
});

function takeQuiz() {
	window.location.href = "../Responders/displayQuiz.php";
}
function makeMessage() {
	window.location.href = "../Responders/createMessageThread.php";
}
function messageBoard() {
	window.location.href = "../Responders/messageBoard.php";
}
function viewAnnouncements() {
	window.location.href = "../Responders/viewAnnouncements.php";
}
function grades() {
	window.location.href = "../Responders/viewGrades.php";
}
function assignments() {
	window.location.href = "../Responders/assignments.php";
}

