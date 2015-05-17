var response;
var xmlhttp = new XMLHttpRequest();
var memberID = 1;

function initializeClassList() {
	// var tag = '<ul id="gradesList" data-role="listview">';
	// response = getRemote(memberID);
	// var classArray = JSON.parse(response);
	// var classNames = [classArray[0]['firstName'] + " " + classArray[0]['lastName'], 
								// classArray[1]['firstName']];
	// for (var i = 0; i < 2; i++) {
		// tag += '<li><a href="#">' + classNames[i] + '</a></li>';
	// }
	// tag += "</ul>";
	// $('#gradesList').append(tag);
	
	var tag = '<ul id="gradesList" data-role="listview">';
	response = getRemote(memberID);
	var classArray = JSON.parse(response);
	var classNames = [classArray[0]['title'] + " " + classArray[0]['score'] + "/" + classArray[0]['total']];
	for (var i = 0; i < 2; i++) {
		tag += '<li><a href="#">' + classNames[i] + '</a></li>';
	}
	tag += "</ul>";
	$('#gradesList').append(tag);
	
}

function getRemote(member) {
    return $.ajax({
        type: "POST",
        url: "../Actions/getGrades.php",
        async: false,
		data: { member: member} // ?
    }).responseText;
}

function getClassList() {
	response = "";
	xmlhttp.open("POST","../Actions/getGrades.php",true);
	xmlhttp.send("member="+firstName); // ?
	xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                response = xmlhttp.responseText;
					alert(response);
	            }
	}
	return response;
}