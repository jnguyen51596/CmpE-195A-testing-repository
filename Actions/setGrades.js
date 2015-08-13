var response;
var xmlhttp = new XMLHttpRequest();

function initializeAssignments() {	
	response = getRemote("getAssignments");
	assignmentArray = JSON.parse(response);
	
	gradesResponse = getRemote("getGrades");
	gradesArray = JSON.parse(gradesResponse);
	
	var tag ='';
	// this loop creates a collapsible for each assignment
	for (var i = 0; i < assignmentArray.length; i++) {
		tag += '<div data-role="collapsible" data-content-theme="b">' +
		'<h4>' + assignmentArray[i]['title'] + '</h4>' + 
		'<div class="inset">' + 
		'<table data-role="table" id="table-' + assignmentArray[i]['assignmentID'] + '" class="ui-responsive table-stroke">' +
		'<thead><tr>' +
		
		'<th>Name</th>' +
		'<th>Score</th>' +
		'<th>Total</th>' +
		'<th>Feedback</th>' +
		
		'</tr></thead><tbody></tbody></table></div></div>';
	}
	$('#assignments-id').append(tag);
	
	// this loops iterates through each grade and appends them under appropriate assignment collapsible
	for (var j = 0; j < gradesArray.length; j++) {
		var gradeTag =' <tr> <th>' + gradesArray[j]['username'] +'</th>' + 
			'<td id="score-' + j + '">' + gradesArray[j]['score'] + '</td>' +
			'<td id="total-' + j + '">' + gradesArray[j]['total'] + '</td>' +
			'<td id="feedback-' + j + '">' + gradesArray[j]['feedback'] + '</td>' +
			'<td> <input id="score-entry-' + j + '" type="text" placeholder="Score"></input> </td>' +
			'<td> <input id="feedback-entry-' + j + '" type="text" placeholder="Feedback"></input> </td>' +
			'<td> <button onclick="setGrade(' + gradesArray[j]['memberID'] + ',' + gradesArray[j]['assignmentID'] + ',' + j +
												')">Submit</button> </td> </tr>';

		$('#table-' + gradesArray[j]['assignmentID'] + '> tbody:last-child').append(gradeTag);
	}
}

function setGrade(memberID, assignmentID, inputIndex) {
	var score = document.getElementById('score-entry-' + inputIndex).value;
	var feedback = document.getElementById('feedback-entry-' + inputIndex).value;

	if (isNaN(score) || score < 0 || score > parseFloat(document.getElementById('total-' + inputIndex).innerText))  {
		alert("Please enter a valid score");
	}
	else {
		$.ajax({
			type: "POST",
			data: {memberID: memberID, assignmentID: assignmentID, score: score, feedback: feedback},
			url: "/Actions/setGrades.php",
			async: false
		});
		
		document.getElementById('score-' + inputIndex).textContent = score;
		document.getElementById('feedback-' + inputIndex).textContent = feedback;
	}
}

function getRemote(url) {
    return $.ajax({
        type: "POST",
		data: {courseID: sessionStorage.getItem('courseID')},
        url: "/Actions/" + url + ".php",
        async: false
    }).responseText;
}

function getClassList() {
	response = "";
	xmlhttp.open("POST","/Actions/getGrades.php",true);
	xmlhttp.send("member="+firstName); // ?
	xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                response = xmlhttp.responseText;
					alert(response);
	            }
	}
	return response;
}