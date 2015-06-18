<?php
    require '../Actions/authenticate.php';
?>
<html>
    <head>
        <title>LMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-->
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
            var hwid = getParameterByName("hwid");
            window.onload = function () {
                var classid = sessionStorage.getItem('courseID');
                $.ajax({
                    type: "POST",
                    url: "../Actions/getHwCommentStudent.php",
                    data: "hwid=" + hwid + "&classid=" + classid,
                    cache: false,
                    success: function (data) {
                        if (data == false)
                        {
                            document.getElementById("demo").innerHTML = "<h1>No Comment</h1>";
                            alert("No Comment");
                        }
                        else
                        {
                            var html="<br>";
                            for (var i = 0; i < data.length; i++)
                            {
                                var comment = data[i].comment;
                                var num=i+1;

                                html +="&nbsp;&nbsp;&nbsp;&nbsp;"+num+".&nbsp;"+ comment + "<br>";
                            }
                            document.getElementById("demo").innerHTML = html;
                        }
                    }
                });

            };

        </script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Homework Comments</h1>
            </div><!-- /header -->
            <div role="main" id="demo">
            </div><!-- /content -->
            
        </div><!-- /page -->
    </body>
</html>
