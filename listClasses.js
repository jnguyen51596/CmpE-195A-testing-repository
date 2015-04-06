var response;
var xmlhttp = new XMLHttpRequest();
var instructorID = 1;

function initializeClassList() {
	var tag = '<ul id="classList" data-role="listview">';
	response = getRemote(instructorID);
	var classArray = JSON.parse(response);
	var classNames = ['ENGR 100W', 'CS 146', 'CMPE 172', classArray[0]['name'], classArray[1]['name']];
	for (var i = 0; i < 5; i++) {
		tag += '<li><a href="#">' + classNames[i] + '</a></li>';
	}
	tag += "</ul>";
	$('#classList').append(tag);
	//document.getElementById("classList").innerHTML = tag;
	
}

function getRemote(instructor) {
    return $.ajax({
        type: "POST",
        url: "getClassesTaught.php",
        async: false,
		data: { instructor: instructor}
    }).responseText;
}

function getClassList() {
	
	response = "";
	xmlhttp.open("POST","getClassesTaught.php",true);
	xmlhttp.send("instructor="+instructorID);//
	xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                response = xmlhttp.responseText;
					alert(response);
	            }
	}
	return response;
}