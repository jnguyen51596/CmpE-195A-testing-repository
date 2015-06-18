<?php
    require '../Actions/authenticate.php';
?>
<html>
    <head>
        <title>LMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../css/app.css" rel="stylesheet" />

		<!--
        <link rel="stylesheet" href="../css/themes/default/testcanvas.min.css" />
        <link rel="stylesheet" href="../css/themes/default/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		-->
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.css" />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.dark.css"  id='jQMnDTheme' />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.green.css" id='jQMnDColor' />
				
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		
		
        <script src="../Actions/javascriptFunction.js"></script>
        <script>
            var hwid = getParameterByName("hwid");
            var username = getParameterByName("username");
            window.onload = function () {
                var classid = sessionStorage.getItem('courseID');
                $.ajax({
                    type: "POST",
                    url: "../Actions/getHwCommentInstructor.php",
                    data: "hwid=" + hwid + "&classid=" + classid + "&username=" + username,
                    cache: false,
                    success: function (data) {
                        if (data == false)
                        {
                            var html = "<h1>No Comments</h1><br>";
                            html+="<a href=\"hwCommentList.html?hwid="+hwid+"\" data-ajax=\"false\">Go back to Student List?</a>"
                            document.getElementById("demo").innerHTML = html;
                            alert("No Comment");
                        }
                        else
                        {
                            var html = "<h1>Previous Comments</h1><br>";
                            for (var i = 0; i < data.length; i++)
                            {
                                var comment = data[i].comment;
                                var num = i + 1;

                                html += "&nbsp;&nbsp;&nbsp;&nbsp;" + num + ".&nbsp;" + comment + "<br>";
                            }
                            html+="<a href=\"hwCommentAdd.html?hwid="+hwid+"\" data-ajax=\"false\">Go back to Student List?</a>"
                            document.getElementById("demo").innerHTML = html;
                        }
                    }
                });

            };

        </script>
 
        <script>
            $(document).ready(function ()
            {
                $('#createComment').click(function ()
                {
                    var comment = $("#comment").val();
                    var classid = sessionStorage.getItem('courseID');
                    if (username == "" || hwid == "" || comment == "")
                    {
                        alert("Invalid Data");
                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: "../Actions/addHwComment.php",
                            data:  "comment=" + comment + "&hwid=" + hwid + "&classid=" + classid + "&username=" + username,
                            cache: false,
                            success: function (data) {
                                if (data == true) {
                                    alert("message added");
                                    window.location.reload();
                                }
                                else {
                                    alert("Invalid");
                                    window.location.reload();
                                }
                            }
                        });
                    }
                    
                });
            });
        </script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Add Homework Comments</h1>
            </div><!-- /header -->
            <div role="main" id="demo">
            </div><!-- /content -->
            <br>
            <br>
            <form action="" method="post">
                <label for="comment">Enter Comment (max 300 characters):</label>
                <input type="text" name="comment" id="comment" maxlength="300" >
                <input  id="createComment" type="button" value="Submit Comment" >               
            </form>
            <div id="demo2">
             </div>
        </div><!-- /page -->
    </body>
</html>
