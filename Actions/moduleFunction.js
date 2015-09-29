
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
                    alert("Module Created");
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
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("No Module");
            }
            else
            {
                var html = "";
                for (var i = 0; i < data.length; i++)
                {
                    //var classid = data[i].classID;
                    var moduleid = data[i].moduleID;
                    var title = data[i].title;
                    var lock = data[i].lock;
                    if (lock == '1')
                    {

                    }
                    else
                    {
                        html += "<a onclick='goToStudentModule(" + moduleid + ")' class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Module " + moduleid + ": " + title + "</a><br>";
                    }
                }
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
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("Create Module First");
                var html = "";
                html += "<a href='/home/instructor-home/create-and-view-modules/create-module'>Create Module</a>";
                document.getElementById("demo").innerHTML = html;
            }
            else
            {
                var html = "";
                for (var i = 0; i < data.length; i++)
                {
                    //var classid = data[i].classID;
                    var moduleid = data[i].moduleID;
                    var title = data[i].title;
                    var lock = data[i].lock;
                    if (lock == '1')
                    {

                    }
                    else
                    {
                        html += "<a onclick='goToInstructorModule(" + moduleid + ")' class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\"> Module " + moduleid + ": " + title + "</a><br>";
                    }
                }
                html += "<br><a href='/home/instructor-home/create-and-view-modules/create-module'>Create Module</a>";
                document.getElementById("demo").innerHTML = html;

            }
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
        cache: false,
        success: function (data) {
            if (data == false)
            {
                document.getElementById("demo").innerHTML = "<h1> Module: " + moduleid + "</h1>";
                alert("No Description");
            }
            else
            {
                var title=data[0].title;
                var html = "<h1> Module " + moduleid +": "+title+ "</h1><br>";
                for (var i = 0; i < data.length; i++)
                {
                    var description = data[i].description;
                    

                    html += description + "<br>";
                }
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
                if (data == 'true') {
                    alert("Description added");
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