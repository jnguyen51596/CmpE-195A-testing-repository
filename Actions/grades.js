
// once i figure out how to grab logged in user's username, ill add paramerters to the functions below!!!

//function getGradesTable() {
//	var tag = '<ul id="classList" data-role="listview">';
//	response = getRemote(instructorID);
//	var classArray = JSON.parse(response);
//	var classNames = ['ENGR 100W', 'CS 146', 'CMPE 172', classArray[0]['name'], classArray[1]['name']];
//	for (var i = 0; i < 5; i++) {
//		tag += '<li><a href="#">' + classNames[i] + '</a></li>';
//	}
//	tag += "</ul>";
//	$('#classList').append(tag);
//	//document.getElementById("classList").innerHTML = tag;
//	
//}

function getGrades() {
    return $.ajax({
        type: "POST",
        url: "../Actions/getGrades.php",
        data: "courseID=" + sessionStorage.getItem('courseID'),
        dataType: "json",
		success: function(data){
               formatData(data);
            }
    });
    
}

function formatData(data) {
    //appends to div ID
	$('#results').empty();
	var html = "";    //First Name:</b> 90/100</label><div>Nice job!</div><br>";
   
	$.each(data, function(index, data) {
		if (data != -1) {
			html += "<label><b>" + data.title + ":</b>" + data.score + "/" + data.total + "</label><div>" + data.feedback + "</div><br>";	
                   
		}
	});
   
       
        
	$('#results').append(html).trigger('create');
}
//EXAMPLE
//function formatData(data) {
//	$('#results').empty();
//	html = "<label for='classList' class='select'>Select a Class:</label><select name='classList' id='classList'>";
//
//	$.each(data, function(index, data) {
//		if (data != -1) {
//			html += "<option value='" + JSON.stringify(data) + "'>" + data.prefix + " " + data.suffix + " " + data.name + "</option>";		
//		}
//		//alert(data.prefix + " " + data.suffix + " " + data.name);
//	});
//	if (role == "instructor") {
//		html += "<option value='create'>Create a Course</option>";
//	} else if (role == "student") {
//		html += "<option value='enroll'>Find a Course to Take</option>";
//	}
//	html += "</select><button onclick='getCourseHomepage()'>Go to Course Homepage</button>";
//	$('#results').append(html).trigger('create');