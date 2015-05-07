var first;
var last;
var password;
var xmlhttp = new XMLHttpRequest();
var username = "cpc1992";
// once i figure out how to grab logged in user's username, ill add paramerters to the functions below!!!

function getFirstName() {
	var tag = '<label>';
	first = getFirst(username);
        tag += first;
        tag += "</label>";
	$('#firstName').append(tag);
}

function getLastName() {
	var tag = '<label>';
	last = getLast(username);
        tag += last;
        tag += "</label>";
	$('#lastName').append(tag);
}

function getPassword() {
	var tag = '<label>';
	password = getPass(username);
        password = password.replace(/\s+/g, ''); //removes spaces from string
        password = password.length;
	for (var i = 0; i < password; i++) {
		tag += "*";
	}
          tag += "</label>";
	$('#password').append(tag);
}

// AJAX CALLS
function getFirst(username) {
    return $.ajax({
        type: "POST",
        url: "getFirstName.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function getLast(username) {
    return $.ajax({
        type: "POST",
        url: "getLastName.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function getPass(username) {
    return $.ajax({
        type: "POST",
        url: "getPassword.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}
