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
        <link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
                
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="../Actions/quiz.js"></script>
        <script src="../Actions/javascriptFunction.js"></script>

        <style>
            #box2{display:none} 
            #box3{display:none}  
        </style>

    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Quiz Creation</h1>
            </div><!-- /header -->
            <div role="main">
                <form name="quiz-creation" id="quiz-creation" method="post">
                    <div>
                        <fieldset data-role="controlgroup" data-type="vertical">
                            <legend>Choose Question Type:</legend>
                            <input type="radio" name="radio-choice-h-2" id="radio-choice-h-2a" onclick="showA()" value="multipleChoice" checked="checked">
                            <label for="radio-choice-h-2a">Multiple Choice</label>
                            <input type="radio" name="radio-choice-h-2" id="radio-choice-h-2b" onclick="showB()" value="trueFalse">
                            <label for="radio-choice-h-2b">True/False</label>
                            <input type="radio" name="radio-choice-h-2" id="radio-choice-h-2c" onclick="showC()" value="shortAnswer">
                            <label for="radio-choice-h-2c">Short Answer</label>
                        </fieldset>
                        <br>
                    </div>
                    <div id="box">
                        <fieldset data-role="fieldcontain">
                            <label for="question-a">Type in Question:</label>
                            <textarea cols="40" rows="8" name="question-a" id="question-a" ></textarea>
                        </fieldset>  
                        <fieldset data-role="fieldcontain">
                            <label for="answer-a">Type in Correct Answer:</label>
                            <textarea cols="40" rows="8" name="answer-a" id="answer-a"></textarea>
                        </fieldset>                 
                        <fieldset data-role="fieldcontain">
                            <label for="incorrectAnswer1">Type in Incorrect Answer 1:</label>
                            <textarea cols="40" rows="8" name="incorrectAnswer1" id="incorrectAnswer1"></textarea>
                        </fieldset>
                        <fieldset data-role="fieldcontain">
                            <label for="incorrectAnswer2">Type in Incorrect Answer 2:</label>
                            <textarea cols="40" rows="8" name="incorrectAnswer2" id="incorrectAnswer2"></textarea>
                        </fieldset>
                        <fieldset data-role="fieldcontain">
                            <label for="incorrectAnswer3">Type in Incorrect Answer 3:</label>
                            <textarea cols="40" rows="8" name="incorrectAnswer3" id="incorrectAnswer3"></textarea>
                        </fieldset>

                    </div>  

                    <div id="box2">
                        <fieldset data-role="fieldcontain">
                            <label for="question-b">Type in Question:</label>
                            <textarea cols="40" rows="8" name="question-b" id="question-b"></textarea>
                        </fieldset>  
                        <fieldset data-role="controlgroup" data-type="vertical">
                            <legend>Choose Correct Answer:</legend>
                            <input type="radio" name="trueFalseChoice-b" id="trueFalseChoice-1b" value="true" checked="checked">
                            <label for="trueFalseChoice-1b">True</label>
                            <input type="radio" name="trueFalseChoice-b" id="trueFalseChoice-2b" value="false">
                            <label for="trueFalseChoice-2b">False</label>
                        </fieldset>
                    </div>
                    <div id="box3">
                        <fieldset data-role="fieldcontain">
                            <label for="question-c">Type in Question:</label>
                            <textarea cols="40" rows="8" name="question-c" id="question-c"></textarea>
                        </fieldset>  
                        <p style="color:red">Warning: you will have to grade the short answer questions</p>
                    </div>
                    <input  id="nextQuizCreation" type="button" value="Next" onclick="submitQuiz()">
                </form>
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>
