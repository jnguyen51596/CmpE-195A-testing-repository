/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var arrayOfAssignmentId = new Array();

function displayAssignmentList()
{
    arrayOfAssignmentId = new Array();
    var classid = sessionStorage.getItem('courseID');
    return $.ajax({
        type: "POST",
        url: "/Actions/assignmentsList.php",
        data: "classid=" + classid,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data == false)
            {
                alert("Create Assignment First");
//                var html = "";
//                document.getElementById("demo").innerHTML = html;
            }
            else
            {
                var html = "";
                var classid = data[0].classID;
                html += "<br><form method=\"post\">" +
                        "<input type=\"hidden\" name=\"classid\" value=" + classid + ">";
                $.each(data,function(index,data)
                {
                    classid = data.classID;
                    var assignmentid = data.assignmentID;
                    var title = data.title;
                    var lock = data.lock;

                    arrayOfAssignmentId.push(assignmentid);
                    html += "<div class=\"containing-element\">" +
                            "<input type=\"hidden\" name=\"assignmentid-" + assignmentid + "\" value=" + assignmentid + ">" +
                            "<label for=\"toggle-" + assignmentid + "\">Assignment " + assignmentid + ": " + title + "</label>" +
                            "<select name=\"toggle-" + assignmentid + "\" id=\"toggle-" + assignmentid+ "\" data-role=\"slider\">";
                    if (lock == '1')
                    {
                        html += "<option value=\"off\">Off</option>" +
                                "<option selected value=\"on\">On</option>" +
                                "</select>" +
                                "</div><br>";
                    }
                    else
                    {
                        html += "<option selected value=\"off\">Off</option>" +
                                "<option value=\"on\">On</option>" +
                                "</select>" +
                                "<div><br>";
                    }

                });
                html += "<br><input type=\"submit\" value=\"Submit\" onclick=\"submitLockAssignments()\">";
                html += "</form>";
                $("#demo").append(html).enhanceWithin();

            }
        }
    });
}

function submitLockAssignments()
{
    var arr = new Array();
    var classid = sessionStorage.getItem('courseID');
    arr.push(classid);
    for (var values = 0; values < arrayOfAssignmentId.length; values++)
    {
        var aValues = arrayOfAssignmentId[values];
        var aAssignmentid = document.getElementsByName("assignmentid-".concat(aValues))[0].value;
        var aToggle = document.getElementsByName("toggle-".concat(aValues))[0].value;
        var tempValue = 0;
        if (aToggle == "on")
        {
            tempValue = 1;
        }

        arr.push(aAssignmentid);
        arr.push(tempValue);
    }

    $.ajax({
        type: "POST",
        url: "/Actions/assignmentsLock.php",
        data: {jsondata: arr},
        cache: false,
        success: function (data) {
            if (data == true) {
                alert("Lock submitted");
               // window.location = "sign-in.php";
            }
            else {
                alert("Error with Lock");
              //  window.location = "sign-in.php";
            }
        }
    });

    return false;
}

