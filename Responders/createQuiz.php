<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<html>
    <head>
        <title>LMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- comment out to enable nativeDroid
        <link href="../css/app.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/themes/default/testcanvas.min.css" />
        <link rel="stylesheet" href="../css/themes/default/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		-->

		<link rel="stylesheet" href="/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
			
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="/Actions/createQuiz.js"></script>
	<script src="../Actions/javascriptFunction.js"></script>

    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Quiz Creation</h1>
            </div><!-- /header -->
            <?php
                require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
            ?>
            <br>
            <div role="main">
                <form name="quizStart" id="quizStart" method="post">
                    <fieldset data-role="fieldcontain">
                        <label for="title">Type in Title:</label>
                        <textarea cols="40" rows="8" name="title" id="title" ></textarea>
                    </fieldset>
                    <fieldset data-role="fieldcontain">
                        <label for="quizNumber">Type in Quiz ID (number only):</label>
                        <textarea cols="40" rows="8" name="quizNumber" id="quizNumber"></textarea>
                    </fieldset>
		<fieldset data-role="fieldcontain">
                        <label for="dueDateQuiz1">Select Month:</label>
                        <select name="dueDateQuiz1" id="dueDateQuiz1">
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">august</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </fieldset>

                    <fieldset data-role="fieldcontain">
                        <label for="dueDateQuiz2">Select Day:</label>
                        <select name="dueDateQuiz2" id="dueDateQuiz2">
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>               
                        </select>
                    </fieldset>

                    <fieldset data-role="fieldcontain">
                        <label for="dueDateQuiz3">Select Year:</label>
                        <select name="dueDateQuiz3" id="dueDateQuiz3">
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>

                        </select>
                    </fieldset>
                    <br>
                    <fieldset data-role="fieldcontain">
                        <label for="dueDateQuiz4">Select Hour:</label>
                        <select name="dueDateQuiz4" id="dueDateQuiz4">
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </fieldset>
                    
                     <fieldset data-role="fieldcontain">
                        <label for="dueDateQuiz5">Select Time of Day (PM, AM, etc):</label>
                        <select name="dueDateQuiz5" id="dueDateQuiz5">
                            <option value="am">AM</option>
                            <option value="PM">PM</option>
                            <option value="noon">Noon</option>
                            <option value="midnight">Midnight</option>                           
                        </select>
                    </fieldset>
                    
                     <fieldset data-role="fieldcontain">
                        <label for="dueDateQuiz6">Type in Minutes (0-59):</label>
                        <textarea cols="40" rows="8" name="dueDateQuiz6" id="dueDateQuiz6"></textarea>
                    </fieldset>
                    <input  id="start" type="button" value="Create Quiz" onclick="submitStartQuiz()">
                </form>
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>
