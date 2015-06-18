$( document ).ready(function() {
	var html = "<h1>";
	html += sessionStorage.getItem('prefix') + " " + sessionStorage.getItem('suffix') + " " + sessionStorage.getItem('name');
	html += "</h1>";
    $('#header').html(html).trigger('create');
});

function takeQuiz() {
	window.location.href = "../Responders/displayQuiz.html";
}
function makeMessage() {
	window.location.href = "../Responders/createMessageThread.html";
}
function messageBoard() {
	window.location.href = "../Responders/messageBoard.html";
}

function viewAnnouncements() {
	window.location.href = "../Responders/viewAnnouncements.php";
}

