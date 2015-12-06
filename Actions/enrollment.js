$(document).delegate("#save", "vclick", function() {
    var val = $("#flip").val();
    
    var classid = sessionStorage.getItem('courseID');
    
    var open = 1;
    if(val == "off"){
        open = 0;
        alert("Enrollment is closed");
    }else{
        alert("Enrollment is open");
    }
    
    $.ajax({
        type: "POST",
        url: "/Actions/changeEnrollment.php",
        data: "open=" + open + "&classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            window.location = "/home/instructor-home";
        }
    });
    
    
    
    
});

