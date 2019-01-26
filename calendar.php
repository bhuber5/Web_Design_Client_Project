<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/head.php" ?>
</head>


<body>
    <?php include "includes/navbar.php" ?>
    <div class = "main">
        <div class = "container-fluid">
            <div class="row justify-content-center"> 
                <div class="col-1 col-md-2"></div>
                <div class="col-10 col-md-8 center-block">
                    <h1 class = "title">UPCOMING EVENTS</h1>
                </div>
                <div class="col-1 col-md-2"></div>
            </div>       
            <div class="row justify-content-center">
              <div class="col-1 col-md-2"></div>
              <div class="col-10 col-md-8 center-block">
                   <ul id="events-upcoming">
                    </ul>
              </div>
              <div class="col-1 col-md-2"></div>
            </div>
        </div>

        <div class = "container-fluid">
            <div class="row justify-content-center"> 
                <div class="col-1 col-md-2"></div>
                <div class="col-10 col-md-8 center-block">
                    <h1 class = "calendar title">CALENDAR</h1>
                </div>
                <div class="col-1 col-md-2"></div>
            </div>       
            <div class="row justify-content-center">
              <div class="col-1 col-md-2"></div>
              <div class="col-10 col-md-8 center-block">
                     <div id='calendar'></div>
              </div>
              <div class="col-1 col-md-2"></div>
            </div>
        </div>
    </div>
</body>


</html>