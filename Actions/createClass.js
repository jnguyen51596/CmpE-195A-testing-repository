function createClass() {
	var courseName = $("#courseName").val();
	var prefix = $("#prefix").val();
	var suffix = $("#suffix").val();
    $.ajax({
	    type: "POST",
        url: "../Actions/createClass.php",
		dataType: "json",
		data: {courseName: courseName, prefix: prefix, suffix: suffix},
		success: function(){
				alert("Your class has been created!");
               	window.location.href = "userHome.php";
            }
    });
}