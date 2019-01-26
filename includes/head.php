    <!-- The character encoding of my website -->
    <meta charset="UTF-8" />	
    
    <link rel="icon" href= "Images/Database.png"/>    
    <!-- credit: https://achievement-images.teamtreehouse.com/badges_DD_Database_Stage1.png -->
    <title> Digital Gaming Alliance </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    
    <!-- FormatGoogleCalendar Javascript file (For displaying Upcoming Events)-->
    <script src="js/format-google-calendar.js"></script>
    
    <!-- Full Calender Javascript & CSS  --->
    <link rel='stylesheet' href='styles/fullcalendar.css' />
    <script src='js/jquery.min.js'></script>
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.js'></script>
    <script src='js/main.js'></script>
    <script src='js/gcal.js'></script>

    <?php
    require_once 'config.php';
    //course server
    //$mysqli = new mysqli( 'localhost', 'fp_sqlsquad', 'sqlsquad', 'info230_SP17_fp_sqlsquad');

    //local server
    $mysqli = new mysqli( 'localhost', 'root', 'root', 'info230_SP17_fp_sqlsquad');

    //add your own local server for testing if you'd like
    ?>