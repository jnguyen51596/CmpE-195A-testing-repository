var response;
var assignmentArray;

function initializeAssignments() {	
	response = getRemote();
	assignmentArray = JSON.parse(response);

	// return assignments as a drop down list
	// var tag = '<select id="assignment-select-id">';
	// for (var i = 0; i < assignmentArray.length; i++) {
		// tag += '<option value="' + assignmentArray[i]['assignmentID'] + '">' + assignmentArray[i]['title'] + '</option>';
	// }
	// tag += "</select>";
	
	var tag = '<ul id="assignment-list-id" data-role="listview" data-inset="true">';
	for (var i = 0; i < assignmentArray.length; i++) {
		//tag += '<li><button onclick="expandAssignment(' + i + ')">' + assignmentArray[i]['title'] + '</button></li>';
		tag += '<li><a href="javascript:void(0);" onclick="expandAssignment(' + i + ');">' + assignmentArray[i]['title'] + '</a></li>';
	}
	tag += "</ul>";
	$('#assignments-id').append(tag);
}

function getRemote() {
    return $.ajax({
        type: "POST",
        url: "../Actions/getAssignments.php",
        async: false //,
		// data: { instructor: instructor}
    }).responseText;
}

function expandAssignment(assignmentIndex) {
	//alert(assignmentIndex);
	$('#assignment-info-id').html("");
	// var info = '<p>';
	// info += assignmentArray[assignmentIndex]['description'];
	// info += '</p>';
	
	// var info = '<div data-role="fieldcontain">' +
		// '<label> Points: '+ assignmentArray[assignmentIndex]['total'] + '</label>' +
		// '</div>';
	var info = '<div class="ui-grid-a">' +
		'<div class="ui-block-a"> Points: '+ assignmentArray[assignmentIndex]['total'] + '</div>' +
		'<div class="ui-block-b"><label>Due: '+ assignmentArray[assignmentIndex]['duedate'] + '</label></div>' +
		'</div>' +
		'<div class="inset">' +
		'<p> Description: '+ assignmentArray[assignmentIndex]['description'] + '</p>' +
		'</div>';
	$('#assignment-info-id').append(info);
}
