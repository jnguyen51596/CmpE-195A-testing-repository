function searchClasses() {
	var searchTerm = $("#search-mini").val();	
	getClasses(searchTerm);
}


function getClasses(query) {
    $.ajax({
	    type: "POST",
        url: "../Actions/searchClasses.php",
		dataType: "json",
		data: "search="+query,
		success: function(data){
               formatData(data);
            }
    });
}

function formatData(data) {
	var html = "<ul data-role='listview' data-inset='true'>";
	$.each(data, function(index, data) {
		html += "<li><a onclick='addClass(" + data.courseID + ")' href='#'>" + data.name + " : ID = " + data.courseID + "</a></li>";
	});
	html += "</ul>";
	$("#searchResults").html(html).trigger("create");
}

function addClass(courseID) {
	if (confirm('Are you sure you want to add this class?')) {
	    $.ajax({
		    type: "POST",
	        url: "../Actions/addClass.php",
			data: "courseID="+courseID,
			success: function(){
	               alert("You are now enrolled!");
                       window.location = 'userHome.php';
	            }
	    });
	}
}