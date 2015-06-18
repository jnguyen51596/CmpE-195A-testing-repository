<?php
    require '../Actions/authenticate.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Mopen</title>
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
		
        <script>

            window.onload=function ()
            {
                var classid = sessionStorage.getItem('courseID');
                $.ajax({
                    type: "POST",
                    url: "../Actions/getMessage.php",
                    data: "classid=" + classid,
                    cache: false,
                    async: false,
                    success: function (data) {
                        if (data == false)
                        {
                            alert("Invalid Message");
                        }
                        else
                        {
                            var html = "";
                            for (var i = 0; i < data.length; i++)
                            {
                                var question = data[i].question;
                                var questionid = data[i].questionID;
                                html += "<a href=\"commentPage.php?question=" + question + "&questionid=" + questionid + "\" class=\"ui-btn ui-btn-a ui-corner-all\" data-ajax=\"false\">" + question + "</a><br>";
                            }
                            document.getElementById("demo").innerHTML = html;

                        }
                    }
                });
            }
            ;
        </script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Message Board</h1>
            </div><!-- /header -->
            <div role="main" id="demo" class="ui-content">
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>

