<!DOCTYPE html>
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
        <link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


        <script src="../Actions/login.js"></script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b">
                <h1>Mopen</h1>
            </div><!-- /header -->
            <div role="main" class="ui-content">
                <h3>Sign In</h3>
                <form action="" method="post">
                    <label for="sjsu-id">User ID</label>
                    <input type="text" name="sjsu-id" id="sjsu-id" value="">
                    <label for="txt-password">Password</label>
                    <input type="password" name="txt-password" id="txt-password" value="">
                    <input  id="login" type="button" value="Login" >
                    <p class="mc-top-margin-1-5"><a href="registration.php" data-ajax="false">Don't have an account?</a></p>
                </form>
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>