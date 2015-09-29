function createSection() {
	var month = $("#month").val();
	var day = $("#day").val();
	var year = $("#year").val();
	var courseID = sessionStorage.getItem('courseID');
    $.ajax({
	    type: "POST",
        url: "/Actions/cloneClass.php",
		dataType: "json",
		data: {month: month, day: day, year: year, courseID: courseID},
		success: function(){
				alert("Your new section has been created!");
               	window.location.href = "/home";
            }
    });
}