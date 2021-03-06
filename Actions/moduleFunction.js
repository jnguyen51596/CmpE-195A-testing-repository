
function submitModuleAdd()
{
    var classID = sessionStorage.getItem('courseID');
    var title = $('#title').val();
    var moduleNumber = $('#moduleNumber').val();
    if (isNaN(moduleNumber))
    {
        alert("ID Must be a Number");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "/Actions/executeModuleAdd.php",
            data: "classID=" + classID + "&moduleNumber=" + moduleNumber + "&title=" + title,
            cache: false,
            success: function (data) {
                if (data == true)
                {
                    window.location = '/home/instructor-home/create-and-view-modules';
                }
                else
                {
                    alert("Module Already Created");
                }
            }
        });
    }
}

function displayModule1()
{
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/getModule.php",
        data: "classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("No Modules have been created yet");
            }
            else
            {
                var html = "";
                $.each(data, function(index, data) { 
                    var moduleid = data.moduleID;
                    var title = data.title;
                    var lock = data.lock;
                    if (lock == '1')
                    {

                    }
                    else
                    {
                        html += "<a onclick='goToStudentModule(" + moduleid + ")' class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Module " + moduleid + ": " + title + "</a><br>";
                    }
                });
                document.getElementById("demo").innerHTML = html;

            }
        }
    });
}

function goToStudentModule(moduleid) {
    sessionStorage.setItem('moduleid', moduleid);
    window.location = '/home/student-home/modules/view';
}

function displayModule2()
{
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/getModule.php",
        data: "classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            var html = "";
            if (data != false)
            {
                var html = "";
                $.each(data, function(index, data) { 
                    var moduleid = data.moduleID;
                    var title = data.title;
                    var lock = data.lock;
                    if (lock == '1')
                    {

                    }
                    else
                    {
                        html += "<a onclick='goToInstructorModule(" + moduleid + ")' class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Module " + moduleid + ": " + title + "</a><br>";
                    }
                });
            }
            html += "<a href='/home/instructor-home/create-and-view-modules/create-module'>Create Module</a>";
            document.getElementById("demo").innerHTML = html;
        }
    });
}

function goToInstructorModule(moduleid) {
    sessionStorage.setItem('moduleid', moduleid);
    window.location = '/home/instructor-home/create-and-view-modules/modify-module';
}

function moduleDescription()
{
    var moduleid = sessionStorage.getItem("moduleid");
    var classid = sessionStorage.getItem('courseID');
    $.ajax({
        type: "POST",
        url: "/Actions/getModuleDescription.php",
        data: "moduleid=" + moduleid + "&classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == false)
            {
                document.getElementById("demo").innerHTML = "<h1> Module: " + moduleid + "</h1>";
                //alert("No Description");
            }
            else
            {
                var title="";
                var html = "";
                $.each(data, function(index, data) {
                    html += data.description + "<br>";
                    title = data.title;
                });

                html = "<h1> Module " + moduleid +": "+title+ "</h1><br>" + html;
                

                document.getElementById("demo").innerHTML = html;
            }
        }
    });
}

function modulePageButton()
{
    var moduleid = sessionStorage.getItem('moduleid');
    var description = $("#description").val();
    var classid = sessionStorage.getItem('courseID');
    if (description == "")
    {
        alert("Not Enough Information");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "/Actions/executeModuleDescription.php",
            data: "description=" + description + "&moduleid=" + moduleid + "&classid=" + classid,
            cache: false,
            success: function (data) {
                if (data == true) {
                    window.location.reload();
                }
                else {
                    alert("Invalid description");
                }
            }
        });
        return false;
    }

}