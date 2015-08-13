

function getGrades() {
    return $.ajax({
        type: "POST",
        url: "/Actions/getGrades.php",
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
