function postAnnouncement() {
	var courseID = sessionStorage.getItem('courseID');
	var body = $("#body").val();
	$.ajax({
        type: "POST",
        url: "/Actions/makeAnnouncement.php",
        data: {courseID: courseID, body: body},
        dataType: "json",
		success: function(data){
           alert("Your announcement has been posted.");
           var lastPage = location.pathname;
            lastPage = lastPage.substring(0, lastPage.lastIndexOf('/'));
            lastPage = lastPage.substring(0, lastPage.lastIndexOf('/'));
            window.location.href = lastPage;

        }
	});
}