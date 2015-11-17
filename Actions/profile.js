var first;
var last;
var password;
var bio;
var email;
var xmlhttp = new XMLHttpRequest();
var username = "batman";
// once i figure out how to grab logged in user's username, ill add paramerters to the functions below!!!

function getFirstName() {
	var tag = '<label><b>';
	first = getFirst(username);
        tag += first;
   
        var tag2 = " ";
        last = getLast(username);
        tag2 += last;
        tag2 += "</b></label>";
        
        var tag3 = tag + tag2;

	$('#firstName').append(tag3);
}

function getBioo() {
	var tag="";
	bio = getBio(username);
        tag += bio;
        

	$('#bio').append(tag);
}
function getBio2() {
	var tag="";
	bio = getBio(username);
        tag += bio;
        

	$('#bio').val(tag);
}

function getEmaill() {
	var tag="";
	email = getEmail(username);
        tag += email;
        
       $('#email').append(tag);
}

function getEmail2() {
	var tag="";
	email = getEmail(username);
        tag += email;
        
       $('#email').val(tag);
}

//unused
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
        url: "/Actions/getFirstName.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function getLast(username) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getLastName.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function getPass(username) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getPassword.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function getBio(username) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getBio.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function getEmail(username) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getEmail.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function edit() {
    window.location = "/home/edit-profile";
}

function profile() {
    window.location = "/home/view-profile";
}

function home() {
    window.location = "/home";
}

