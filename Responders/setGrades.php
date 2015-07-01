<?php
    require '../Actions/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Set Grades</title>
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
	<link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
	<link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
			
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
	<script src="../Actions/setGrades.js"></script>
	
	<script>
            
            $(document).ready(function () {
                $('#grade-submit').click(function () {
                    var assignment = document.getElementById("assignment-id").value;
                    var score = document.getElementById("score-id").value;
                    var feedback = document.getElementById("feedback-id").value;
                    $.ajax({
						type: "POST",
						url: "../Actions/setGrades.php",
                        data: {assignment: assignment, score: score, feedback: feedback }, 
						success: function() { alert("success!"); },
						error: function(xhr, ajaxOptions, thrownError) { 
                            alert(xhr.responseText); 
						}
					});
				
                });
            });
        </script>



    </head>

    <body>
	<div data-role="page" data-theme="b">
        <div data-role="header" data-theme="b">
            <h1>Set Grade</h1>
        </div>

        <div>
            <br>
            <form action="" method="post">
                <div class="ui-grid-a grids">
                    <div class="ui-block-a">
                        <label for="assignment-id">Assignment</label>
                        <input type="text" id="assignment-id" placeholder="Assignment"></input>
                    </div>

                    <div class="ui-block-b">
                        <label for="score-id">Score</label>
                        <input type="text" id="score-id" placeholder="Score"></input>
                    </div>
                </div>

                <div>
                    <label for="feedback-id">Feedback</label>
                    <textarea name="textarea" id="feedback-id" placeholder="Feedback"></textarea>
                </div>

                <div class="ui-grid-solo">
                    <input  id="grade-submit" type="button" value="Submit"></input>
                </div>
            </form>
        </div>

        <!--
        <div id="gradesList">
                <script type="text/javascript">
                
                        //located in listClasses.js
                        initializeClassList();
                </script>	
        </div>
        -->

        <!--
        <div class="ui-grid-b grids">
                <div class="ui-block-a"><p style="text-align: center" id="assignment-id">Homework 1</p></div>
                <div class="ui-block-b">
                        <div><input type="text" name="test" id="score-id" value="0"></div>
                </div>
                <div class="ui-block-c" data-role="collapsible" data-mini="true">
                        <h3>Feedback</h3>
                        <textarea name="textarea" id="textarea-a" value placeholder="Feedback"></textarea>
        <!-- <h3>Feedback</h3><p>Answer 1 is nonsensical</p>
</div>	
</div>


<div class="ui-grid-solo">
        <div class="ui-block-a"><button type="button" id="submit-id" data-theme="b">Submit</button></div>
</div>
        -->
	</div>
    </body>
</html>