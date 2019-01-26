<!DOCTYPE html>
<html lang="en">
<!--NOTE: CHANGE THE CONFIG AND HEAD FILES DEPENDING ON WHETHER YOU ARE USING THE COURSE SITE OR LOCAL HOST-->

<head>
    <?php include "includes/head.php" ?>
</head>


<body>
    <?php include "includes/navbar.php" ?>
    
    <div class="main">
        <div class = "container-fluid">
            <div id="content" class = "row justify-content-center">
                <div class="col-1 col-md-1"></div>
                <div class="col-10 col-md-10 center-block">
                <h1 class = "title">About</h1>

                <div class = "about_info">The Digital Gaming Alliance aims to promote gaming and game development in the Cornell student body. On the recreational side, we host social gaming nights and tournaments throughout the semester to bring gamers together. On the development side, we hold weekly dev meetups where students can collaborate on projects, share their knowledge, or learn a new skill. We work with the Game Design Initiative at Cornell to support those pursing the Game Design minor or those taking the popular Game Design classes, CS/INFO 3152 and 4152. Our largest event of the year is a trip to PAX East, a convention in Boston, MA that celebrates gaming and game design. For more information, check out our PAX page.  </div>
                </div>
                <div class="col-1 col-md-1"></div>
            </div>
            </div><div class = "container-fluid">

            <div class="row justify-content-center"> 
                <div class="col-1 col-md-2"></div>
                <div class="col-10 col-md-8 center-block">
                    <h1 class = "title">Upcoming Events</h1>
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
            </div></div>
        
            <div class = "container-fluid"> 
            <div class="row justify-content-center">
            <div class="col-1 col-md-2"></div>
            <div class="col-10 col-md-8 center-block">
            <form id="calendar_button" action="calendar.php">
                    <input type="submit" class="button" value="Full Calendar" />
                </form></div>
                <div class="col-1 col-md-2"></div>
                </div></div>
        
            <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class="col-1 col-md-2"></div>
                <div class="col-10 col-md-8 center-block">
                <h1 class = "title">Officers</h1>
                <div class = "member_info"> 
                <div class="row">
                <div class="col-md-4">
                <img src="images/profileicon.png">
                </div>
                <div class="col-md-4">
                <img src="images/profileicon.png">
                </div>
                <div class="col-md-4">
                <img src="images/profileicon.png">
                </div></div>
                <div class="row" id="officer_title">
                    <div class="col-md-4"> President </div> 
                    <div class="col-md-4"> Treasurer </div> 
                    <div class="col-md-4"> VP of Development </div> 
                </div>
                <div class="row" id="officer_name">
                    <div class="col-md-4"> Melody Spencer </div> 
                    <div class="col-md-4"> Alejandro Devore-Oviedo </div> 
                    <div class="col-md-4"> Kasim Khan </div> 
                </div>
                <div class="row" id="officer_email">
                    <div class="col-md-4"> mjs585@cornell.edu </div> 
                    <div class="col-md-4"> ald79@cornell.edu </div> 
                    <div class="col-md-4"> kak299@cornell.edu </div> 
                </div>
                <div class="row" id="officer_major">
                    <div class="col-md-4"> Computer Science '18  </div> 
                    <div class="col-md-4"> Independent Major, CS concentration '18 </div> 
                    <div class="col-md-4"> Chemical Engineering '20 </div> 
                </div>
                <div class="row" id="officer_other">
                    <div class="col-md-4"> <div class="fav_game"></div>Favorite game: Crypt of the Necrodancer <div class="leastfav_game">Least favorite game: Necropolis</div> <div class="mosthrs">Game with most hours: Pokemon Ruby </div></div>
                    
                    <div class="col-md-4"> <div class="fav_game">Favorite game: Always changing, right now it's Zelda Breath of the Wild. </div><div class="leastfav_game">Least favorite game: Outside</div> <div class="mosthrs">Game with most hours: Rocket League. </div></div>
                        
                    <div class="col-md-4"> <div class="fav_game">Favorite game: Uncharted 4 </div> <div class="leastfav_game">Least Favorite game: Space Engineers</div> <div class="mosthrs">Game with most hours: Minecraft probably </div></div>
                </div>
                </div>
                    
            </div></div></div>
            <div class = "container-fluid">

            <div class = "row justify-content-center"> 
                <h1 class = "title">Contact Us</h1>
                <div class="col-1 col-md-2"></div>
                <div class="col-10 col-md-8 center-block">
                    <div class = "contact_info">If you are interested in getting involved or have any questions about DGA, please post on the <a id="facebook_link" target="_blank" href="https://www.facebook.com/groups/cornellgaming">Facebook</a> group or contact the President at mjs585@cornell.edu. You can also join the DGA listserv at dga-l for more information.</div></div>
                <div class="col-1 col-md-2"></div>
            </div>
        
        </div></div>
    <br><br><br>
    <div id = "credits" > This website was made by Amanda Ong, Ben Huber, Clare Snyder, and Stephanie Sun</div>
    
</body>


</html>