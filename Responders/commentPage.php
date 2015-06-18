<?php
    require '../Actions/authenticate.php';
?>
<html>
    <head>
        <title>LMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!--
        <link href="../css/app.css" rel="stylesheet" />

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
            var question = getParameterByName("question");
            var questionid = getParameterByName("questionid");
            window.onload = function () {
                var classid = sessionStorage.getItem('courseID');
                $.ajax({
                    type: "POST",
                    url: "../Actions/getComment.php",
                    data: "question=" + question + "&questionid=" + questionid + "&classid=" + classid,
                    cache: false,
                    success: function (data) {
                        if (data == false)
                        {
                            document.getElementById("demo").innerHTML = "<h1>" + question + "</h1>";
                            alert("No messages");
                        }
                        else
                        {
                            var html = "<h1>" + question + "</h1><br>";
                            for (var i = 0; i < data.length; i++)
                            {
                                var comment = data[i].comment;

                                html += comment + "<br>";
                            }
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
                    var userid = "batman";
                    $.ajax({
                        type: "POST",
                        url: "../Actions/executeCommenting.php",
                        data: "comment=" + comment + "&question=" + question + "&questionid=" + questionid + "&classid=" + classid + "&userid=" + userid,
                        cache: false,
                        success: function (data) {
                            if (data == 'true') {
                                alert("message added");
                                window.location.reload();
                            }
                            else {
                                alert("Invalid");
                            }
                        }
                    });
                    return false;
                });

            });
        </script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Thread Creation</h1>
            </div><!-- /header -->
            <div role="main" id="demo">
            </div><!-- /content -->
            <br>
            <br>
            <form action="" method="post">
                <label for="comment">Enter Comment (max 300 characters):</label>
                <input type="text" name="comment" id="comment" maxlength="300" >
                <input  id="createComment" type="button" value="Submit Comment" >
                <p class="mc-top-margin-1-5"><a href="userhome.php" data-ajax="false">Go back to homepage?</a></p>
            </form>
        </div><!-- /page -->
    </body>
</html>